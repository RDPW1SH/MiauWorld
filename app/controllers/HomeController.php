<?php
class HomeController
{


    private $homeModel;


    public function index()
    {
        require_once './app/models/HomeModel.php';
        require_once './database/connection.php';

        $db = Connection::getInstance();
        $this->homeModel = new HomeModel($db);

        $rand = rand(1, 1906);

        $endpoint = 'https://cataas.com/api/cats?limit=10&skip=' . $rand;

        $homeData = $this->homeModel->getCats($endpoint);
        $userId = $_SESSION['account_id'] ?? null;

        // Buscar curtidas do usuário
        $likes = $userId ? $this->homeModel->getLikes($userId) : [];

        if (isset($homeData['error'])) {
            // echo ('Erro ao buscar dados: ' . $homeData['error']);
            $errorMessage = $homeData['error'];
            $homeData = [];
        } else {
            error_log('Dados recebidos: ' . print_r($homeData, true));
        }

        require_once './app/views/home.php';
    }
}
