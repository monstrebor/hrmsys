<?php

require_once "../app/Core/Database.php";

class Request extends Database
{
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO requests
            (user_id, request_type_id, title, details, attachment)
            VALUES
            (:user_id, :request_type_id, :title, :details, :attachment)
        ");

        return $stmt->execute([
            ':user_id' => $data['user_id'],
            ':request_type_id' => $data['request_type_id'],
            ':title' => $data['title'],
            ':details' => $data['details'],
            ':attachment' => $data['attachment']
        ]);
    }

    public function getAll()
{
    $stmt = $this->conn->prepare("
        SELECT 
            r.id,
            r.title,
            r.details,
            r.status,
            r.created_at,
            rt.name AS request_type,
            u.name AS user_name
        FROM requests r
        LEFT JOIN request_types rt ON r.request_type_id = rt.id
        LEFT JOIN users u ON r.user_id = u.id
        ORDER BY r.created_at DESC
    ");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}