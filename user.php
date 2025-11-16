<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
        session_start();
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT id, firstname, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            return true;
        }
        return false;
    }

    public function register($firstname, $email, $password) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) return false;

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (firstname, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$firstname, $email, $hashed]);
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}