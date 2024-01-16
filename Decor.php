<?php

class Decor {
    private $obstacles = [];

    public function addObstacle(Obstacle $obstacle) {
        $this->obstacles[] = $obstacle;
    }

    public function checkCollision($x, $y) {
        foreach ($this->obstacles as $obstacle) {
            $position = $obstacle->getPosition();
            if ($position['x'] == $x && $position['y'] == $y) {
                return true; // Collision détectée
            }
        }
        return false; // Pas de collision
    }
}


?>