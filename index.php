<?php

// Permitir acesso a arquivos estáticos diretamente
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (file_exists(__DIR__ . $path) && is_file(__DIR__ . $path)) {
    return false; // Deixa o Apache servir o arquivo diretamente
}

$routes = require_once './app/routes/routes.php';

$route = trim($path, '/');

// Roteamento MVC
if (array_key_exists($route, $routes)) {

    
    $controllerName = $routes[$route]['controller'];
    $actionName = $routes[$route]['action'];
    
    require_once './app/controllers/' . $controllerName . '.php';

    $controller = new $controllerName;
    $controller->$actionName();
    exit;
} else {
    http_response_code(404);
    header('Location: /errors/not-found.php');
    exit;
}
