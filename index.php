<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Boekenwebshop</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>📚 Boekenwebshop</h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Categorieën</a></li>
        <li><a href="#">Bestellingen</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="filters">
      <label for="category">Filter op categorie:</label>
      <select id="category">
        <option>Alle</option>
        <option>Fantasy</option>
        <option>Thriller</option>
        <option>Horror</option>
        <option>Non-fictie</option>
      </select>
    </section>

    <section class="book-list">
      <article class="book-card">
        <img src="book1.jpg" alt="Boekcover">
        <h2>De verborgen stad</h2>
        <p>Auteur: Naam</p>
        <p>Genre: Fantasy</p>
        <p>Prijs: €19,99</p>
        <button>Bestel</button>
      </article>

      <article class="book-card">
        <img src="book2.jpg" alt="Boekcover">
        <h2>De schaduwcode</h2>
        <p>Auteur: Naam</p>
        <p>Genre: Thriller</p>
        <p>Prijs: €14,99</p>
        <button>Bestel</button>
      </article>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Mijn Boekenwebshop</p>
  </footer>
</body>
</html>