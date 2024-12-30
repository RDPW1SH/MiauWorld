<?php

require_once  './database/connection.php';

class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    // Função Login
    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user) {

            if (password_verify($password, $user['password'])) {
                return $user; // Login bem-sucedido
            } else {
                return false; // Password incorreta
            }
        } else {
            return false; // Email não existe
        }
    }

    // Função Register
    public function register($email, $password, $username)
    {
        // Verificar se o email já existe
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            return false;
        } else {

            $slug = strtolower($username);
            // Inserir novo usuário com password hash
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO users (nome, email, password, slug) VALUES (:nome, :email, :password, :slug)";
            $insertStmt = $this->db->prepare($insertQuery);
            $insertStmt->bindParam(':usernane', $username);
            $insertStmt->bindParam(':email', $email);
            $insertStmt->bindParam(':password', $hashedPassword);
            $insertStmt->bindParam(':slug', $slug);


            return $insertStmt->execute();
        }
    }

    // Função Recuperar Password
    public function recoverPassword($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}
