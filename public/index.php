<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: /tasks.php");
} else {
    header("Location: /login.php");
}
?>
