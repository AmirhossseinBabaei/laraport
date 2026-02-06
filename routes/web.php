<?php

use Core\Routing\Router as Router;

$route = new Router();
$route->addRoute('/home', [\App\Http\Controllers\HomeController::class, 'index'], 'GET');
$route->resolveRoute();
