<?php

namespace model;

class TileCRUD {

  public static function create (TileDAO $tile): bool {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("INSERT INTO tile (x_tile, y_tile, type_tile, id_map, id_skill) VALUES (?, ?, ?, ?, ?)")
        ->execute([
          $tile->getX(),
          $tile->getY(),
          $tile->getType(),
          $tile->getMap(),
          $tile->getSkill()
        ]);
      $tile->setId($db->lastInsertId());
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function read (int $id): TileDAO {
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM tile WHERE id_tile = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Tile not found in database");
    }
    $tile = new TileDAO();
    return $tile
      ->setId($id)
      ->setX($row["x"])
      ->setY($row["y"])
      ->setType($row["type"])
      ->setMap($row["map"])
      ->setSkill($row["skill"]);
  }

  public static function update (TileDAO $tile): bool {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("UPDATE tile SET x_tile = ?, y_tile = ?, type_tile = ?, id_map = ?, id_skill = ? WHERE id_tile = ?")
        ->execute([
          $tile->getX(),
          $tile->getY(),
          $tile->getType(),
          $tile->getMap(),
          $tile->getSkill(),
          $tile->getId()
        ]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function delete (TileDAO $tile): bool {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("DELETE FROM tile WHERE id = ?")
        ->execute([$tile->getId()]);
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

}