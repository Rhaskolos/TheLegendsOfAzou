<?php

require_once("Autoloader.php");
require_once("LoaderEnv.php");

Autoloader::register();

use controller\Router;



LoaderEnv::loadEnv(".env");


// On instancie notre routeur
$router = new Router();

$router->addRoute("GET","map","MapController");

// On démarre l'application
$router->delegate();


