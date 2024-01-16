<?php

require_once "./Moving.php";
abstract class Character implements Moving {

    protected string $name;
    protected int    $level;
    protected int    $vitality;
    protected int    $physicalDamage;
    protected int    $magicDamage;
    protected int    $physicalResistance;
    protected int    $magicResistance;
    protected string $orientationCharacter;
    protected int    $positionXCharacter;
    protected int    $positionYCharacter;
    private          $decor;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setLevel(1);
        $this->setVitality(10);
    }

    public function moveRight() {
        $name = $this->name;
        $newX = $this->positionXCharacter + 1;
        $this->orientationCharacter = "right";

        // Vérifier si la nouvelle position contient un obstacle
        if (!$this->decor->checkCollision($newX, $this->positionYCharacter)) {
            $this->positionXCharacter = $newX;
            echo ($name. " is moving to right. ".$name." is looked at ". $this->orientationCharacter ."\n");
        } else {
            echo ($name. " is blocked by an obstacle and cannot move to the right. ".$name." is looked at ". $this->orientationCharacter ."\n");
        }
    }

    public function moveLeft() {
        $name = $this->name;
        $newX = $this->positionXCharacter - 1;
        $this->orientationCharacter = "left";

        // Vérifier si la nouvelle position contient un obstacle
        if (!$this->decor->checkCollision($newX, $this->positionYCharacter)) {
            $this->positionXCharacter = $newX;
            echo ($name. " is moving to left. ".$name." is looked at ". $this->orientationCharacter ."\n");
        } else {
            echo ($name. " is blocked by an obstacle and cannot move to the left. ".$name." is looked at ". $this->orientationCharacter ."\n");
        }
    }

    public function moveUp() {
        $name = $this->name;
        $newY = $this->positionYCharacter - 1;
        $this->orientationCharacter = "up";

        // Vérifier si la nouvelle position contient un obstacle
        if (!$this->decor->checkCollision($this->positionXCharacter, $newY)) {
            $this->positionYCharacter = $newY;
            echo ($name. " is moving up. ".$name." is looked at ". $this->orientationCharacter ."\n");
        } else {
            echo ($name. " is blocked by an obstacle and cannot move up. ".$name." is looked at ". $this->orientationCharacter ."\n");
        }
    }

    public function moveDown() {
        $name = $this->name;
        $newY = $this->positionYCharacter + 1;
        $this->orientationCharacter = "down";

        // Vérifier si la nouvelle position contient un obstacle
        if (!$this->decor->checkCollision($this->positionXCharacter, $newY)) {
            $this->positionYCharacter = $newY;
            echo ($name. " is moving down. ".$name." is looked at ". $this->orientationCharacter ."\n");
        } else {
            echo ($name. " is blocked by an obstacle and cannot move down. ".$name." is looked at ". $this->orientationCharacter ."\n");
        }
    }


    public function attack() {
        $name = $this->getName();  
        echo ($name. " attacks the target\n");
    }

    public function attacked() {
        $name = $this->getName();
        echo ($name. " takes damage\n");
    }

    
    public function getName(): string {
        return $this->name;
    }
    

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getLevel(): int {
        return $this->level;
    }

    public function setLevel(int $level): void {
        $this->level = $level;
    }

    public function getVitality(): int {
        return $this->vitality;
    }

    public function setVitality(int $vitality): void {
        $this->vitality = $vitality;
    }

    public function getPhysicalDamage(): int {
        return $this->physicalDamage;
    }

    public function setPhysicalDamage(int $physicalDamage): void {
        $this->physicalDamage = $physicalDamage;
    }

    public function getMagicDamage(): int {
        return $this->magicDamage;
    }

    public function setMagicDamage(int $magicDamage): void {
        $this->magicDamage = $magicDamage;
    }

    public function getPhysicalResistance(): int {
        return $this->physicalResistance;
    }

    public function setPhysicalResistance(int $physicalResistance): void {
        $this->physicalResistance = $physicalResistance;
    }

    public function getMagicResistance(): int {
        return $this->magicResistance;
    }

    public function setMagicResistance(int $magicResistance): void {
        $this->magicResistance = $magicResistance;
    }

    public function getDecor() {
        return $this->decor;
    }

    public function setDecor(Decor $decor) {
        $this->decor = $decor;
    }

    public function getPositionXCharacter() {
        return $this->positionXCharacter;
    }

    public function setPositionXCharacter($positionX) {
        $this->positionXCharacter = $positionX;
    }

    public function getPositionYCharacter() {
        return $this->positionYCharacter;
    }

    public function setPositionYCharacter($positionY) {
        $this->positionYCharacter = $positionY;
    }

}

