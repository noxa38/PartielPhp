<?php
require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $pdo;
    private $userModel;
    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';  // Inclut $pdo
        $this->pdo = $pdo;
        $this->userModel = new User($this->pdo);
    }
    
  
    public function login() {
        require_once __DIR__ . '/../Views/login.php';
    }
    
    //connexion
    public function doLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $user = $this->userModel->getByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                // Démarrer la session et rediriger vers les tâches
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header("Location: /tasks");
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }
        require_once __DIR__ . '/../Views/login.php';
    }
    
    
    // Déconnexion de l'utilisateur
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }
}
?>
