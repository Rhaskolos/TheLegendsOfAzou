<?php


class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        try {
        $classPath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
       
        // We check if the file exists
        if(file_exists($classPath)){
            require_once $classPath;
        } else {
            throw new \Exception("Autoloader failed to load file");
        }
    } catch (\Exception $e) {
        http_response_code(404);
        echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
    }
        
    }
}