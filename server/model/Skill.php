<?php

namespace model;

class Skill {

  protected int $id;


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

}
