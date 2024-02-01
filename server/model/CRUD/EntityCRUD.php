<?php

namespace model\CRUD;

use DB;
use model\DAO\EntityDAO;

class EntityCRUD {

  public static function create(EntityDAO $entity): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $stmt = $db->prepare("INSERT INTO entity (
            type_entity,
            x_entity,
            y_entity,
            health_entity,
            move_speed_entity,
            atk_speed_entity,
            atk_range_entity,
            atk_physic_entity,
            atk_magic_entity,
            def_physic_entity,
            def_magic_entity,
            orientation_entity,
            id_map,
            id_skill
          ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->execute([
        $entity->getType(),
        $entity->getX(),
        $entity->getY(),
        $entity->getHealth(),
        $entity->getMoveSpeed(),
        $entity->getAttackSpeed(),
        $entity->getAttackRange(),
        $entity->getPhysicAttack(),
        $entity->getMagicAttack(),
        $entity->getPhysicDefense(),
        $entity->getMagicDefense(),
        $entity->getOrientation(),
        $entity->getMap(),
        $entity->getSkill(),
      ]);
      $entity->setId($db->lastInsertId());
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function read(int $id): EntityDAO
  {
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM entity WHERE id_entity = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Entity not found in database");
    }
    $entity = new EntityDAO();
    return $entity
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
      ->setMap($row["id_map"])
      ->setSkill($row["id_skill"]);
  }

  public static function update(EntityDAO $entity): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("UPDATE entity SET
            type_entity = ?,
            x_entity = ?,
            y_entity = ?,
            health_entity = ?,
            move_speed_entity = ?,
            atk_speed_entity = ?,
            atk_range_entity = ?,
            atk_physic_entity = ?,
            atk_magic_entity = ?,
            def_physic_entity = ?,
            def_magic_entity = ?,
            id_map = ?,
            id_skill = ?
          WHERE id_entity = ?")
        ->execute([
          $entity->getX(),
          $entity->getY(),
          $entity->getHealth(),
          $entity->getMoveSpeed(),
          $entity->getAttackSpeed(),
          $entity->getAttackRange(),
          $entity->getPhysicAttack(),
          $entity->getMagicAttack(),
          $entity->getPhysicDefense(),
          $entity->getMagicDefense(),
          $entity->getOrientation(),
          $entity->getMap(),
          $entity->getSkill(),
          $entity->getId()
        ]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function delete(EntityDAO $entity): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("DELETE FROM entity WHERE id_entity = ?")
        ->execute([$entity->getId()]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    } 
  }

}