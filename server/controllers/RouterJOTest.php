<?php

namespace controllers;


class Router 
{

    private $routesGET;

    public function __construct() {
        $this->routesGET = [];
    }

    public function addRouteGET($url, $class){
        $this->routesGET[$url] = $class;
    }

    // en général on appelle cette méthode delegate car elle délègue le travail à une autre partie du code de l'app
    public function start()
    {

        // On récupère l'URL
        $uri = $_SERVER['REQUEST_URI'];

        // On vérifie que uri n'est pas vide et se termine par un /
        if(!empty($uri) && $uri != '/' && $uri[-1] === "/"){
            // On enlève le /
            $uri = substr($uri, 0, -1);

            // On envoie un code de redirection permanente
            http_response_code(301);

            // On redirige vers l'URL sans /
            // TODO: pourquoi rediriger vers l'adresse si elle n'est pas valide ?
            header('Location: '.$uri);
        } 

        // On gère les paramètres d'URL
        // p=controleur/paramètre
        $params = [];
        if(isset($_GET['p']))
            $params = explode('/', $_GET['p']);

        // switch en fonction du nombre de paramètres passés dans l'URL
        switch (count($params)){
            case 0:
                // il n'y a pas de paramètre donc redirection vers l'index et sort de cette méthode
                header('Location: /');
                return;
            case 1:
                // un seul paramètre c'est le nom de la route
                $route = $params[1];
                break;
            case 2:
                // deux paramètres c'est le nom de la route et un argument
                $route = $params[1];
                $param = $params[2];
            default:
                // pour le moment on ne gère pas de routes avec plus de deux paramètres dans l'URL donc erreur HTTP 503 Forbidden
                http_response_code(503);
                throw new \Exception('Invalid request parameters count');
                exit();
        }

        // switch en fonction de la méthode de requête
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                // vérifie qu'on a bien une route enregistrée pour ce endpoint
                if (array_key_exists($route, $this->routesGET)){

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
            default:
                // on ne gère pas cette requête donc renvoie le code HTTP 503 Forbidden
                http_response_code(503);
                // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
                throw new \Exception("Invalid request method");
        }
    }
}