<?php

// parse tiled map editor JSON export to insert it into Legends of Azou MySQL database

$jsonPath = "../docs/tiled/level_01.json";
$jsonData = json_decode(file_get_contents($jsonPath), true);

//var_dump($jsonData);

$mapHeight = $jsonData["height"];
$mapWidth  = $jsonData["width"];

//echo "---------------------------------------------------\n";


$mapTiles    = [];
$mapEntities = [];

function parseTiles($data,$calcType){
  global $mapTiles;
  global $mapWidth;

    if ($calcType = "Tile") 
    {
    foreach ($data as $i => $tiledId){
    $x = $i % $mapWidth;
    $y = floor($i / $mapWidth);
    $type = $tiledId;
    }    
    return $mapTiles;

    } else if ($calcType = "Entity") 
    {
    foreach ($data as $i => $tiledId){
    
    if($tiledId != 0){
    $x = $i % $mapWidth;
    $y = floor($i / $mapWidth);
    $type = $tiledId;
    }
    }    
    return $mapTiles;

    } else 
    {
        throw new \Exception(" (calcType) doit soit être (Tile) soit (Entity)"); 
    }
  }



foreach ($jsonData["layers"] as $layer){
  switch ($layer["name"]){
    case "tiles":
      parseTiles($layer["data"]);
      break;
    case "entities":
      echo "entities tities";
      break;
    default:
      throw new \Exception("non mais LOL xD");
  }
}

var_dump([ "tiles" => $mapTiles, "entitites" => $mapEntities ]);

