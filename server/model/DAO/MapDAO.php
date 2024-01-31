<?php

namespace server\model\DAO;

use server\model\CRUD\TileCRUD;
use server\model\CRUD\MobCRUD;
use server\model\CRUD\PersonageCRUD;

class MapDAO {

  private int    $id;
  private int    $height;
  private int    $width;
  private ?string $name;
  private ?string $desc;
  private array  $tiles = [];
  private array  $mobs = [];
  private        $personage;

  public function addTile($x, $y, $type)
  {
    $tile = new TileDAO();
    $tile
      ->setX($x)
      ->setY($y)
      ->setType($type)
      ->setMap($this->getId());
    TileCRUD::create($tile);
    $this->tiles[] = $tile;
    return $this;
  }

  public function addMob($x, $y, $type)
  {
    $mob = new MobDAO();
    $mob
      ->setX($x)
      ->setY($y)
      ->setType($type)
      ->setMap($this->getId());
    MobCRUD::create($mob);
    $this->mobs[] = $mob;
    return $this;
  }

  public function addPersonage($x, $y, $type)
  {
    $personage = new PersonageDAO();
    $personage
      ->setX($x)
      ->setY($y)
      ->setType($type)
      ->setMap($this->getId());
    PersonageCRUD::create($personage);
    $this->personage = $personage;
    return $this;
  }


  public function toArray() 
  {
    $tilesArray = [];
    foreach ($this->tiles as $tile) {
        $tilesArray[] = $tile->toArray();
    }

    $mobsArray = [];
    foreach ($this->mobs as $mob) {
        $mobsArray[] = $mob->toArray();
    }

    if ($this->personage !== null) {
        $personageArray = $this->personage->toArray();
    } else {
        $personageArray = null;
    }
    return [
      "height" => $this->getHeight(),
      "width" => $this->getWidth(),
      "name" => $this->getName(),
      "desc" => $this->getDesc(),
      "tiles" => $tilesArray,
      "mobs" => $mobsArray,
      "personage" => $personageArray
    ];
    
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

  /**
   * Get the value of mobs
   */ 
  public function getMobs()
  {
    return $this->mobs;
  }

  /**
   * Set the value of mobs
   *
   * @return  self
   */ 
  public function setMobs($mobs)
  {
    $this->mobs = $mobs;

    return $this;
  }

    /**
   * Get the value of personage
   */ 
  public function getPersonage()
  {
    return $this->personage;
  }

  /**
   * Set the value of personage
   *
   * @return  self
   */ 
  public function setPersonage($personage)
  {
    $this->personage = $personage;

    return $this;
  }
}