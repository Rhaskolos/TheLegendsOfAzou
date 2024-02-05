<?php

namespace controller;

interface IController {

  public function handleRequest(string $method, int $param): void;

}
