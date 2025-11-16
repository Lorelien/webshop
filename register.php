<?php
require_once 'User.php';
$user = new User();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($firstname) || empty($email) || empty($password)) {
        $error = "Alle velden zijn verplicht.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ongeldig e-mailadres.";
    } else {
        $registered = $user->register($firstname, $email, $password);
        if ($registered) {
            $success = "Registratie geslaagd! Je kunt nu inloggen.";
        } else {
            $error = "E-mailadres is al in gebruik.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="/webshop/style.css?v=<?= time() ?>">
</head>
<body>
    <div class="form-wrapper">
        <div class="form-box">
            <form method="POST">
                <h2 class="form-title">Maak een account aan</h2>

                <?php if ($error): ?>
                    <div class="error"><?= htmlspecialchars($error) ?></div>
                <?php elseif ($success): ?>
                    <div class="success" style="color: green; text-align: center; margin-bottom: 1rem;">
                        <?= htmlspecialchars($success) ?>
                    </div>
                <?php endif; ?>

                <input type="text" name="firstname" class="form-input" placeholder="Voornaam" required>
                <input type="email" name="email" class="form-input" placeholder="E-mailadres" required>
                <input type="password" name="password" class="form-input" placeholder="Wachtwoord" required>

                <button type="submit" class="form-button">Registreren</button>

                <div class="form-footer">
                    <p>Heb je al een account? <a href="login.php">Inloggen</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>