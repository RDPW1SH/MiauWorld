<?php

// Permitir acesso a arquivos estáticos diretamente
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = require_once './app/routes/routes.php';

$route = trim($path, '/');

// Roteamento MVC
if (array_key_exists($route, $routes)) {


    $controllerName = $routes[$route]['controller'];
    $actionName = $routes[$route]['action'];


    //var_dump($controllerName);
    //var_dump($actionName);

    require_once './app/controllers/' . $controllerName . '.php';

    $controller = new $controllerName;
    $controller->$actionName();
    exit;
} else {
}
