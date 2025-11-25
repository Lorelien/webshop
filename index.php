<?php
include_once(__DIR__ . "/classes/Book.php");
include_once(__DIR__ . "/classes/User.php");

$user = new User();
$book = new Book();
$books = $book->getAllBooks();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?><!DOCTYPE html>
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
                <h1>Boekwebshop</h1>
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

<main>
    <div class="book-list">
        <?php if (empty($books)): ?>
            <p style="text-align: center;">Er zijn momenteel geen boeken beschikbaar.</p>
        <?php else: ?>
            <?php foreach ($books as $b): ?>
                <div class="book-card">
                    <img src="<?= htmlspecialchars($b['image']) ?>" alt="<?= htmlspecialchars($b['title']) ?>">
                    <h2><?= htmlspecialchars($b['title']) ?></h2>
                    <p><?= htmlspecialchars($b['author']) ?></p>
                    <p class="price">€<?= number_format($b['price'], 2, ',', '.') ?></p>
                    <button>Toevoegen aan mandje</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<footer>
    &copy; <?= date('Y') ?> Boekwebshop. Alle rechten voorbehouden.
</footer>

</body>
</html>