<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password_hash, created_at) VALUES (?, ?, ?, ?, NOW())");
  try {
    $stmt->execute([$firstname, $lastname, $email, $hash]);
    echo "✅ Account aangemaakt!";
  } catch (PDOException $e) {
    echo "❌ Fout: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
<div class="form-wrapper">
  <div class="form-box">
    <form method="post">
      <h2 class="form-title">Registreren</h2>
      <input type="text" name="firstname" placeholder="Voornaam" class="form-input" required>
  <input type="text" name="lastname" placeholder="Achternaam" class="form-input">
      <input type="email" name="email" placeholder="E-mail" class="form-input" required>
      <input type="password" name="password" placeholder="Wachtwoord" class="form-input" required>
      <button type="submit" class="form-button">Maak account aan</button>
      <p class="form-footer"><a href="login.php">Heb je al een account? Log hier in</a></p>
    </form>
  </div>
</div>


</body>
</html>
