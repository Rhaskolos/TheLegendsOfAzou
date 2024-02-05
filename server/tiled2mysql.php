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

function parseTiles($data){
  global $mapTiles;
  global $mapWidth;
  foreach ($data as $i => $tiledId){
    $x = $i % $mapWidth;
    $y = floor($i / 25);
    //TODO: type is to be determined $type = $tiledId - 1;
    $fileId = "tile_" . str_pad($tiledId - 1, 4, '0', STR_PAD_LEFT) . ".png";
    echo "Tile (x: $x, y: $y) -> $fileId<br>";
    $mapTiles[] = [ "x" => $x, "y" => $y ];
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

