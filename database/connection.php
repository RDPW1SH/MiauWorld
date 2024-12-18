<?php

class Connection {

    private static $instance = null;

    public static function getInstance() {
        
        if(self::$instance === null) {
            try {
                self::$instance = new PDO(
                    dsn: 'mysql:host=sql108.infinityfree.com;dbname=if0_37792049_miauworld;port=3306',
                    username: 'if0_37792049',
                    password: 'hmfkeN6rA7',
                    options: [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch(PDOException $e) {
                die('Erro de conexão: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
?>