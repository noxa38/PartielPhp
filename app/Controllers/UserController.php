<?php

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = User::findByEmail($email);
            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION['user_id'] = $user->id;
                header("Location: ../app/Views/tasks.php");
            } else {
                echo "Invalid credentials";
            }
        }
    }


    public function register() {
        require_once '../app/Models/User.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            
            if (empty($name) || empty($email) || empty($password)) {
                echo "Veuillez remplir tous les champs.";
                return;
            }

          
            try {
                User::create($name, $email, $password);
                header("Location: /login.php");
                exit();  
            } catch (Exception $e) {
                echo "Erreur lors de l'enregistrement : " . $e->getMessage();
            }
        } else {
           
            require_once '../app/Views/register.php';
        }
    }
}
?>
