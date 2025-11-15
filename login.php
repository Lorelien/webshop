<?php include 'db.php'; session_start(); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $pdo->prepare("SELECT user_id, firstname, password_hash FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['firstname'] = $user['firstname'];
    echo "✅ Welkom terug, " . htmlspecialchars($user['firstname']) . "!";
  } else {
    echo "❌ Ongeldige login";
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
