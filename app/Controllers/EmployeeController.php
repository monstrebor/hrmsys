<?php

require_once "../app/Models/User.php";
require_once "../app/Models/EmployeeProfile.php";

require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class EmployeeController extends Controller
{
    public function index()
    {
        Auth::requireAdmin();

        $employeeModel = new EmployeeProfile();
        $employees = $employeeModel->all();

        $this->view('admin/employee/index', [
            'title' => 'Employee Management | SEMSYS',
            'employees' => $employees
        ]);
    }

    public function create()
    {
        Auth::requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?url=admin-employees");
            exit;
        }

        $userModel = new User();
        $employeeModel = new EmployeeProfile();

        try {
            $userModel->begin();

            $plainPassword  = Helpers::randomPassword(10);
            $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

            if (!$userModel->create([
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => $hashedPassword,
                'isAdmin'  => 0
            ])) {
                throw new Exception("Email already exists.");
            }

            $userId = $userModel->lastInsertId();

            $employeeModel->create([
                'user_id'           => $userId,
                'employee_id'       => $_POST['employee_id'],
                'employee_type'     => $_POST['employee_type'],
                'department'        => $_POST['department'],
                'position'          => $_POST['position'],
                'campus'            => $_POST['campus'],
                'employment_status' => $_POST['employment_status'],
                'date_hired'        => $_POST['date_hired']
            ]);

            $userModel->commit();

            session_write_close();

            Mailer::send(
                $_POST['email'],
                'Your Bestlink Employee Portal Account',
                EmailView::render('employee-created-email', [
                    'name'        => $_POST['name'],
                    'email'       => $_POST['email'],
                    'password'    => $plainPassword,
                    'employee_id' => $_POST['employee_id']
                ])
            );

            $_SESSION['success'] = "Employee registered successfully.";
        } catch (Exception $e) {
            $userModel->rollback();
            $_SESSION['error'] = $e->getMessage();
        }

        header("Location: index.php?url=employee-index");
        exit;
    }

    public function viewEmployee()
    {
        Auth::requireAdmin();

        if (!isset($_GET['id'])) {
            header("Location: index.php?url=employee-index");
            exit;
        }

        $userId = (int) $_GET['id'];

        $employeeModel = new EmployeeProfile();
        $employee = $employeeModel->findFullProfileByUserId($userId);

        if (!$employee) {
            $_SESSION['error'] = "Employee not found.";
            header("Location: index.php?url=employee-index");
            exit;
        }

        $this->view('admin/employee/show-employee', [
            'title'    => 'Employee Profile | SEMSYS',
            'employee' => $employee
        ]);
    }

    public function editEmployee()
    {
        Auth::requireAdmin();

        if (!isset($_GET['id'])) {
            header("Location: index.php?url=employee-index");
            exit;
        }

        $userId = (int) $_GET['id'];
        $employeeModel = new EmployeeProfile();

        $employee = $employeeModel->findFullProfileByUserId($userId);

        if (!$employee || !$employee['employee_profile_id']) {
            $_SESSION['error'] = "Employee profile not found for this user.";
            header("Location: index.php?url=employee-index");
            exit;
        }

        $this->view('admin/employee/edit-employee', [
            'title' => 'Edit Employee | SEMSYS',
            'employee' => $employee
        ]);
    }

    public function updateEmployee()
    {
        Auth::requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_GET['id'])) {
            header("Location: index.php?url=employee-index");
            exit;
        }

        $userId = (int) $_GET['id'];
        $employeeModel = new EmployeeProfile();
        $userModel = new User();

        try {
            $employeeModel->begin();

            if (!$employeeModel->findByUserId($userId)) {
                throw new Exception("Employee profile does not exist.");
            }

            $employeeModel->updateProfile($userId, [
                'employee_id'       => $_POST['employee_id'],
                'employee_type'     => $_POST['employee_type'],
                'department'        => $_POST['department'],
                'position'          => $_POST['position'],
                'campus'            => $_POST['campus'],
                'employment_status' => $_POST['employment_status'],
                'date_hired'        => $_POST['date_hired'] ?: date('Y-m-d'),
            ]);

            $userModel->update($userId, [
                'name'  => $_POST['name'],
                'email' => $_POST['email']
            ]);

            $employeeModel->commit();
            $_SESSION['success'] = "Employee profile updated successfully.";
        } catch (Exception $e) {
            $employeeModel->rollback();
            $_SESSION['error'] = $e->getMessage();
        }

        header("Location: index.php?url=admin-employees-edit&id=$userId");
        exit;
    }
}
