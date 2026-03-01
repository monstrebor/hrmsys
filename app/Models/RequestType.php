<?php
require_once "../app/Core/Database.php";

class RequestType
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function all()
    {
        $stmt = $this->conn->prepare("
            SELECT 
                id,
                name,
                description,
                icon,
                requires_attachment,
                is_active,
                created_at
            FROM request_types
            ORDER BY id DESC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
        INSERT INTO request_types
        (name, description, icon, requires_attachment, is_active)
        VALUES (?, ?, ?, ?, ?)
    ");

        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['icon'],
            $data['requires_attachment'],
            $data['is_active']
        ]);
    }
}
