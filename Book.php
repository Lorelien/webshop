<?php
require_once __DIR__ . '/db.php';

class Book {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
    }

    public function getAllBooks() {
        $stmt = $this->db->query("SELECT book_id AS id, title, author, price, cover_image FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}