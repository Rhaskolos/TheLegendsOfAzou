<?php

namespace model;

class EntityDAO {

  private int $id;
  private int $type;
  private int $x;
  private int $y;
  private int $health;
  private int $moveSpeed;
  private int $attackSpeed;
  private int $attackRange;
  private int $physicAttack;
  private int $magicAttack;
  private int $physicDefense;
  private int $magicDefense;
  private string $orientation;
  private int $map;
  private int $skill;


  /** Because PHP is not a good language I had to use this dirty hack
   *  to cast an instance to its parent class...
   * @see https://gist.github.com/borzilleri/960035
   */
  /*public static function fromPersonage(PersonageDAO $personage): EntityDAO
  {
    return unserialize(preg_replace(
      '/^O:\d+:"[^"]++"/',
      "O:15:\"model\\EntityDAO\"",
      serialize($personage)
    ));
  }*/

  public function __construct()
  {}

  public function updateSetterEntity($dataEntity)
  {
    return $this
    ->setId($dataEntity["id_entity"])
    ->setType($dataEntity["type_entity"])
    ->setX($dataEntity["x_entity"])
    ->setY($dataEntity["y_entity"])
    ->setHealth($dataEntity["health_entity"])
    ->setMoveSpeed($dataEntity["move_speed_entity"])
    ->setAttackSpeed($dataEntity["atk_speed_entity"])
    ->setAttackRange($dataEntity["atk_range_entity"])
    ->setPhysicAttack($dataEntity["atk_physic_entity"])
    ->setMagicAttack($dataEntity["atk_magic_entity"])
    ->setPhysicDefense($dataEntity["def_physic_entity"])
    ->setMagicDefense($dataEntity["def_magic_entity"])
    ->setOrientation($dataEntity["orientation_entity"])
    ->setSkill($dataEntity["id_skill"]);
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

  /**
   * Get the value of magicDefense
   */ 
  public function getMagicDefense()
  {
    return $this->magicDefense;
  }

  /**
   * Set the value of magicDefense
   *
   * @return  self
   */ 
  public function setMagicDefense($magicDefense)
  {
    $this->magicDefense = $magicDefense;

    return $this;
  }

  /**
   * Get the value of physicDefense
   */ 
  public function getPhysicDefense()
  {
    return $this->physicDefense;
  }

  /**
   * Set the value of physicDefense
   *
   * @return  self
   */ 
  public function setPhysicDefense($physicDefense)
  {
    $this->physicDefense = $physicDefense;

    return $this;
  }

  /**
   * Get the value of magicAttack
   */ 
  public function getMagicAttack()
  {
    return $this->magicAttack;
  }

  /**
   * Set the value of magicAttack
   *
   * @return  self
   */ 
  public function setMagicAttack($magicAttack)
  {
    $this->magicAttack = $magicAttack;

    return $this;
  }

  /**
   * Get the value of physicAttack
   */ 
  public function getPhysicAttack()
  {
    return $this->physicAttack;
  }

  /**
   * Set the value of physicAttack
   *
   * @return  self
   */ 
  public function setPhysicAttack($physicAttack)
  {
    $this->physicAttack = $physicAttack;

    return $this;
  }

  /**
   * Get the value of health
   */ 
  public function getHealth()
  {
    return $this->health;
  }

  /**
   * Set the value of health
   *
   * @return  self
   */ 
  public function setHealth($health)
  {
    $this->health = $health;

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
   * Get the value of attackSpeed
   */ 
  public function getAttackSpeed()
  {
    return $this->attackSpeed;
  }

  /**
   * Set the value of attackSpeed
   *
   * @return  self
   */ 
  public function setAttackSpeed($attackSpeed)
  {
    $this->attackSpeed = $attackSpeed;

    return $this;
  }

  /**
   * Get the value of moveSpeed
   */ 
  public function getMoveSpeed()
  {
    return $this->moveSpeed;
  }

  /**
   * Set the value of moveSpeed
   *
   * @return  self
   */ 
  public function setMoveSpeed($moveSpeed)
  {
    $this->moveSpeed = $moveSpeed;

    return $this;
  }

  /**
   * Get the value of attackRange
   */ 
  public function getAttackRange()
  {
    return $this->attackRange;
  }

  /**
   * Set the value of attackRange
   *
   * @return  self
   */ 
  public function setAttackRange($attackRange)
  {
    $this->attackRange = $attackRange;

    return $this;
  }

  /**
   * Get the value of orientation
   */ 
  public function getOrientation()
  {
    return $this->orientation;
  }

  /**
   * Set the value of orientation
   *
   * @return  self
   */ 
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;

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
}