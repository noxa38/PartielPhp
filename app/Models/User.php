<?php
class User {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
 
    public function create($name, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$name, $email, $hashedPassword]);
    }
    

    public function getByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>
