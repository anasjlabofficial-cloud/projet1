<?php

namespace App\Controllers;

use App\Core\Session;

class LogoutController
{
    public function index()
    {
        Session::destroy();
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
}
