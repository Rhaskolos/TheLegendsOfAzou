<?php

require_once("Autoloader.php");
require_once("LoaderEnv.php");

Autoloader::register();

use controller\Router;
use controller\HomeController;
use controller\MapController;



LoaderEnv::loadEnv(".env");


// router instantiation
$router = new Router();

//put here all the routes to load
$router->addRoute("GET", "", new HomeController());

$router->addRoute("GET", "map",  new MapController());

// starting the router
$router->delegate();


