<?php
require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class DashboardController extends Controller
{
    public function index()
    {
        Auth::requireLogin();

        if (Auth::isAdmin()) {
            $this->view('admin/dashboard', [
                'title' => 'Admin Dashboard | HRMSYS'
            ]);
            return;
        }

        $this->view('user/dashboard', [
            'title' => 'Dashboard | HRMSYS'
        ]);
    }
}
