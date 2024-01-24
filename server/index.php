<?php

namespace model;

require_once('./autoload.php');


$map = MapCRUD::read(1);
$map->setDesc("description level 01");
MapCRUD::update($map);


/// ---8<---

/*
$map2 = new MapDAO();
$map2
  ->setHeight(3)
  ->setWidth(3)
  ->setName("map de test 02")
  ->setDesc("lorem ipsum");
MapCRUD::create($map2);
*/


$map = MapCRUD::read(1);

for ($y=0; $y < $map->getHeight(); $y++) { 
  for ($x=0; $x < $map->getWidth(); $x++) { 
    $map->addTile($x, $y, 1);
  }
}

MapCRUD::update($map);
var_dump($map);