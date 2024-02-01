<?php

namespace controller;

class Router
{

    private $routes;


    public function __construct()
    {
        $this->routes = [
            "GET" => [],
            "POST" => [],
            "PUT" => [],
            "DELETE" => []

        ];
    }

    public function addRoute($method, $url)
    {
        $method = strtoupper($method);
        if (!isset($this->routes[$method])) {
            throw new \Exception("Méthode HTTP non supportée");
        }
        $this->routes[$method][$url] = "\\controller\\" . ucfirst($url) . "Controller";
    }

    private function chooseRoad($method, $route, $param)
    {
        if (array_key_exists($route, $this->routes[$method])) {

            $class = $this->routes[$method][$route];
            $controller = new $class();
            $controller->methodRoad($method, $param);
        }
    }

    public function delegate()
    {


        $method = $_SERVER['REQUEST_METHOD'];

        // On gère les paramètres d'URL
        // p=controleur/paramètre
        $params = [];
        if (isset($_GET['p']))
            $params = explode('/', $_GET['p']);

        // switch en fonction du nombre de paramètres passés dans l'URL
        switch (count($params)) {
            case 0:
                // il n'y a pas de paramètre donc redirection vers l'index et sort de cette méthode
                header('Location: /');
                return;
            case 1:
                // un seul paramètre c'est le nom de la route
                $route = $params[0];
                $param = null;

                break;
            case 2:
                // deux paramètres c'est le nom de la route et un argument
                $route = $params[0];
                $param = filter_var($params[1], FILTER_SANITIZE_NUMBER_INT);
                break;
            default:
                // pour le moment on ne gère pas de routes avec plus de deux paramètres dans l'URL donc erreur HTTP 503 Forbidden
                http_response_code(503);
                throw new \Exception('Invalid request parameters count');
                exit();
        }

        $this->chooseRoad($method, $route, $param);
    }
}
