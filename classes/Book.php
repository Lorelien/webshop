<?php
include_once(__DIR__ . 'Db.php');

class Book {
    private $db;

    public function setDatabase(Database $database) {
        $this->db = $database->getConnection();
    }

    public function getAllBooks() {
        $stmt = $this->db->query("SELECT book_id AS id, title, author, price, image FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}