<?php

namespace controller;

class Router
{

    private $routesGET;
    private $routesPOST;

    public function __construct()
    {
        $this->routesGET = [];
        $this->routesPOST = [];
    }

    public function addRouteGET($url)
    {
        $class = "\\controller\\" . ucfirst($url) . "Controller";
        $this->routesGET[$url] = $class;
    }

    public function addRoutePOST($url)
    {
        $class = "\\controller\\" . ucfirst($url) . "Controller";
        $this->routesPOST[$url] = $class;
    }

    public function delegate()
    {

        // On récupère l'URL : Est-ce que cette partie était importante vu que l'on fait une redirection si pas de parametre ? 
       // $uri = $_SERVER['REQUEST_URI'];


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

        // switch en fonction de la méthode de requête
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                // vérifie qu'on a bien une route enregistrée pour ce endpoint
                if (array_key_exists($route, $this->routesGET)) {

                    if (!empty($param)) {
                        $class = $this->routesGET[$route];
                        $controller = new $class();
                        $controller->getMethodParam($param);
                    } else {
                        $class = $this->routesGET[$route];
                        $controller = new $class();
                        $controller->getMethod();
                    }
                }
                break;
            case 'POST':
                if (array_key_exists($route, $this->routesPOST)) {
                    if (!empty($param)) {
                        $class = $this->routesPOST[$route];
                        $controller = new $class();
                        $controller->postMethodParam($param);
                    } else {
                        $class = $this->routesPOST[$route];
                        $controller = new $class();
                        $controller->postMethod();
                    }
                    break;
                }
            default:
                // on ne gère pas cette requête donc renvoie le code HTTP 405 (Method Not Allowed)
                http_response_code(405);
                // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
                throw new \Exception("Invalid request method");
                exit();
        }
    }
}
