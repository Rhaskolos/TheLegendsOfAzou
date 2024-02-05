<?php

require_once("Autoloader.php");
require_once("LoaderEnv.php");

Autoloader::register();
LoaderEnv::loadEnv(".env");

use controller\Router;
use controller\HomeController;
use controller\MapController;





// router instantiation
$router = new Router();

//put here all the routes to load
$router->addRoute("/", new HomeController());

$router->addRoute("/map",  new MapController());

// starting the router
$router->delegate();


