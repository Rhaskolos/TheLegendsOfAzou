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
    public function addRoute($method, $url, $nameClass)
    {
        try {
            $method = strtoupper($method);
            if (!isset($this->routes[$method])) {
                throw new \Exception("Méthode HTTP non supportée");
            }
        
            $nameClass = "\\controller\\".$nameClass;
            $this->routes[$method][$url] = $nameClass;
        } catch (\Exception $e) {

            http_response_code(405);
            echo "Une erreur est survenue. Veuillez réessayer plus tard. L'erreur est la suivante : " . $e->getMessage();
        }
        
    }

    private function chooseRoad($method, $route, $param)
    {
        try {
            if (array_key_exists($route, $this->routes[$method])) {

                $class = $this->routes[$method][$route];
                $controller = new $class();
                $controller->handleRequest($method, $param);
            } else {
                throw new \Exception("la route recherchée n'existe pas ");
            }
        } catch (\Exception $e) {
            http_response_code(404);
            echo "Une erreur est survenue. Veuillez réessayer plus tard. L'erreur est la suivante : " . $e->getMessage();
        }
    }

    public function delegate()
    {
        try {
            $route = null;
            $method = $_SERVER['REQUEST_METHOD'];

            // On gère les paramètres d'URL
            // p=controleur/paramètre
            $params = [];
            if (isset($_GET['p']))
                $params = explode('/', $_GET['p']);

            // switch en fonction du nombre de paramètres passés dans l'URL
            switch (count($params)) {
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
                    // pour le moment on ne gère pas de routes avec plus de deux paramètres dans l'URL
                    throw new \Exception('Invalid request parameters count');
                    break;
            }
        } catch (\Exception $e) {

            http_response_code(503);
            echo "Une erreur est survenue. Veuillez réessayer plus tard. L'erreur est la suivante : " . $e->getMessage();
        }

        try {
            if ($route != null) {
                $this->chooseRoad($method, $route, $param);
            } else {
                throw new \Exception('Route invalide');
            }
        } catch (\Exception $e) {

            http_response_code(503);
            echo "Une erreur est survenue. Veuillez réessayer plus tard. L'erreur est la suivante : " . $e->getMessage();
        }
    }
}
