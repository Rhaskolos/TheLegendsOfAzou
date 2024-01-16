<?php

require_once "./Character.php";
require_once "./Mage.php";
require_once "./Melee.php";
require_once "./Range.php";
require_once "./Moving.php";
require_once "./Table.php";



$table = new Table (3,3);
$table->addObstacle(0,2);

$melee = new Melee("Azou",);
$melee->setTable($table);
$melee->setPositionXCharacter(0);
$melee->setPositionYCharacter(0);

$table->initializeCharacterPosition($melee);

$table->displayTable();

echo("\n");

$melee->moveDown();

$table->displayTable();

echo("\n");
$melee->moveDown();

$table->displayTable();




