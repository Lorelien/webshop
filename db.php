<?php
$host = 'localhost';
$dbname = 'webshop';
$user = 'root';
$pass = ''; // standaard bij XAMPP

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Databaseverbinding mislukt: " . $e->getMessage());
}
?>
