<?php

use server\core\Router;


// On définit une constante contenant le dossier racine du projet
define('ROOT', dirname(__DIR__));

require_once(ROOT.'server/autoload.php');

// On instancie Main (notre routeur)
$app = new Router();

// On démarre l'application
$app->start();


