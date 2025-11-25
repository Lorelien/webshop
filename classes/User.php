<?php
include_once(__DIR__ . 'Db.php');

class User {
    private $db;
    private $firstname;
    private $email;
    private $password;

    public function setDatabase(Database $database) {
        $this->db = $database->getConnection();
        return $this;
    }

    public function setFirstname($firstname) { 
        $this->firstname = $firstname; 
        return $this;
    }

    public function setEmail($email) { 
        $this->email = $email; 
        return $this;
    }

    public function setPassword($password) { 
        $this->password = $password; 
        return $this;
    }

    public function getFirstname() { 
        return $this->firstname; 
    }
    
    public function getEmail() { 
        return $this->email; 
    }


    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT user_id AS id, firstname, password_hash FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            return true;
        }
        return false;
    }

    public function register($firstname, $email, $password) {
        $stmt = $this->db->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) return false;

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (firstname, email, password_hash) VALUES (?, ?, ?)");
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