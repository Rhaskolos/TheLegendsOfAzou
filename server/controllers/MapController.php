<?php

namespace controllers;

use model\CRUD\MapCRUD;

class MapController 
{
    public function loadElement($id)
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

// la route pour appeler la méthode loadElement de MapController.php : "http://localhost/TheLegendsOfAzou/server/map/loadElement/?" remplacer "?" par l'id recherché