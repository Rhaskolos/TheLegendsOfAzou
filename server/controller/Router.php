<?php

namespace controller;
use MapController;
class Router
{

    private $routes;


    public function __construct()
    {
        $this->routes = [];
    }

    public function addRoute(string $route, IController $controller)
    {
        $this->routes[$route] = $controller;
    }

    public function delegate()
    {
        // make sure we receive request parameters through apache rewrite rule
        if (!array_key_exists("p", $_GET)){
            http_response_code(404); // 404 Page Not Found
            throw new \Exception("Invalid request URL: " . htmlentities($_SERVER["REQUEST_URI"]));
        }
        // split request using slash delimiter to separate request parameters
        $params = explode('/', $_GET['p']);
        // first parameter is the route name, remove it from params array
        $route = "/" . array_shift($params); // every route get prefixed with a slash

        // make sure a route is registered to handle the requested route
        if (!array_key_exists($route, $this->routes)){
            http_response_code(404); // 404 Not Found
            throw new \Exception("Controller not found for route: " . htmlentities($route));
        }
        // retrieve registered route controller
        $controller = $this->routes[$route];
        // delegate request & parameters handling to the controller
        $controller->handleRequest($params);
    }
}
