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
    $stmt = $db->prepare("
      SELECT M.height_map, M.width_map, M.name_map, M.desc_map, T.id_tile, T.x_tile, T.y_tile, T.type_tile
      FROM map AS M
      INNER JOIN tile as T ON T.id_map = M.id_map
      WHERE M.id_map = ?
    ");
    $stmt->execute([$id]);
    $all = $stmt->fetchAll();
    $tiles = [];
    foreach ($all as $row){
      $tile = new TileDAO();
      $tile
        ->setId($row["id_tile"])
        ->setX($row["x_tile"])
        ->setY($row["y_tile"])
        ->setType($row["type_tile"])
        ->setMap($id);
      $tiles[] = $tile;
    }
    $map = new MapDAO();
    $map
      ->setId($id)
      ->setHeight($all[0]["height_map"])
      ->setWidth($all[0]["width_map"])
      ->setName($all[0]["name_map"])
      ->setDesc($all[0]["desc_map"])
      ->setTiles($tiles);
    return $map;
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