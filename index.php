<?php

require_once "./Character.php";
require_once "./Mage.php";
require_once "./Melee.php";
require_once "./Range.php";

$melee = new Melee("Azou");

var_dump($melee);

$melee->move();

$melee->attack();

$melee->attacked();
