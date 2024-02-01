<?php

use controller\Router;


require_once("Autoloader.php");
require_once("LoaderEnv.php");

Autoloader::register();

LoaderEnv::loadEnv(".env");


// On instancie notre routeur
$router = new Router();

$router->addRoute("GET", "map");

// On démarre l'application
$router->delegate();
