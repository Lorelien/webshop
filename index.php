<?php
session_start();
include 'db.php'; 

?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Boekenwebshop</title>
  <link rel="stylesheet" href="/webshop/style.css">
</head>
<body>

  <header class="main-header">
    <div class="header-container">
      <div class="header-left">
        <h1>Mijn Boekenwebshop</h1>
      </div>
      <div class="header-right">
        <?php if (isset($_SESSION['user_id'])): ?>
          <span>Welkom, <?= htmlspecialchars($_SESSION['firstname']) ?>!</span>
          <a href="logout.php">Uitloggen</a>
        <?php else: ?>
          <a href="login.php">Inloggen</a>
          <a href="register.php">Registreren</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <main>
    <section class="book-list">
      <?php
      $stmt = $pdo->query("SELECT title, author, genre, price, cover_image FROM books");
      while ($book = $stmt->fetch()) {
        echo "<article class='book-card'>";
        $image = htmlspecialchars($book['cover_image'] ?? 'placeholder.jpg');
        echo "<img src='images/$image' alt='Boekcover'>";
        echo "<h2>" . htmlspecialchars($book['title']) . "</h2>";
        echo "<p class='author'>Auteur: " . htmlspecialchars($book['author']) . "</p>";
        echo "<p class='genre'>Genre: " . htmlspecialchars($book['genre']) . "</p>";
        echo "<p class='price'>Prijs: €" . number_format($book['price'], 2, ',', '.') . "</p>";
        echo "<button>Bestel</button>";
        echo "</article>";
      }
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Mijn Boekenwebshop</p>
  </footer>

</body>
</html>