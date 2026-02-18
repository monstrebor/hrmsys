<?php

require_once "../app/Models/User.php";

require_once "../app/Core/Controller.php";
require_once "../app/Core/Validator.php";
require_once "../app/Core/Helpers.php";
require_once "../app/Core/Mailer.php";
require_once "../app/Core/EmailView.php";


class AuthController extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('auth/register', ['title' => 'Register | SEMSYS']);
            return;
        }

        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if (!$name || !$email) {
            $_SESSION['error'] = "All fields are required.";
            header("Location: index.php?url=register");
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email address.";
            header("Location: index.php?url=register");
            exit;
        }

        $token = bin2hex(random_bytes(32));

        $userModel = new User();
        if (!$userModel->registerWithoutPassword($name, $email, $token)) {
            $_SESSION['error'] = "Email already exists.";
            header("Location: index.php?url=register");
            exit;
        }

        $link = "http://localhost/semsys/public/index.php?url=set-password&token=$token";

        $sent = Mailer::send(
            $email,
            "Set your SEMSYS password",
            "<p>Hello <strong>$name</strong>,</p>
         <p>Click the link below to set your password:</p>
         <p><a href='$link'>$link</a></p>
         <p>This link expires in 1 hour.</p>"
        );

        if (!$sent) {
            $_SESSION['error'] = "Account created, but email failed. Contact admin.";
            header("Location: index.php?url=login");
            exit;
        }

        $_SESSION['success'] = "Account created. Please check your email.";
        header("Location: index.php?url=login");
        exit;
    }

    public function setPassword()
    {
        $token = $_GET['token'] ?? '';

        $userModel = new User();
        if (!$userModel->isValidToken($token)) {
            $this->view('auth/token-expired', [
                'title' => 'Link Expired'
            ]);
            return;
        }

        $this->view('auth/set-password', [
            'title' => 'Set Password',
            'token' => $token
        ]);
    }


    public function savePassword()
    {
        $token    = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$token || !$password) {
            die("Invalid request.");
        }

        if (strlen($password) < 8) {
            die("Password must be at least 8 characters.");
        }

        $userModel = new User();

        $updated = $userModel->setPasswordByToken($token, $password);

        if ($updated) {
            $this->view('auth/password-success', [
                'title' => 'Success'
            ]);
            return;
        }

        $this->view('auth/token-expired', [
            'title' => 'Link Expired'
        ]);
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $_SESSION['old'] = $_POST;

            $validator = new Validator();

            $validator->validate($_POST, [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($validator->fails()) {
                $_SESSION['error'] = reset($validator->errors());
                header("Location: index.php?url=login");
                exit;
            }

            $userModel = new User();
            $user = $userModel->login($_POST['email'], $_POST['password']);

            if ($user === 'inactive') {
                $_SESSION['error'] = "Your account has been deactivated. Please contact the administrator.";
                header("Location: index.php?url=login");
                exit;
            }

            if ($user === false) {
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: index.php?url=login");
                exit;
            }

            unset($_SESSION['old']);
            $_SESSION['user'] = $user;
            $_SESSION['success'] = "Login successful!";
            header("Location: index.php?url=dashboard");
            exit;
        }

        $this->view('auth/login', [
            'title' => 'Login | SEMSYS'
        ]);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['user']);
        $_SESSION['success'] = "You have successfully logged out.";
        session_regenerate_id(true);
        header("Location: index.php?url=home");
        exit;
    }


    public function sessionExpired()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        session_start();
        $_SESSION['error'] = "Your session has expired. Please login again.";

        header("Location: index.php?url=login");
        exit;
    }
}
