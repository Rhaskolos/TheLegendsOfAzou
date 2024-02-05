<?php

namespace controller;

class HomeController implements IController {

  public function handleRequest(array $params): void
  {
    $method = $_SERVER["REQUEST_METHOD"];
    switch($method){
      case "GET":
        $this->handleGET($params);
        break;
      default:
        http_response_code(405); // 405 Method Not Allowed
        throw new \Exception("HomeController does not handle HTTP method: " . htmlentities($method));
    }
  }

  private function handleGET(array $params){
    echo("GET index");
    var_dump($_SESSION);
    if (empty($_SESSION)){
      echo("no session");
    } else {
      echo("we have a session HERE");
    }
  }

}