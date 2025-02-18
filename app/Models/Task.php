<?php
class Task {
    public $id;
    public $title;
    public $description;
    public $status;
    public $user_id;

    public static function all($userId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function create($title, $description, $status, $userId) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO tasks (title, description, status, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $description, $status, $userId]);
    }
}
?>
