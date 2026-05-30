<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\CSRF;
use App\Core\Session;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        if (!$user) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $messages = (new Message())->getRecentForUser($user['id']);
        $recipients = (new User())->getAll();

        $this->view('dashboard/messages', [
            'user' => $user,
            'messages' => $messages,
            'recipients' => $recipients,
        ]);
    }

    public function send()
    {
        if (!Request::isPost() || !CSRF::validate(Request::post(CSRF_TOKEN_NAME))) {
            die('طلب غير صالح');
        }

        $user = Session::get('user');
        if (!$user) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $receiverId = (int) Request::post('receiver_id');
        $subject = Request::post('subject');
        $body = Request::post('body');

        $messageModel = new Message();
        $messageModel->sendMessage($user['id'], $receiverId, $subject, $body);

        header('Location: ' . BASE_URL . 'messages');
        exit;
    }
}
