<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'الرئيسية - كتاب الإمام نافع',
        ];
        $this->view('home/index', $data);
    }
}
