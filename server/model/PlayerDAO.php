<?php

namespace model;

class PersonageDAO extends EntityDAO {

  private string $login;
  private string $password;

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password hashed with sha512
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = hash("sha512", $password);

    return $this;
  }

  /**
   * Get the value of login
   */ 
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * Set the value of login
   *
   * @return  self
   */ 
  public function setLogin($login)
  {
    $this->login = $login;

    return $this;
  }
}