<?php
class TaskController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login.php");
            exit;
        }

        $tasks = Task::all($_SESSION['user_id']);
        include 'views/tasks.php';
    }

    public function create() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            Task::create($title, $description, $status, $_SESSION['user_id']);
            header("Location: /tasks.php");
        }
    }
}
?>
