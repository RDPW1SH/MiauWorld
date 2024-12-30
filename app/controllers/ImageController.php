<?php

class ImageController
{
    public function view()
    {
        // Extrair o ID do URL
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));
        $id = end($segments);

        // Validar o ID
        if (empty($id)) {
            http_response_code(404);
            header('Location: /errors/not-found');
            exit("ID da imagem não encontrado.");
        }

        require_once './app/views/image/view.php';
    }
}
