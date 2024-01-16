<?php


class Table {
    private $grid;

    public function __construct($sizeX, $sizeY) {
        // Initialisation d'une grille vide
        $this->grid = array_fill(0, $sizeX, array_fill(0, $sizeY, false));
    }

    public function addObstacle($x, $y) {
        // Ajout d'un obstacle à la position spécifiée
        if ($this->isValidPosition($x, $y)) {
            $this->grid[$x][$y] = true;
        }
    }

    public function isObstacleAtPosition($x, $y) {
        // Vérifier si la position contient un obstacle
        return $this->isValidPosition($x, $y) && $this->grid[$x][$y];
    }

    private function isValidPosition($x, $y) {
        // Vérifier si la position est à l'intérieur de la grille
        return isset($this->grid[$x]) && isset($this->grid[$x][$y]);
    }
}

?>