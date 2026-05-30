<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\User;

class AdminController extends Controller
{
    public function pending()
    {
        $user = Session::get('user');
        if (!$user || strtolower($user['role_name']) !== 'admin') {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $userModel = new User();
        $pendingUsers = $userModel->getPendingUsers();
        $this->view('admin/pending', ['user' => $user, 'pendingUsers' => $pendingUsers]);
    }

    public function approve($id)
    {
        $user = Session::get('user');
        if (!$user || strtolower($user['role_name']) !== 'admin') {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $userModel = new User();
        $userModel->setStatus((int) $id, 'active');
        header('Location: ' . BASE_URL . 'admin/pending');
        exit;
    }

    public function reject($id)
    {
        $user = Session::get('user');
        if (!$user || strtolower($user['role_name']) !== 'admin') {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $userModel = new User();
        $userModel->setStatus((int) $id, 'rejected');
        header('Location: ' . BASE_URL . 'admin/pending');
        exit;
    }

    public function messages($userId = null)
    {
        $user = Session::get('user');
        if (!$user || strtolower($user['role_name']) !== 'admin') {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $messageModel = new \App\Models\Message();
        if ($userId !== null) {
            $messages = $messageModel->getForUser((int) $userId);
        } else {
            $messages = $messageModel->getAll();
        }

        $users = (new User())->getAll();

        $this->view('admin/messages', [
            'user' => $user,
            'messages' => $messages,
            'users' => $users,
        ]);
    }
}