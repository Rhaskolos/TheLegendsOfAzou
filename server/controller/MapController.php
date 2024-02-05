<?php

namespace controller;

use model\MapCRUD;

class MapController implements IController {

    public function handleRequest(string $method, int $param): void
    {
        try {
            if (!empty($param)) {
                $roadMethodParam = strtolower($method) . "MethodParam";
                if (method_exists($this, $roadMethodParam)) {
                    $this->$roadMethodParam($param);
                } else {
                    throw new \Exception("The specified method does not exist.");
                }
            } else {
                $roadMethod = strtolower($method) . "Method";
                if (method_exists($this, $roadMethod)) {
                    $this->$roadMethod();
                } else {
                    throw new \Exception("The specified method does not exist.");
                }
            }
        } catch (\Exception $e) {

            http_response_code(405);
            echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
        }
    }



    public function getMethodParam($id)
    {

        $mapDAO = MapCRUD::read($id);

        $mapArray = $mapDAO->toArray();

        // Encode in JSON
        $json = json_encode($mapArray);


        // Sending the JSON file
        header("Content-Type: application/json");
        echo $json;
    }
}
