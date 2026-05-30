<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\JWT;
use App\Models\Auth;

class ApiController extends Controller
{
    public function token()
    {
        header('Content-Type: application/json');
        if (!Request::isPost()) {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            return;
        }

        $email = Request::post('email');
        $password = Request::post('password');
        $role = Request::post('role');

        $auth = new Auth();
        $user = $auth->attempt($email, $password, $role);
        if (!$user) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $token = JWT::createToken(['user_id' => $user['id'], 'role' => $user['role_name']]);
        echo json_encode(['token' => $token, 'user' => $user]);
    }

    public function students()
    {
        header('Content-Type: application/json');
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (!preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
            http_response_code(401);
            echo json_encode(['error' => 'Token required']);
            return;
        }

        $payload = JWT::verifyToken($matches[1]);
        if (!$payload) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid token']);
            return;
        }

        echo json_encode([
            'status' => 'success',
            'data' => [
                ['id' => 1, 'name' => 'سعيد الطالب', 'group' => 'مجموعة الإمام نافع'],
                ['id' => 2, 'name' => 'مريم', 'group' => 'مجموعة المراجعة']
            ]
        ]);
    }
}
