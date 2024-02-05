<?php

namespace controller;

class HomeController implements IController {

  public function handleRequest(array $params): void
  {
    echo "index ok";
  }

}