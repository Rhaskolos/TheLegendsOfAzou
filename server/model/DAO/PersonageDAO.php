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
            "id" => getId(),
            "type" => getType(),
            "x" => getX(),
            "y" => getY(),
            "health" => getHealth(),
            "moveSpeed" => getMoveSpeed(),
            "attackSpeed" => getAttackSpeed(),
            "attackRange" => getAttackRange(),
            "physicAttack" => getPhysicAttack(),
            "magicAttack" => getMagicAttack(),
            "physicDefense" => getPhysicDefense(),
            "magicDefense" => getMagicDefense(),
            "orientation" => getOrientation(),
            "map" => getMap(),
            "skill" => getSkill(),
            "player" => getPlayer(),
            "special" => getSpecial(),
            "level" => getLevel()

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