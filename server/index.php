<?php

use controllers\Router;

require_once("Autoloader.php");
require_once("LoaderEnv.php");

Autoloader::register();

LoaderEnv::loadEnv(".env");




// On instancie notre routeur
$app = new Router();

$app->addRouteGET('map', MapController);

// On démarre l'application
$app->start();

