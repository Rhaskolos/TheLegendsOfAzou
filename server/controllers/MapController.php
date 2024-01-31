<?php

namespace server\controllers;

use server\model\CRUD\MapCRUD;
use server\model\DAO\MapDAO;

class MapController 
{
    public function loadElement($id,$idPlayer)
    {

        $mapDAO = MapCRUD::read($id,$idPlayer);
    }
}