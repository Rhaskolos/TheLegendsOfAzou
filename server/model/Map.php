<?php

namespace model;

class Map implements ICRUD {

  protected int    $id;
  protected int    $height;
  protected int    $width;
  protected string $name;
  protected string $desc;

  public static function create(array $data) {
    $height = $data['height'];
    $width  = $data['width'];
    $name   = $data['name'];
    $desc   = $data['desc'];
    $db   = DB::getInstance();
    $stmt = $db->prepare("INSERT INTO map (height_map, width_map, name_map, desc_map) VALUES (?, ?, ?, ?)");
    $stmt->execute([$height, $width, $name, $desc]);
    $id = $db->lastInsertId();
    $map = new self();
    return $map
      ->setId($id)
      ->setHeight($height)
      ->setWidth($width)
      ->setName($name)
      ->setDesc($desc);
  }

  public static function read(int $id) {
    $db   = DB::getInstance();
    $stmt = $db->prepare("SELECT * FROM map WHERE id_map = ?");
    $stmt->execute([$id]);
    $row  = $stmt->fetch();
    if ($row === false){
      throw new \Exception("Map not found in database");
    }
    $map = new self();
    $map
      ->setId($row["id_map"])
      ->setHeight($row["height_map"])
      ->setWidth($row["width_map"])
      ->setName($row["name_map"])
      ->setDesc($row["desc_map"]);
  }

  public function update($dao): bool {
    $db = DB::getInstance();
    $stmt = $db->prepare("UPDATE map SET height_map = ?, width_map = ?, name_map = ?, desc_map = ? WHERE id_map = ?");
    $stmt->execute([
      $dao->getHeight(),
      $dao->getWidth(),
      $dao->getName(),
      $dao->getDesc(),
      $dao->getId()
    ]);
    return true;
  }

  public function delete($dao): bool {
    $db = DB::getInstance();
    $stmt = $db->prepare("DELETE FROM map WHERE id = ?");
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

  public function getHeight()
  {
    return $this->height;
  }

  public function setHeight($height)
  {
    $this->height = $height;
    return $this;
  }

  public function getWidth()
  {
    return $this->width;
  }

  public function setWidth($width)
  {
    $this->width = $width;
    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public function getDesc()
  {
    return $this->desc;
  }

  public function setDesc($desc)
  {
    $this->desc = $desc;
    return $this;
  }

}
