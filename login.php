<?php include 'db.php'; session_start(); ?>
<?php
require_once 'User.php';
$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user->login($_POST['email'], $_POST['password'])) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Ongeldige login";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-wrapper">
  <div class="form-box">
    <form method="post">
      <h2 class="form-title">Inloggen</h2>
      <input type="email" name="email" placeholder="E-mail" class="form-input" required>
      <input type="password" name="password" placeholder="Wachtwoord" class="form-input" required>
      <button type="submit" class="form-button">Log in</button>
      <p class="form-footer"><a href="register.php">Nog geen account? Registreer hier</a></p>
    </form>
  </div>
</div>


</body>
</html>
