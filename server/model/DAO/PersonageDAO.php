<?php

namespace server\model\DAO;

class PersonageDAO extends EntityDAO {
  
  private int $player;
  private int $special;
  private int $level;

  public function __construct()
  {
    parent::__construct();
  }

  public function toArray() 
    {
       return [
            "id" => $this->getId(),
            "type" => $this->getType(),
            "x" => $this->getX(),
            "y" => $this->getY(),
            "health" => $this->getHealth(),
            "moveSpeed" => $this->getMoveSpeed(),
            "attackSpeed" => $this->getAttackSpeed(),
            "attackRange" => $this->getAttackRange(),
            "physicAttack" => $this->getPhysicAttack(),
            "magicAttack" => $this->getMagicAttack(),
            "physicDefense" => $this->getPhysicDefense(),
            "magicDefense" => $this->getMagicDefense(),
            "orientation" => $this->getOrientation(),
            "map" => $this->getMap(),
            "skill" => $this->getSkill(),
            "player" => $this->getPlayer(),
            "special" => $this->getSpecial(),
            "level" => $this->getLevel()

        ];
    }
    
  /**
   * Get the value of special
   */ 
  public function getSpecial()
  {
    return $this->special;
  }

  /**
   * Set the value of special
   *
   * @return  self
   */ 
  public function setSpecial($special)
  {
    $this->special = $special;

    return $this;
  }

  /**
   * Get the value of level
   */ 
  public function getLevel()
  {
    return $this->level;
  }

  /**
   * Set the value of level
   *
   * @return  self
   */ 
  public function setLevel($level)
  {
    $this->level = $level;

    return $this;
  }


  /**
   * Get the value of player
   */ 
  public function getPlayer()
  {
    return $this->player;
  }

  /**
   * Set the value of player
   *
   * @return  self
   */ 
  public function setPlayer($player)
  {
    $this->player = $player;

    return $this;
  }
}