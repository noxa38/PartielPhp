<?php
// Configuration de la base de données
$host     = 'localhost';
$dbname   = 'partielphp';  // Remplace par le nom de ta base de données
$username = 'root';          // Remplace par ton identifiant MySQL
$password = '';              // Remplace par ton mot de passe MySQL
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
