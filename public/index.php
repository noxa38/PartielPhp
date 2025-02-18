<?php
// Configuration de la base de données
$host    = 'localhost';
$dbname  = 'projetphp';  // Remplace par le nom de ta base de données
$username = 'root';         // Remplace par ton identifiant MySQL
$password = '';             // Remplace par ton mot de passe MySQL
$charset  = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Options pour PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Affiche les erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Création d'une instance PDO pour se connecter à la base
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connexion à la base de données réussie.<br>";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Création de la table "users"
$createUsersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;
";

// Création de la table "tasks"
$createTasksTable = "
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('À faire', 'En cours', 'Terminé') DEFAULT 'À faire',
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=INNODB;
";

try {
   
    $pdo->exec($createUsersTable);
    $pdo->exec($createTasksTable);
    echo "Tables 'users' et 'tasks' créées avec succès.";
} catch (PDOException $e) {
    die("Erreur lors de la création des tables : " . $e->getMessage());
}
?>
