<?php

require_once("Autoloader.php");
require_once("LoaderEnv.php");

Autoloader::register();

use controller\Router;



LoaderEnv::loadEnv(".env");


// router instantiation
$router = new Router();

//put here all the routes to load
$router->addRoute("GET","map","MapController");

// starting the router
$router->delegate();


