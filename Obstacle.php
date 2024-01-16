<?php


class Obstacle {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getPosition() {
        return ['x' => $this->x, 'y' => $this->y];
    }
}


?>