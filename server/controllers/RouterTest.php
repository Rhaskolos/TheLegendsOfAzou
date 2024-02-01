<?php

namespace controllers;


class Router 
{
    private $arrayGetRegister = [];
    private $arrayPostRegister = [];

    static function start()
    {


        // On retire le "trailing slash" éventuel de l'URL
        // On récupère l'URL
        $uri = $_SERVER['REQUEST_URI'];
        
        // On vérifie que uri n'est pas vide et se termine par un /
        if(!empty($uri) && $uri != '/' && $uri[-1] === "/"){
            // On enlève le /
            $uri = substr($uri, 0, -1);

            // On envoie un code de redirection permanente
            http_response_code(301);

            // On redirige vers l'URL sans /
            header('Location: '.$uri);
        }

        // On gère les paramètres d'URL
        // p=controleur/methode/paramètres
        // On sépare les paramètres dans un tableau
        $params = [];
        if(isset($_GET['p']))
            $params = explode('/', $_GET['p']);

        if($params[0] != '' && $_SERVER['REQUEST_METHOD'] == 'GET'){

            if(array_key_exists($params[0],Router::getRegister())) {

            } else {
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }
        } else if ($params[0] != '' && $_SERVER['REQUEST_METHOD'] == 'POST') {

            if(array_key_exists($params[0],Router::postRegister())) {

            } else {
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }

        }   
        
            $controller = '\\controllers\\'.ucfirst(array_shift($params)).'Controller';

            // On instancie le contrôleur
            $controller = new $controller();

            
           if(isset($params[0]) && !empty($params[0])) {
            $action = array_shift($params);
        } else {

            http_response_code(503);
            echo "Aucune action spécifiée pour ce contrôleur.";
            return;
        }

            if(method_exists($controller, $action)){
                // Si il reste des paramètres on les passe à la méthode
                (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
            }else{
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }

        else{
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    }

    static function getRegister($key, $methodName) 
    {

        return
         $arrayGetRegister =
         [
            $key => $methodName
         ];
    }

    static function postRegister($key) {
        return
        $arrayPostRegister =
         [
            
         ];
    }
}


