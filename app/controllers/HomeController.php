<?php
class HomeController
{


    private $homeModel;


    public function index()
    {
        require_once './app/models/HomeModel.php';

        $this->homeModel = new HomeModel();

        $endpoint = 'https://cataas.com/api/cats?limit=5&skip=10';

        $homeData = $this->homeModel->getCats($endpoint);

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
