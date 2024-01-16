<?php

class GameLoop {

  private $started;

  public function __construct()
  {
    $this->setStarted(false);
  }

  public function start() {
    $this->setStarted(true);
    while($this->getStarted()){
      echo('Actions possibles: test, stop' . "\n");
      $action = $this->getUserInput("Entrer une action: ");
      echo('Action choisie: ' . $action . "\n");
      if ($action == 'stop'){
        $this->stop();
      }
      echo('-----------------------------' . "\n");
    }
  }

  public function stop() {
    $this->setStarted(false);
  }

  public function getUserInput($prompt='>') {
    return readline($prompt);
  }

  /**
   * Get the value of started
   */ 
  public function getStarted()
  {
    return $this->started;
  }

  /**
   * Set the value of started
   *
   * @return  self
   */ 
  public function setStarted($started)
  {
    $this->started = $started;

    return $this;
  }
}