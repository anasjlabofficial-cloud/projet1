<?php

namespace App\Models;

use Config\Database;
use PDO;

class Message
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getRecentForUser(int $userId): array
    {
        $stmt = $this->db->prepare('SELECT m.*, u.first_name, u.last_name FROM messages m JOIN users u ON m.sender_id = u.id WHERE m.receiver_id = :receiver_id ORDER BY m.created_at DESC LIMIT 20');
        $stmt->execute(['receiver_id' => $userId]);
        return $stmt->fetchAll();
    }

    public function sendMessage(int $senderId, int $receiverId, string $subject, string $body): bool
    {
        $stmt = $this->db->prepare('INSERT INTO messages (sender_id, receiver_id, subject, body, status, created_at) VALUES (:sender_id, :receiver_id, :subject, :body, :status, NOW())');
        return $stmt->execute([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'subject' => $subject,
            'body' => $body,
            'status' => 'unread',
        ]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT m.*, s.first_name AS sender_first, s.last_name AS sender_last, r.first_name AS receiver_first, r.last_name AS receiver_last FROM messages m JOIN users s ON m.sender_id = s.id JOIN users r ON m.receiver_id = r.id ORDER BY m.created_at DESC');
        return $stmt->fetchAll();
    }

    public function getForUser(int $userId): array
    {
        $stmt = $this->db->prepare('SELECT m.*, s.first_name AS sender_first, s.last_name AS sender_last, r.first_name AS receiver_first, r.last_name AS receiver_last FROM messages m JOIN users s ON m.sender_id = s.id JOIN users r ON m.receiver_id = r.id WHERE m.sender_id = :uid OR m.receiver_id = :uid ORDER BY m.created_at DESC');
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetchAll();
    }
}
