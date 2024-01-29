<?php

namespace model;

class MapDAO {

  private int    $id;
  private int    $height;
  private int    $width;
  private ?string $name;
  private ?string $desc;
  private array  $tiles = [];

  public function addTile($x, $y, $type)
  {
    $tile = new TileDAO();
    $tile
      ->setX($y)
      ->setY($y)
      ->setType($type)
      ->setMap($this->getId());
    TileCRUD::create($tile);
    $this->tiles[] = $tile;
    return $this;
  }

  // ---8<---

  /**
   * Get the value of width
   */ 
  public function getWidth()
  {
    return $this->width;
  }

  /**
   * Set the value of width
   *
   * @return  self
   */ 
  public function setWidth($width)
  {
    $this->width = $width;

    return $this;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of desc
   */ 
  public function getDesc()
  {
    return $this->desc;
  }

  /**
   * Set the value of desc
   *
   * @return  self
   */ 
  public function setDesc($desc)
  {
    $this->desc = $desc;

    return $this;
  }

  /**
   * Get the value of height
   */ 
  public function getHeight()
  {
    return $this->height;
  }

  /**
   * Set the value of height
   *
   * @return  self
   */ 
  public function setHeight($height)
  {
    $this->height = $height;

    return $this;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of tiles
   */ 
  public function getTiles()
  {
    return $this->tiles;
  }

  /**
   * Set the value of tiles
   *
   * @return  self
   */ 
  public function setTiles($tiles)
  {
    $this->tiles = $tiles;

    return $this;
  }
}