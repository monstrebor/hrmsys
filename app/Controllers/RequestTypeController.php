<?php

require_once __DIR__ . '/../Models/RequestType.php';
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';

class RequestTypeController extends Controller
{
    public function index()
    {
        Auth::requireAdmin();

        $requestTypeModel = new RequestType();
        $requestTypes = $requestTypeModel->all();

        $this->view("admin/request-types/index", [
            'title' => 'Manage Request Types | HRMSYS',
            'requestTypes' => $requestTypes
        ]);
    }

    public function create()
    {
        Auth::requireAdmin();

        try {
            $model = new RequestType();

            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'icon' => $_POST['icon'] ?? null,
                'requires_attachment' => isset($_POST['requires_attachment']) ? 1 : 0,
                'is_active' => isset($_POST['is_active']) ? 1 : 0,
            ];

            $model->create($data);

            $_SESSION['success'] = "Request type created successfully.";
        } catch (Exception $e) {

            error_log($e->getMessage());

            $_SESSION['error'] = "Failed to create request type.";
        }

        header("Location: index.php?url=admin-request-types");
        exit;
    }
}
