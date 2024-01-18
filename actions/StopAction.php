<?php

class StopAction implements IGameAction {

  public function getName(): string {
    return 'stop';
  }

  public function run(GameState $state): void {
    $loop = $state->getGameLoop();
    $loop->stop();
    echo("Au revoir...\n");
  }
}
