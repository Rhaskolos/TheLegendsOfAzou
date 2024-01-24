<?php

namespace model;

class MapCRUD {

  public static function create(MapDAO $map): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $stmt = $db->prepare("INSERT INTO map (height_map, width_map, name_map, desc_map) VALUES (?, ?, ?, ?)");
      $stmt->execute([
        $map->getHeight(),
        $map->getWidth(),
        $map->getName(),
        $map->getDesc()
      ]);
      $map->setId($db->lastInsertId());
      foreach ($map->getTiles() as $tile){
        TileCRUD::create($tile);
      }
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function read(int $id): MapDAO
  {
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT height_map, width_map, name_map, desc_map FROM map WHERE id_map = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Map not found in database");
    }
    $map = new MapDAO();
    return $map
      ->setId($id)
      ->setHeight($row["height_map"])
      ->setWidth($row["width_map"])
      ->setName($row["name_map"])
      ->setDesc($row["desc_map"]);
      //->setName(is_null($row["name_map"]) ? '' : $row["name_map"])
      //->setDesc(is_null($row["desc_map"]) ? '' : $row["desc_map"]);
  }

  public static function update(MapDAO $map): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("UPDATE map SET height_map = ?, width_map = ?, name_map = ?, desc_map = ? WHERE id_map = ?")
        ->execute([
          $map->getHeight(),
          $map->getWidth(),
          $map->getName(),
          $map->getDesc(),
          $map->getId()
        ]);
      foreach ($map->getTiles() as $tile){
        TileCRUD::update($tile);
      }
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }

  public static function delete(MapDAO $map): bool
  {
    $db = DB::getInstance();
    try {
      $db->beginTransaction();
      $db
        ->prepare("DELETE FROM map WHERE id = ?")
        ->execute([$map->getId()]);
      foreach ($map->getTiles() as $tile){
        TileCRUD::delete($tile);
      }
      return $db->commit();
    } catch (\PDOException $e) {
      $db->rollBack();
      return false;
    }
  }


}