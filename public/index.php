<?php
session_start();

//classes
require_once "../app/Core/View.php";
require_once "../app/Core/Auth.php";

//controllers
require_once "../app/Controllers/AuthController.php";
require_once "../app/Controllers/DashboardController.php";
require_once "../app/Controllers/AdminController.php";
require_once "../app/Controllers/EmployeeController.php";
require_once "../app/Controllers/ProfileController.php";
require_once "../app/Controllers/EmployeePortalController.php";

$url = $_GET['url'] ?? 'home';

$publicRoutes = [
    'home',
    'login',
    'register',
    'session-expired'
];

/**
 * Session timeout check
 */
if (
    !in_array($url, $publicRoutes) &&
    isset($_SESSION['last_activity']) &&
    time() - $_SESSION['last_activity'] > 1800
) {
    header("Location: index.php?url=session-expired");
    exit;
}

// Update activity time only if logged in
if (Auth::check()) {
    $_SESSION['last_activity'] = time();
}

switch ($url) {

    case 'home':
        View::render("home", ['title' => 'Welcome | SEMSYS']);
        break;

    case 'register':
        (new AuthController)->register();
        break;

    case 'set-password':
        (new AuthController)->setPassword();
        break;

    case 'save-password':
        (new AuthController)->savePassword();
        break;

    case 'login':
        (new AuthController)->login();
        break;

    case 'dashboard':
        (new DashboardController)->index();
        break;

    case 'logout':
        (new AuthController)->logout();
        break;

    case 'session-expired':
        (new AuthController)->sessionExpired();
        break;

    case 'user-index':
        (new AdminController)->index();
        break;

    case 'admin-users-create':
        (new AdminController)->create();
        break;

    case 'admin-users-update':
        (new AdminController)->update();
        break;

    case 'admin-users-delete':
        (new AdminController)->delete();
        break;

    case 'admin-users-activate':
        (new AdminController)->activate();
        break;

    case 'profile':
        (new ProfileController)->index();
        break;

    case 'employer-profile':
        (new ProfileController)->employeeProfile();
        break;

    case 'profile-save-password':
        (new ProfileController)->savePassword();
        break;

    case 'employee-index':
        (new EmployeeController)->index();
        break;

    case 'admin-employees-create':
        (new EmployeeController)->create();
        break;

    case 'admin-employees-view':
        (new EmployeeController)->viewEmployee();
        break;

    case 'admin-employees-edit':
        (new EmployeeController)->editEmployee();
        break;

    case 'admin-employees-update':
        (new EmployeeController)->updateEmployee();
        break;

    case 'employee-portal':
        (new EmployeePortalController)->index();
        break;

    case 'employee-module':
        (new EmployeePortalController)->employeeModule();
        break;

    default:
        View::render("error", ['title' => '404 Not Found | SEMSYS']);
        break;
}
