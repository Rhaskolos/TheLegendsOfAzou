<?php

namespace model;

class Tile implements ICRUD {

  protected int   $id;
  protected int   $type;
  protected Skill $skill;
  protected Coord $coord;
  protected Map   $map;

  public static function create(array $data) {
    $type = $data['type'];
    $x    = $data['x'];
    $y    = $data['y'];
    $map  = $data['map'];
    //$skill = $data['skill'];
    $coord = Coord::getByXY($x, $y);
    $db = DB::getInstance();
    $stmt = $db->prepare("INSERT INTO tile (type_tile, id_skill, id_coord, id_map) VALUES (?, ?, ?, ?)");
    // $stmt->execute([$type, $id_skill, $id_coord, $id_map]);
    $stmt->execute([$type, NULL, $coord->getId(), $map->getId()]);
    $id = $db->lastInsertId();
    $tile = new self();
    return $tile
      ->setId($id)
      ->setType($type)
      ->setCoord($coord);
      //->setSkill($skill);
  }

  public static function read(int $id) {
    $db   = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM tile WHERE id_tile = ?");
    $stmt->execute([$id]);
    $row   = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Tile not found in database");
    }
    $map = Map::read($row["id_map"]);
    $tile = new self();
    return $tile
      ->setId($row['id_tile'])
      ->setType($row['type_tile'])
      ->setMap($map);
  }

  public function update($tile): bool {
    $db = DB::getInstance();
    $stmt = $db->prepare("UPDATE tile SET type_tile = ?, id_skill = ?, id_coord = ?, id_map = ? WHERE id_tile = ?");
    $stmt->execute([$tile->getType(), $tile->getSkill()->getId(), $tile->idCoord, $tile->idMap, $tile->id]);
    return true;
  }

  public function delete($dao): bool {
    $db = DB::getInstance();
    $stmt = $db->prepare("DELETE FROM coord WHERE id = ?");
    $stmt->execute([$dao->getId()]);
    return true;
  }


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }


  public function getCoord()
  {
    return $this->coord;
  }

  public function setCoord($coord)
  {
    $this->coord = $coord;
    return $this;
  }

  public function getMap()
  {
    return $this->map;
  }

  public function setMap($map)
  {
    $this->map = $map;
    return $this;
  }

  public function getSkill()
  {
    return $this->skill;
  }

  public function setSkill($skill)
  {
    $this->skill = $skill;
    return $this;
  }

}