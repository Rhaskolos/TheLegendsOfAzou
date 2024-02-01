<?php

namespace server\controllers;

use server\model\CRUD\MapCRUD;

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


// acces à cette route pour la méthode loadElement : http://localhost/TheLegendsOfAzou/server/public/map/loadElement/? remplacer ? par l'id que l'on recherche 