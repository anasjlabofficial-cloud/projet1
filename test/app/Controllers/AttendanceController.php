<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\CSRF;
use App\Core\Session;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $attendanceModel = new Attendance();
        $students = (new Student())->getAllActive();
        $records = $attendanceModel->getRecent();

        $this->view('dashboard/attendance', [
            'user' => $user,
            'students' => $students,
            'records' => $records,
        ]);
    }

    public function submit()
    {
        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $studentId = (int) Request::post('student_id');
        $status = Request::post('status');
        $sessionDate = Request::post('session_date');
        $note = Request::post('note');

        $attendanceModel = new Attendance();
        $attendanceModel->recordAttendance($studentId, $status, $sessionDate, $note);

        header('Location: ' . BASE_URL . 'attendance');
        exit;
    }
}
