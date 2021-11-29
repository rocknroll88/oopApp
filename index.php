<?php

use Controllers\MainController;
use Services\Db;

spl_autoload_register(function ($class) {
    include $class . '.php';
});

$route = $_GET['route'];
$routes = require __DIR__ . '\routes\routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $ControllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}
unset($matches[0]);
$controller = new $ControllerAndAction[0];
$action = $ControllerAndAction[1];
$controller->$action(...$matches);
