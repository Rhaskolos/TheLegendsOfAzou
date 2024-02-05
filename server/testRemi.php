<?php

/*
public static function read(int $id): MapDAO
{
  $db = DB::getInstance();
  $stmt = $db->prepare("
    SELECT M.height_map, M.width_map, M.name_map, M.desc_map, T.id_tile, T.x_tile, T.y_tile, T.type_tile
    FROM map AS M
    INNER JOIN tile as T ON T.id_map = M.id_map
    WHERE M.id_map = ?
  ");
  $stmt->execute([$id]);
  $allTiles = $stmt->fetchAll();

  $mapData = $allTiles[0];

  $tiles = [];
  foreach ($allTiles as $row){
    $tile = new TileDAO();
    $tile
      ->setId($row["id_tile"])
      ->setX($row["x_tile"])
      ->setY($row["y_tile"])
      ->setType($row["type_tile"])
      ->setMap($id);
    $tiles[] = $tile;
  }
  $stmt = $db->prepare("
    SELECT E.id_entity, E.type_entity, E.x_entity, E.y_entity, E.health_entity, E.move_speed_entity, E.atk_speed_entity, E.atk_range_entity, E.atk_physic_entity, E.atk_magic_entity, E.def_physic_entity, E.def_magic_entity, E.orientation_entity, E.id_skill, MO.move_pattern_mob
    FROM map AS M
    INNER JOIN entity as E ON E.id_map = M.id_map
    INNER JOIN mob as MO ON MO.id_entity = E.id_entity
    WHERE M.id_map = ?
  ");
  $stmt->execute([$id]);
  $allMobs = $stmt->fetchAll();
  $mobs = [];
  foreach ($allMobs as $row){
    $mob = new MobDAO();
    $mob
      ->setId($row["id_entity"])
      ->setType($row["type_entity"])
      ->setX($row["x_entity"])
      ->setY($row["y_entity"])
      ->setHealth($row["health_entity"])
      ->setMoveSpeed($row["move_speed_entity"])
      ->setAttackSpeed($row["atk_speed_entity"])
      ->setAttackRange($row["atk_range_entity"])
      ->setPhysicAttack($row["atk_physic_entity"])
      ->setMagicAttack($row["atk_magic_entity"])
      ->setPhysicDefense($row["def_physic_entity"])
      ->setMagicDefense($row["def_magic_entity"])
      ->setOrientation($row["orientation_entity"])
      ->setSkill($row["id_skill"])
      ->setMovePatternMob($row["move_pattern_mob"])

      ->setMap($id);
    $mobs[] = $mob;
  }
  $stmt = $db->prepare("
  SELECT E.id_entity, E.type_entity, E.x_entity, E.y_entity, E.health_entity, E.move_speed_entity, E.atk_speed_entity, E.atk_range_entity, E.atk_physic_entity, E.atk_magic_entity, E.def_physic_entity, E.def_magic_entity, E.orientation_entity, E.id_skill, P.special_personage, P.level_personage, P.id_player
    FROM map AS M
    INNER JOIN entity as E ON E.id_map = M.id_map
    INNER JOIN personage as P ON P.id_entity = E.id_entity
    INNER JOIN player as PL ON PL.id_player = P.id_player
    WHERE M.id_map = ?
");
$stmt->execute([$id]);
$allPersonages = $stmt->fetchAll();

$personage = null;
if (!empty($allPersonages)) {
$row = $allPersonages[0];
$personage = new PersonageDAO();
  $personage
    ->setId($row["id_entity"])
    ->setType($row["type_entity"])
    ->setX($row["x_entity"])
    ->setY($row["y_entity"])
    ->setHealth($row["health_entity"])
    ->setMoveSpeed($row["move_speed_entity"])
    ->setAttackSpeed($row["atk_speed_entity"])
    ->setAttackRange($row["atk_range_entity"])
    ->setPhysicAttack($row["atk_physic_entity"])
    ->setMagicAttack($row["atk_magic_entity"])
    ->setPhysicDefense($row["def_physic_entity"])
    ->setMagicDefense($row["def_magic_entity"])
    ->setOrientation($row["orientation_entity"])
    ->setSkill($row["id_skill"])
    ->setSpecial($row["special_personage"])
    ->setLevel($row["level_personage"])
    ->setPlayer($row["id_player"])

    ->setMap($id);
    
}
  $map = new MapDAO();
  $map
    ->setId($id)
    ->setHeight($mapData["height_map"])
    ->setWidth($mapData["width_map"])
    ->setName($mapData["name_map"])
    ->setDesc($mapData["desc_map"])
    ->setTiles($tiles)
    ->setMobs($mobs)
    ->setPersonage($personage);
  return $map;
}

*/
class Test {
    public function updateSetterEntity($objectEntity, $dataEntity)
    {
      return $objectEntity
      ->setId($dataEntity["id_entity"])
      ->setType($dataEntity["type_entity"])
      ->setX($dataEntity["x_entity"])
      ->setY($dataEntity["y_entity"])
      ->setHealth($dataEntity["health_entity"])
      ->setMoveSpeed($dataEntity["move_speed_entity"])
      ->setAttackSpeed($dataEntity["atk_speed_entity"])
      ->setAttackRange($dataEntity["atk_range_entity"])
      ->setPhysicAttack($dataEntity["atk_physic_entity"])
      ->setMagicAttack($dataEntity["atk_magic_entity"])
      ->setPhysicDefense($dataEntity["def_physic_entity"])
      ->setMagicDefense($dataEntity["def_magic_entity"])
      ->setOrientation($dataEntity["orientation_entity"])
      ->setSkill($dataEntity["id_skill"]);
    }
}
