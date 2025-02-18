<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
</head>
<body>
  <h1>Connexion</h1>
  <?php if (isset($error)) : ?>
      <p style="color:red;"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>
  <form action="/?action=doLogin" method="post">
    <label>Email : <input type="email" name="email" required></label><br>
    <label>Mot de passe : <input type="password" name="password" required></label><br>
    <button type="submit">Se connecter</button>
  </form>
 
</body>
</html>
