<?php

interface IGameAction {

  public function getName(): string;

  public function run(GameState $state): void;

}
