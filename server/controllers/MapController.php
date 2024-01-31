<?php

namespace server\controllers;

use server\model\CRUD\MapCRUD;
use server\model\DAO\MapDAO;



class MapController 
{
    public function loadElement($id,$idPlayer)
    {

        $mapDAO = MapCRUD::read($id,$idPlayer);

        $mapArray = $mapDAO->toArray();

        // Encoder en JSON
        $json = json_encode($mapArray);

        // Écrire dans un fichier
        file_put_contents('mapData.json', $json);
    }
}

$test = new MapController();
$test->loadElement(1,1);

