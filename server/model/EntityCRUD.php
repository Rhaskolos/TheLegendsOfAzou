<?php

namespace model;

class EntityCRUD {

  public static function create(EntityDAO $entity): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("INSERT INTO entity (x_entity, y_entity, health_entity, atk_physic_entity, atk_magic_entity, def_physic_entity, def_magic_entity, id_skill) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")
        ->execute([
          $entity->getX(),
          $entity->getY(),
          $entity->getHealth(),
          $entity->getPhysicAttack(),
          $entity->getMagicAttack(),
          $entity->getPhysicDefense(),
          $entity->getMagicDefense(),
          $entity->getSkill(),
        ]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function read(int $id): EntityDAO
  {
    $row = DB::getInstance()
    ->prepare("SELECT * FROM entity WHERE id_entity = ?")
    ->execute([$id])
    ->fetch();
    if ($row === false){
      throw new \Exception("Tile not found in database");
    }
    $entity = new EntityDAO();
    return $entity
      ->setId($row["id_entity"])
      ->setX($row["x_entity"])
      ->setY($row["y_entity"])
      ->setHealth($row["health_entity"])
      ->setPhysicAttack($row["atk_physic_entity"])
      ->setMagicAttack($row["atk_magic_entity"])
      ->setPhysicDefense($row["def_physic_entity"])
      ->setMagicDefense($row["def_magic_entity"])
      ->setSkill($row["id_skill"]);
  }

  public static function update(EntityDAO $entity): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("UPDATE entity SET x_entity = ?, y_entity = ?, health_entity = ?, atk_physic_entity = ?, atk_magic_entity = ?, def_physic_entity = ?, def_magic_entity = ?, id_skill = ? WHERE id_entity = ?")
        ->execute([
          $entity->getX(),
          $entity->getY(),
          $entity->getHealth(),
          $entity->getPhysicAttack(),
          $entity->getMagicAttack(),
          $entity->getPhysicDefense(),
          $entity->getMagicDefense(),
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
        ->prepare("DELETE FROM entity WHERE id = ?")
        ->execute([$entity->getId()]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    } 
  }

}