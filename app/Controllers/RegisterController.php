<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\CSRF;
use App\Core\Session;
use App\Models\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        $message = Session::flash('message');
        $errors = Session::flash('errors') ?? [];
        $this->view('auth/register', ['message' => $message, 'errors' => $errors]);
    }

    public function submit()
    {
        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $data = Request::all();
        $auth = new Auth();
        $errors = $auth->register($data);

        if (!empty($errors)) {
            Session::set('errors', $errors);
            header('Location: ' . BASE_URL . 'register');
            exit;
        }

        Session::set('message', 'تم إرسال طلب التسجيل. انتظر موافقة المدير.');
        header('Location: ' . BASE_URL . 'register');
        exit;
    }
}
