<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\CSRF;
use App\Core\Session;
use App\Models\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $message = Session::flash('message');
        $errors = Session::flash('errors') ?? [];
        $this->view('auth/login', ['message' => $message, 'errors' => $errors]);
    }

    public function authenticate()
    {
        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $auth = new Auth();
        $email = Request::post('email');
        $password = Request::post('password');
        $role = Request::post('role');

        $user = $auth->attempt($email, $password, $role);
        if ($user === null) {
            Session::set('errors', ['البريد الإلكتروني أو كلمة المرور غير صحيحة أو الحساب غير مفعل.']);
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        Session::set('user', $user);
        Session::set('role', $user['role_name']);
        header('Location: ' . BASE_URL . 'dashboard');
        exit;
    }

    public function logout()
    {
        Session::destroy();
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
}
