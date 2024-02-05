<?php

namespace controller;

interface IController {

  public function handleRequest(array $params): void;

}
