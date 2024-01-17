<?php

class GameState {
  
  private Character $character;
  private GameLoop  $gameLoop;

  public function __construct(Character $character) {
    $this->setCharacter($character);
    $this->setGameLoop(new GameLoop($this));
  }

  public function getCharacter(): Character
  {
    return $this->character;
  }

  private function setCharacter(Character $character): self
  {
    $this->character = $character;
    return $this;
  }

  public function getGameLoop(): GameLoop {
    return $this->name;
  }

  private function setGameLoop(GameLoop $gameLoop): self {
      $this->gameLoop = $gameLoop;
      return $this;
  }

}