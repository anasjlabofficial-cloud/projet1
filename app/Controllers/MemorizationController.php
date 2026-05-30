<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\CSRF;
use App\Core\Session;
use App\Models\Memorization;

class MemorizationController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $memorizationModel = new Memorization();
        $records = $memorizationModel->getRecent();

        $this->view('dashboard/memorization', [
            'user' => $user,
            'records' => $records,
        ]);
    }

    public function submit()
    {
        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $studentId = Session::get('user')['id'];
        $surah = Request::post('surah');
        $pages = (int) Request::post('pages_memorized');
        $revisionScore = (int) Request::post('revision_score');

        $memorizationModel = new Memorization();
        $memorizationModel->createRecord($studentId, $surah, $pages, $revisionScore);

        header('Location: ' . BASE_URL . 'memorization');
        exit;
    }
}
