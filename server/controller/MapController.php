<?php

namespace controller;

use model\MapCRUD;

class MapController
{

    public function handleRequest($method, $param)
    {
        try {
            if (!empty($param)) {
                $roadMethodParam = strtolower($method) . "MethodParam";
                if (method_exists($this, $roadMethodParam)) {
                    $this->$roadMethodParam($param);
                } else {
                    throw new \Exception("La méthode spécifiée n'existe pas");
                }
            } else {
                $roadMethod = strtolower($method) . "Method";
                if (method_exists($this, $roadMethod)) {
                    $this->$roadMethod();
                } else {
                    throw new \Exception("La méthode spécifiée n'existe pas");
                }
            }
        } catch (\Exception $e) {

            http_response_code(405);
            echo "Une erreur est survenue. Veuillez réessayer plus tard. L'erreur est la suivante : " . $e->getMessage();
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
}
