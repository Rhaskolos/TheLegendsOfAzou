<?php

class Table {
    private $grid;

    

    //construct initialize an empty array
    public function __construct($sizeX, $sizeY) {
        $this->grid = array_fill(0, $sizeY, array_fill(0, $sizeX, false));
    }

    
    //Adding an obstacle at the specified position
    public function addObstacle($x, $y) {
        if ($this->isValidPosition($x, $y)) {
            $this->grid[$y][$x] = true;
        }
    }

    //clean the case by putting a zero in it
    public function cleanCase($x, $y) {
        if ($this->isValidPosition($x, $y)) {
            $this->grid[$y][$x] = false;
        }
    }


    //checks if a case contains an obstacle to validate or not a movement
    public function isObstacleAtPosition($x, $y) {
        return $this->isValidPosition($x, $y) && $this->grid[$y][$x];
    }


    //checks if position is inside grid
    public function isValidPosition($x, $y) {
        return (isset($this->grid[$x]) && isset($this->grid[$y]) && isset($this->grid[$y][$x]));
    }

// initialize the starting position of the character
    public function initializeCharacterPosition($character) {
        $x = $character->getPositionXCharacter();
        $y = $character->getPositionYCharacter();

        if ($this->isValidPosition($x, $y)) {
            $this->grid[$y][$x] = 'C';
        }
    }


    //this method allows you to create a visualization of the table where zero are the empty locations, 1 the locations with obstacles and C the locations with Character
    public function displayTable() {
        foreach ($this->grid as $row) {
            foreach ($row as $cell) {
                echo ($cell === true ? '1' : ($cell === 'C' ? 'C' : '0')) . ' ';
            }
            echo PHP_EOL;
        }
    }


     // Getters and Setters
     public function getGrid() {
        return $this->grid;
    }


    public function setGrid($grid) {
        $this->grid = $grid;
    }
}

?>
