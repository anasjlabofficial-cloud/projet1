<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $role = strtolower($user['role_name'] ?? 'student');
        $view = 'dashboard/' . $role;
        $data = ['user' => $user];

        if ($role === 'admin') {
            $userModel = $this->model('User');
            $data['counts'] = [
                'students' => count($userModel->getUsersByRole('student')),
                'teachers' => count($userModel->getUsersByRole('teacher')),
                'parents' => count($userModel->getUsersByRole('parent')),
                'pending' => count($userModel->getPendingUsers()),
            ];
        }

        $this->view($view, $data);
    }
}
