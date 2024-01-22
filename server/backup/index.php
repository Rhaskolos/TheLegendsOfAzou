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
/*

GET  http://localhost/azou/login.php
=> HTML formulaire de connexion

POST http://localhost/azou/login.php
=> si login OK HTML du jeu
=> sinon HTML message erreur

GET  http://localhost/azou/register.php
=> HTML formulaire d'inscription

POST http://localhost/azou/register.php
=> si register OK redirection page login.php
=> sinon HTML message erreur

GET http://localhost/azou/map.php?id=1
=> JSON décrivant la carte numéro 1

GET http://localhost/azou/entity.php?id=1
=> JSON décrivant l'entité numéro 1

*/