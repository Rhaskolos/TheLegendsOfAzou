<?php
require_once "./Personnages.php";
require_once "./Mage.php";
require_once "./MeleeFighter.php";
require_once "./Range.php";

$melee = new MeleeFighter("Azou");

var_dump($melee);

$melee->move();

$melee->attack();

$melee->attacked();
?>