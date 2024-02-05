<?php

namespace controller;

class HomeController implements IController {

  public function handleRequest(string $method, int $param): void
  {
    echo "index ok";
  }

}