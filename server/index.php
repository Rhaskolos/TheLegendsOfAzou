<?php

namespace model;

require_once('./autoload.php');


$perso = new PersonageDAO();

$perso->setType(1);
$perso->setX(0);
$perso->setY(0);
$perso->setHealth(10);
$perso->setMoveSpeed(1);
$perso->setAttackSpeed(1);
$perso->setAttackRange(1);
$perso->setPhysicAttack(1);
$perso->setMagicAttack(1);
$perso->setPhysicDefense(1);
$perso->setMagicDefense(1);
$perso->setOrientation("U");
$perso->setSkill(1);
$perso->setMap(1);

$perso->setPlayer(1);
$perso->setSpecial(1);
$perso->setLevel(0);

$ok = PersonageCRUD::create($perso);

var_dump(["ok perso?", $ok]);