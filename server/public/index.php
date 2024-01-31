<?php
use server\Autoloader;
use server\core\Router;

require_once('../Autoloader.php');

Autoloader::register();




// On instancie notre routeur
$app = new Router();

// On démarre l'application
$app->start();


