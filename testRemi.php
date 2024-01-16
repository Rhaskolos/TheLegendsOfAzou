<?php

require_once "./Character.php";
require_once "./Mage.php";
require_once "./Melee.php";
require_once "./Range.php";
require_once "./Decor.php";
require_once "./Moving.php";
require_once "./Obstacle.php";



$decor = new Decor();
$decor->addObstacle(new Obstacle(3, 1));
$decor->addObstacle(new Obstacle(2, 1));

$melee = new Melee("Azou");
$melee->setDecor($decor);
$melee->setPositionXCharacter(1);
$melee->setPositionYCharacter(1);


$melee->moveDown();
//var_dump($melee);