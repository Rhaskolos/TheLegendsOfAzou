<?php

namespace model;

class PersonageCRUD extends EntityCRUD {

  public static function create(EntityDAO|PersonageDAO $personage): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $stmt = $db->prepare("INSERT INTO personage (id_entity, special_personage, level_personage, id_player) VALUES (?, ?, ?, ?)");
      $stmt->execute([
        $personage->getId(),
        $personage->getSpecial(),
        $personage->getLevel(),
        $personage->getPlayer()
      ]);
      return $db->commit();
    } catch (\PDOException $e) {
      var_dump(["entity error", $e]);
      $db->rollBack();
      return false;
    }
  }

  public static function read(int $id): PersonageDAO
  {
    $entity = EntityCRUD::read($id);
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM personage WHERE id_entity = ?");
    $stmt->execute([$entity->getId()]);
    $row = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Personage not found in database");
    }
    $personage = new PersonageDAO();
    $personage
      ->setSpecial($row["special_personage"])
      ->setLevel($row["level_personage"])
      ->setPlayer($row["id_player"])
      ->setId($entity->getId())
      ->setType($entity->getType())
      ->setX($entity->getX())
      ->setY($entity->getY())
      ->setHealth($entity->getHealth())
      ->setMoveSpeed($entity->getMoveSpeed())
      ->setAttackSpeed($entity->getAttackSpeed())
      ->setAttackRange($entity->getAttackRange())
      ->setPhysicAttack($entity->getPhysicAttack())
      ->setMagicAttack($entity->getMagicAttack())
      ->setPhysicDefense($entity->getPhysicDefense())
      ->setMagicDefense($entity->getMagicDefense())
      ->setOrientation($entity->getOrientation())
      ->setSkill($entity->getSkill())
    ;
    return $personage;
  }

  public static function update(EntityDAO|PersonageDAO $personage): bool
  {
    EntityCRUD::update($personage);
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $stmt = $db->prepare("UPDATE personage SET
          special_personage = ?,
          level_personage = ?,
          id_player = ?
        WHERE id_entity = ?"
      );
      $stmt->execute([
        $personage->getSpecial(),
        $personage->getLevel(),
        $personage->getPlayer(),
        $personage->getId()
      ]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
    return true;
  }

  public static function delete(EntityDAO|PersonageDAO $personage): bool
  {
    EntityCRUD::delete($personage);
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("DELETE FROM personage WHERE id_entity = ?")
        ->execute([$personage->getId()]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

}
