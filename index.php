<?php
require_once 'User.php';
require_once 'Book.php';

$user = new User();
$book = new Book();
$books = $book->getAllBooks();
?>

<?php include 'head.php'; ?>

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