<?php

    $routes = require_once '../app/routes/routes.php';

    $route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    

    if(array_key_exists($route, $routes)) {
        $controllerName = $routes[$route]['controller'];
        
        $actionName = $routes[$route]['action'];

        require_once '../app/controllers/' . $controllerName . '.php';

        $controller = new $controllerName;
        $controller->$actionName();
    } else {
        http_response_code(404);
        header('Location: /errors/not-found.php');
        
    }
?>