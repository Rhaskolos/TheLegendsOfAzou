<?php

namespace model;

class PersonageCRUD extends EntityCRUD {

  public static function create(PersonageDAO $personage): bool
  {
    $entity = EntityDAO::fromPersonage($personage);
    EntityCRUD::create($entity);
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $stmt = $db->prepare("INSERT INTO personage (id_entity, login_player, password_player) VALUES (?, ?, ?)");
      $stmt->execute([
        $entity->getId(),
        $personage->getLogin(),
        $personage->getPassword()
      ]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  /*public static function read(int $id): PlayerDAO
  {
    return new PlayerDAO();
  }

  public static function update(PlayerDAO $player): bool
  {

  }

  public static function delete(PlayerDAO $player): bool
  {

  }*/

}
