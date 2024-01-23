<?php

namespace model;

class Coord implements ICRUD {

  protected int $id;
  protected int $x;
  protected int $y;

  public static function getByXY($x, $y): Coord {
    $db = DB::getInstance();
    $stmt = $db->prepare("SELECT id_coord FROM coord WHERE x_coord = ? AND y_coord = ?");
    $stmt->execute([$x, $y]);
    $row = $stmt->fetch();
    return $row === false
      ? Coord::create(["x" => $x, "y" => $y])
      : Coord::read($row["id_coord"]);
  }

  public static function create(array $data) {
    $x    = $data['x'];
    $y    = $data['y'];
    $db   = DB::getInstance();
    $stmt = $db->prepare("INSERT INTO coord (x_ccord, y_coord) VALUES (?, ?)");
    $stmt->execute([$x, $y]);
    $id = $db->lastInsertId();
    $coord = new self();
    return $coord
      ->setId($id)
      ->setX($x)
      ->setY($y);
  }

  public static function read(int $id) {
    $db   = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM coord WHERE id_coord = ?");
    $stmt->execute([$id]);
    $row   = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Coord not found in database");
    }
    $coord = new self();
    return $coord
      ->setId($row['id_coord'])
      ->setX($row['x_coord'])
      ->setY($row['y_coord']);
  }

  public function update($dao): true {
    $db = DB::getInstance();
    $stmt = $db->prepare("UPDATE coord SET x_coord = ?, y_coord = ? WHERE id_coord = ?");
    $stmt->execute([$dao->getX(), $dao->getY(), $dao->getId()]);
    return true;
  }

  public function delete($dao): true {
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

  public function getX()
  {
    return $this->x;
  }

  public function setX($x)
  {
    $this->x = $x;
    return $this;
  }

  public function getY()
  {
    return $this->y;
  }

  public function setY($y)
  {
    $this->y = $y;
    return $this;
  }

}