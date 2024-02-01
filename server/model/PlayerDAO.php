<?php

namespace model;

class PlayerDAO {

  private string $login;
  private string $password;
  private string $email;

  /**
   * Get the value of password
   */ 
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Set the value of password hashed with sha512
   *
   * @return  self
   */ 
  public function setPassword($password): static
  {
    $this->password = hash("sha512", $password);

    return $this;
  }

  /**
   * Get the value of login
   */ 
  public function getLogin(): string
  {
    return $this->login;
  }

  /**
   * Set the value of login
   *
   * @return  self
   */ 
  public function setLogin($login): static
  {
    $this->login = $login;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email): static
  {
    $this->email = $email;

    return $this;
  }
}