
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Création du compte</h1>
    <form method="POST" action="../Controllers/UserController.php" >
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>

    <a href="login.php">Ce connecté</a>
</body>
</html>
