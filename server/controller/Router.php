<?php

namespace controller;
use MapController;
class Router
{

    private $routes;


    public function __construct()
    {
        $this->routes = [
            "GET" => [],
            "POST" => [],
            "PUT" => [],
            "PATCH" => [],
            "DELETE" => []

        ];
    }
    public function addRoute(string $method, string $url, IController $controller)
    {
        try {
            $method = strtoupper($method);
            if (!isset($this->routes[$method])) {
                throw new \Exception("Not supported HTTP method");
            }
            $this->routes[$method][$url] = $controller;
        } catch (\Exception $e) {

            http_response_code(405);
            echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
        }
        
    }

    private function chooseRoad($method, $route, $param)
    {
        try {
            if (array_key_exists($route, $this->routes[$method])) {

                $controller = $this->routes[$method][$route];
                $controller->handleRequest($method, $param);
            } else {
                throw new \Exception("The recherched road does not exist");
            }
        } catch (\Exception $e) {
            http_response_code(404);
            echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
        }
    }

    public function delegate()
    {
        try {
            $route = null;
            $method = $_SERVER['REQUEST_METHOD'];

            // Managing URL parameters
            // p=controleur/param
            $params = [];
            if (isset($_GET['p']))
                $params = explode('/', $_GET['p']);

            // switch based on the number of parameters passed in the URL
            switch (count($params)) {
                case 1:
                    // Only one param : It's the name of the road
                    $route = $params[0];
                    $param = null;

                    break;
                case 2:
                    // Two params : It's the name of the road and one argument
                    $route = $params[0];
                    $param = filter_var($params[1], FILTER_SANITIZE_NUMBER_INT);
                    break;
                default:
                    // for now, we do not handle routes with more than two parameters in the URL
                    throw new \Exception('Invalid request parameters count');
                    break;
            }
        } catch (\Exception $e) {

            http_response_code(503);
            echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
        }

        try {
            if ($route != null) {
                $this->chooseRoad($method, $route, $param);
            } else {
                throw new \Exception('Invalid Road');
            }
        } catch (\Exception $e) {

            http_response_code(503);
            echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
        }
    }
}
