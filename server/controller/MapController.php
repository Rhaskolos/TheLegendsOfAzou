<?php

namespace controller;

use model\MapCRUD;

class MapController
{
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
    }
}
