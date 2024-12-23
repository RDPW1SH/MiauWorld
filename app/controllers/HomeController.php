<?php
class HomeController
{


    private $homeModel;

    public function index()
    {
        require_once './app/models/HomeModel.php';

        $this->homeModel = new HomeModel();

        $endpoint = 'https://api.example.com/data';
        $params = ['key' => 'value'];

        $homeData = $this->homeModel->getCats($endpoint, $params);

        if (isset($homeData['error'])) {

            $errorMessage = $homeData['error'];
            $homeData = [];
            require_once './app/views/home.php';
        } else {

            require_once './app/views/home.php';
        }
    }
}
