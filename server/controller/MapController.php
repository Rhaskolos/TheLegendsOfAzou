<?php

namespace controller;

use model\MapCRUD;

class MapController implements IController {


    public function handleRequest(array $params): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        switch ($method){
            case "GET":
                if (count($params) === 0){
                    throw new \Exception("MapController expect one parameter to handle a GET request");
                }
                // try to parse the first parameter as integer
                $id = filter_var($params[0], FILTER_SANITIZE_NUMBER_INT);
                if (!$id){
                    http_response_code(400); // 400 Bad Request
                    throw new \Exception("MapController invalid route parameter(s)");
                }
                // pass it to the GET request handling method
                $this->handleGET((int) $id);
                break;
            default:
                http_response_code(405); // 405 Method Not Allowed
                throw new \Exception("MapController does not handle HTTP method: " . htmlentities($method));
        }
    }



    private function handleGET(int $id): void
    {

        $mapDAO = MapCRUD::read($id);

        $mapArray = $mapDAO->toArray();

        // Encode in JSON
        $json = json_encode($mapArray);


        // Send the JSON file
        header("Content-Type: application/json");
        echo $json;
    }
}
