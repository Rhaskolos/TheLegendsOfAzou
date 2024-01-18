<?php

class GameLoop {

  private GameState $state;
  private bool      $started;
  private array     $actions;

  public function __construct(GameState $state)
  {
    $this->setState($state);
    $this->setStarted(false);
    $this->setActions([]);
  }

  public function start() {
    $this->setStarted(true);
    echo("-----------------------------------\n");
    echo("Bienvenue dans \"The legend of Azou\"\n");
    while($this->isStarted()){
      echo("-----------------------------------\n\n");
      echo("Actions possibles: " . implode(", ", array_keys($this->actions)) . "\n");
      $userAction = $this->getUserInput("Entrer une action: ");
      echo("Action choisie: $userAction\n\n");
      if (!in_array($userAction, $this->actions)){
        echo("Erreur, cette action n'est pas disponible.\n");
      } else {
        $state  = $this->getState();
        $action = $this->actions[$userAction];
        $action->run($state);
      }
    }
  }

  public function stop() {
    $this->setStarted(false);
  }

  public function getUserInput($prompt='>') {
    return readline($prompt);
  }

  public function registerAction(IGameAction $action) {
    $name = $action->getName();
    $this->actions[$name] = $action;
    return $this;
  }

  public function unregisterAction(IGameAction $action) {
    $name = $action->getName();
    if (!in_array($name, $this->actions)){ 
      throw new GameException("Action $name does not exists");
    }
    unset($this->actions[$name]);
    return $this;
  }

  public function isStarted(): bool
  {
    return $this->started;
  }

  private function setStarted($started): self
  {
    $this->started = $started;
    return $this;
  }

  private function getActions($actions)
  {
    return $this->actions;
  }

  private function setActions($actions)
  {
    $this->actions = $actions;

    return $this;
  }

  public function getState(): GameState
  {
    return $this->state;
  }

  private function setState(GameState $state)
  {
    $this->state = $state;
    return $this;
  }
}