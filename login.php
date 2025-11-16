<?php
require_once 'User.php';
$user = new User();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user->login($_POST['email'], $_POST['password'])) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Ongeldige login.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" href="/webshop/style.css?v=<?= time() ?>">
</head>
<body>
    <div class="form-wrapper">
        <div class="form-box">
            <form method="POST">
                <h2 class="form-title">Inloggen</h2>

                <?php if ($error): ?>
                    <div class="error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <input type="email" name="email" class="form-input" placeholder="E-mailadres" required>
                <input type="password" name="password" class="form-input" placeholder="Wachtwoord" required>

                <button type="submit" class="form-button">Inloggen</button>

                <div class="form-footer">
                    <p>Geen account? <a href="register.php">Registreren</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>