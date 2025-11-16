<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boekwebshop</title>
    <link rel="stylesheet" href="/webshop/style.css?v=<?= time() ?>">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-left">
                <h1>Welkom bij Boekwebshop</h1>
            </div>
            <div class="header-right">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span>Hallo <?= htmlspecialchars($_SESSION['firstname']) ?></span>
                    <a href="logout.php">Uitloggen</a>
                <?php else: ?>
                    <a href="login.php">Inloggen</a>
                    <a href="register.php">Registreren</a>
                <?php endif; ?>
            </div>
        </div>
    </header>