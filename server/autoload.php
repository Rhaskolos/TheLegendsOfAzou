<?php

namespace server;


spl_autoload_register(function ($className){
  $classPath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
  if (file_exists($classPath)){
    require_once($classPath);
    return true;
  } else {
    return false;
  }
});