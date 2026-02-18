<?php

require_once "../app/Models/User.php";

require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class ProfileController extends Controller
{
    public function index()
    {
        Auth::requireLogin();

        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            header("Location: index.php?url=login");
            exit;
        }

        $userModel = new User();
        $user = $userModel->findById($userId);

        $this->view('profile/profile', [
            'title' => 'My Profile | SEMSYS',
            'user'  => $user
        ]);
    }

    public function employeeProfile()
    {
        Auth::requireLogin();

        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            header("Location: index.php?url=login");
            exit;
        }

        $userModel = new User();
        $user = $userModel->findById($userId);

        $this->view('user/employee/profile/profile', [
            'title' => 'My Profile | SEMSYS',
            'user'  => $user
        ]);
    }

    public function savePassword()
    {
        Auth::requireLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?url=profile");
            exit;
        }

        $password = trim($_POST['password'] ?? '');

        if (!$password || strlen($password) < 8) {
            $_SESSION['error'] = "Password must be at least 8 characters.";
            header("Location: index.php?url=profile");
            exit;
        }

        $userModel = new User();
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $updated = $userModel->updatePassword($_SESSION['user']['id'], $hash);

        if ($updated) {
            $_SESSION['success'] = "Password updated successfully!";
        } else {
            $_SESSION['error'] = "Failed to update password. Try again.";
        }

        header("Location: index.php?url=profile");
        exit;
    }
}
