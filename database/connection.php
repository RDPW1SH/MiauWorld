<?php
include './config.php';
class Connection
{

    private static $instance = null;

    public static function getInstance()
    {

        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    dsn: "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=3306;",
                    username: DB_USER,
                    password: DB_PASS,
                    options: [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die('Erro de conexão: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
