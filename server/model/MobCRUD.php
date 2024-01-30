<?php
namespace model;

class MobCRUD extends EntityCRUD {

    public static function create(EntityDAO|MobDAO $mob): bool
    {
      $db = DB::getInstance();
      try {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO mob (id_entity, move_pattern_mob) VALUES (?, ?)");
        $stmt->execute([
        $mob->getId(),
        $mob->getMovePatternMob(),
        
        ]);
        return $db->commit();
      } catch (\PDOException $e) {
        var_dump(["entity error", $e]);
        $db->rollBack();
        return false;
      }
    }   
    
    public static function read(int $id): MobDAO
  {
    $entity = EntityCRUD::read($id);
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM mob WHERE id_entity = ?");
    $stmt->execute([$entity->getId()]);
    $row = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Mob not found in database");
    }
    $mob = new MobDAO();
    $mob
      ->setMovePatternMob($row["move_pattern_mob"])
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
    return $mob;
  }

  public static function update(EntityDAO|MobDAO $mob): bool
  {
    EntityCRUD::update($mob);
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $stmt = $db->prepare("UPDATE mob SET
          move-pattern_mob = ?, 
        WHERE id_entity = ?"
      );
      $stmt->execute([
        $mob->getMovePatternMob(),

      ]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
    return true;
  }

  public static function delete(EntityDAO|MobDAO $mob): bool
  {
    EntityCRUD::delete($mob);
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("DELETE FROM mob WHERE id_entity = ?")
        ->execute([$mob->getId()]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }
    
}