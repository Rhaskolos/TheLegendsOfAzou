<?php

class Table {
    private $grid;

    

    public function __construct($sizeX, $sizeY) {
        // Initialisation d'une grille vide
        $this->grid = array_fill(0, $sizeY, array_fill(0, $sizeX, false));
    }

    public function addObstacle($x, $y) {
        // Ajout d'un obstacle à la position spécifiée
        if ($this->isValidPosition($x, $y)) {
            $this->grid[$y][$x] = true;
        }
    }

    public function cleanCase($x, $y) {
        // Ajout d'un obstacle à la position spécifiée
        if ($this->isValidPosition($x, $y)) {
            $this->grid[$y][$x] = false;
        }
    }

    public function isObstacleAtPosition($x, $y) {
        // Vérifier si la position contient un obstacle
        return $this->isValidPosition($x, $y) && $this->grid[$y][$x];
    }

    public function isValidPosition($x, $y) {
        // Vérifier si la position est à l'intérieur de la grille
        return (isset($this->grid[$x]) && isset($this->grid[$y]) && isset($this->grid[$y][$x]));
    }

    public function initializeCharacterPosition($character) {
        $x = $character->getPositionXCharacter();
        $y = $character->getPositionYCharacter();

        if ($this->isValidPosition($x, $y)) {
            // Réinitialiser la position du personnage sur la table
            $this->grid[$y][$x] = 'C';
        }
    }

    public function displayTable() {
        // Afficher chaque case de la table
        foreach ($this->grid as $row) {
            foreach ($row as $cell) {
                echo ($cell === true ? '1' : ($cell === 'C' ? 'C' : '0')) . ' ';
            }
            echo PHP_EOL;
        }
    }

     // Getter pour la propriété $grid
     public function getGrid() {
        return $this->grid;
    }

    // Setter pour la propriété $grid
    public function setGrid($grid) {
        $this->grid = $grid;
    }
}

?>
