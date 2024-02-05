<?php

namespace model;

class TileDAO {
  
  private int $id;
  private int $x;
  private int $y;
  private int $type;
  private int $map;
  private int $skill = 1;


  public function toArray() 
  {
     return [
      "x" => $this->getX(),
      "y" => $this->getY(),
      "type" => $this->getType(),
     ];
    }
  
    public function updateSetterTile($dataTile)
    {
      return $this
      ->setId($dataTile["id_tile"])
      ->setX($dataTile["x_tile"])
      ->setY($dataTile["y_tile"])
      ->setType($dataTile["type_tile"]);
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
   * Get the value of x
   */ 
  public function getX()
  {
    return $this->x;
  }

  /**
   * Set the value of x
   *
   * @return  self
   */ 
  public function setX($x)
  {
    $this->x = $x;

    return $this;
  }

  /**
   * Get the value of y
   */ 
  public function getY()
  {
    return $this->y;
  }

  /**
   * Set the value of y
   *
   * @return  self
   */ 
  public function setY($y)
  {
    $this->y = $y;

    return $this;
  }

  /**
   * Get the value of type
   */ 
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set the value of type
   *
   * @return  self
   */ 
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get the value of map
   */ 
  public function getMap()
  {
    return $this->map;
  }

  /**
   * Set the value of map
   *
   * @return  self
   */ 
  public function setMap($map)
  {
    $this->map = $map;

    return $this;
  }



  /**
   * Get the value of skill
   */ 
  public function getSkill()
  {
    return $this->skill;
  }

  /**
   * Set the value of skill
   *
   * @return  self
   */ 
  public function setSkill($skill)
  {
    $this->skill = $skill;

    return $this;
  }
}