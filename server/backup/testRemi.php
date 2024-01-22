<?php

require_once "./Character.php";
require_once "./Mage.php";
require_once "./Melee.php";
require_once "./Range.php";
require_once "./Moving.php";
require_once "./Table.php";



$table = new Table (3,3);

$table->displayTable();

echo("\n");

$table->addObstacle(0,2);

$table->displayTable();

echo("\n");

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
echo("\n");
$melee->moveRight();
$melee->moveRight();
$melee->moveDown();
$table->displayTable();
echo("\n");
$table->addObstacle(1,2);
$table->displayTable();

$melee->movePattern("UULL");

echo("\n");
$table->displayTable();
echo("\n");
$melee->moveLeft();
