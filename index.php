<?php

// Permitir acesso a arquivos estáticos diretamente
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = require_once './app/routes/routes.php';

$route = trim($path, '/');

// Verificar se a rota é exata ou contém parâmetros dinâmicos
foreach ($routes as $key => $routeDetails) {

    // Substituir "{param}" por um padrão que captura o valor

    $pattern = preg_replace('/{[a-zA-Z_]+}/', '([^/]+)', $key);
    $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';

    if (preg_match($pattern, $route, $matches)) {
        // Identificar o controlador e ação
        $controllerName = $routeDetails['controller'];
        $actionName = $routeDetails['action'];

        // Capturar os parâmetros dinâmicos (se existirem)
        array_shift($matches); // Remove o match completo
        $params = $matches;

        require_once './app/controllers/' . $controllerName . '.php';
        $controller = new $controllerName();

        // Chamar a ação passando os parâmetros
        call_user_func_array([$controller, $actionName], $params);
        exit;
    }
}

// Rota não encontrada
http_response_code(404);
require_once './app/controllers/ErrorController.php';
$controller = new ErrorController();
$controller->index();
exit;
