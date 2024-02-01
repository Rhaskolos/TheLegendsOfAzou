<?php

namespace controller;

use model\MapCRUD;

class MapController
{
    public function methodRoad($method, $param)
    {
        switch ($method) {
            case "GET":
                if (!empty($param)) {
                    $this->getMethodParam($param);
                } else {
                    $this->getMethod();
                }
                break;
            case "POST":
                if (!empty($param)) {
                    $this->postMethodParam($param);
                } else {
                    $this->postMethod();
                }
                break;
            case "PUT":
                if (!empty($param)) {
                    $this->putMethodParam($param);
                } else {
                    $this->putMethod();
                }
                break;
            case "DELETE":
                if (!empty($param)) {
                    $this->deleteMethodParam($param);
                } else {
                    $this->deleteMethod();
                }
                break;
            default:
                // on ne gère pas cette requête donc renvoie le code HTTP 405 (Method Not Allowed)
                http_response_code(405);
                // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
                throw new \Exception("Invalid request method");
                exit();
        }
    }


    public function getMethodParam($id)
    {

        $mapDAO = MapCRUD::read($id);

        $mapArray = $mapDAO->toArray();

        // Encoder en JSON
        $json = json_encode($mapArray);


        // Envoi du fichier Json
        header("Content-Type: application/json");
        echo $json;
    }

    public function getMethod()
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
    public function postMethodParam($param)
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
    public function postMethod()
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
    public function putMethodParam($param)
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
    public function putMethod()
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
    public function deleteMethodParam($param)
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
    public function deleteMethod()
    {
        http_response_code(405);
        // pour le debug on lance une exception mais ça pourrait aussi être un die() ou exit()
        throw new \Exception("Invalid request method");
        exit();
    }
}
