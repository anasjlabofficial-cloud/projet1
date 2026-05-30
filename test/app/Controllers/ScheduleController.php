<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\CSRF;
use App\Core\Request;
use App\Core\Session;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $schedule = new Schedule();
        $sessions = $schedule->getAll();

        $this->view('dashboard/schedule', [
            'user' => $user,
            'sessions' => $sessions,
        ]);
    }

    public function edit($id)
    {
        $user = Session::get('user');
        if (!$user || !in_array(strtolower($user['role_name']), ['admin', 'teacher'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $schedule = new Schedule();
        $session = $schedule->findById((int) $id);
        if (!$session) {
            header('Location: ' . BASE_URL . 'schedule');
            exit;
        }

        $this->view('dashboard/schedule_edit', [
            'user' => $user,
            'session' => $session,
        ]);
    }

    public function create()
    {
        $user = Session::get('user');
        if (!$user || !in_array(strtolower($user['role_name']), ['admin', 'teacher'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $schedule = new Schedule();
        $schedule->create([ 
            'day_name' => Request::post('day_name'),
            'session_date' => Request::post('session_date'),
            'session_time' => Request::post('session_time'),
            'description' => Request::post('description'),
            'status' => Request::post('status'),
        ]);

        header('Location: ' . BASE_URL . 'schedule');
        exit;
    }

    public function update($id)
    {
        $user = Session::get('user');
        if (!$user || !in_array(strtolower($user['role_name']), ['admin', 'teacher'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $schedule = new Schedule();
        $schedule->update((int) $id, [
            'day_name' => Request::post('day_name'),
            'session_date' => Request::post('session_date'),
            'session_time' => Request::post('session_time'),
            'description' => Request::post('description'),
            'status' => Request::post('status'),
        ]);

        header('Location: ' . BASE_URL . 'schedule');
        exit;
    }

    public function delete($id)
    {
        $user = Session::get('user');
        if (!$user || !in_array(strtolower($user['role_name']), ['admin', 'teacher'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $schedule = new Schedule();
        $schedule->delete((int) $id);

        header('Location: ' . BASE_URL . 'schedule');
        exit;
    }
}
