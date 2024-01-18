<?php

require_once('./Character.php');
require_once('./Mage.php');
require_once('./Melee.php');
require_once('./Range.php');
require_once('./GameLoop.php');

$gl = new GameLoop();

$gl->start();
