<?php

namespace model;

require_once('./autoload.php');


$player = new PlayerDAO();
$player
  ->setType(1)
  ->setX(0)
  ->setY(0)
  ->setHealth(10)
  ->setMoveSpeed(1)
  ->setAttackSpeed(1)
  ->setAttackRange(1)
  ->setPhysicAttack(1)
  ->setMagicAttack(1)
  ->setPhysicDefense(1)
  ->setMagicDefense(1)
  ->setOrientation(1)
  ->setSkill(1) // noskill
  ->setLogin("bob")
  ->setPassword("log");

$ok = PlayerCRUD::create($player);


// read OK
//$entity = EntityCRUD::read(2);


/* update OK
$entity->setHealth(100);
EntityCRUD::update($entity);
*/

//$ok = EntityCRUD::delete($entity);

//$entity = EntityDAO::fromPlayer($player);


var_dump($player);