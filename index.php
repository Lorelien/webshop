<?php 

include 'db.php'; 
session_start();

?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Boekenwebshop</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>📚 Mijn Boekenwebshop</h1>
    <?php
  if (isset($_SESSION['user_id'])) {
    echo "<p>Welkom, " . htmlspecialchars($_SESSION['firstname']) . "!</p>";
    echo "<a href='logout.php'>Uitloggen</a>";
  } else {
    echo "<a href='login.php'>Inloggen</a> | <a href='register.php'>Registreren</a>";
  }
  ?>

  </header>

  <main>
    <section class="book-list">
      <?php
      $stmt = $pdo->query("SELECT cover_image, title, author, genre, price FROM books");
      while ($book = $stmt->fetch()) {
        echo "<article class='book-card'>";
        echo "<img src='images/" . htmlspecialchars($book['cover_image']) . "' alt='Boekcover'>";
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