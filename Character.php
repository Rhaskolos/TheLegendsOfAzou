<?php

abstract class Character implements Moving
{

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
    private          $table;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setLevel(1);
        $this->setMaxHealth(10);
        $this->setCurrentHealth($this->getMaxHealth());
        $this->setPhysicalResistance(0);
        $this->setMagicalResistance(0);
    }


    // Basic method for moving "Right/Left/Up/Down"

    public function moveRight()
    {
        $name = $this->name;
        $newX = $this->positionXCharacter + 1;
        $this->orientationCharacter = "right";

        // checks if the new position is clean (need upgrate)
        if (!$this->table->isObstacleAtPosition($newX, $this->positionYCharacter) && $this->table->isValidPosition($newX, $this->positionYCharacter)) {
            $this->table->cleanCase($this->positionXCharacter, $this->positionYCharacter);
            $this->positionXCharacter = $newX;
            $this->table->initializeCharacterPosition($this);
            echo ($name . " is moving to right. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        } else {
            echo ($name . " is blocked by an obstacle and cannot move to the right. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        }
    }

    public function moveLeft()
    {
        $name = $this->name;
        $newX = $this->positionXCharacter - 1;
        $this->orientationCharacter = "left";

        // checks if the new position is clean (need upgrate)
        if (!$this->table->isObstacleAtPosition($newX, $this->positionYCharacter) && $this->table->isValidPosition($newX, $this->positionYCharacter)) {
            $this->table->cleanCase($this->positionXCharacter, $this->positionYCharacter);
            $this->positionXCharacter = $newX;
            $this->table->initializeCharacterPosition($this);
            echo ($name . " is moving to left. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        } else {
            echo ($name . " is blocked by an obstacle and cannot move to the left. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        }
    }

    public function moveUp()
    {
        $name = $this->name;
        $newY = $this->positionYCharacter - 1;
        $this->orientationCharacter = "up";

        // checks if the new position is clean (need upgrate)
        if (!$this->table->isObstacleAtPosition($this->positionXCharacter, $newY) && $this->table->isValidPosition($this->positionXCharacter, $newY)) {
            $this->table->cleanCase($this->positionXCharacter, $this->positionYCharacter);
            $this->positionYCharacter = $newY;
            $this->table->initializeCharacterPosition($this);
            echo ($name . " is moving up. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        } else {
            echo ($name . " is blocked by an obstacle and cannot move up. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        }
    }

    public function moveDown()
    {
        $name = $this->name;
        $newY = $this->positionYCharacter + 1;
        $this->orientationCharacter = "down";

        // checks if the new position is clean (need upgrate)
        if (!$this->table->isObstacleAtPosition($this->positionXCharacter, $newY) && $this->table->isValidPosition($this->positionXCharacter, $newY)) {
            $this->table->cleanCase($this->positionXCharacter, $this->positionYCharacter);
            $this->positionYCharacter = $newY;
            $this->table->initializeCharacterPosition($this);
            echo ($name . " is moving down. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        } else {
            echo ($name . " is blocked by an obstacle and cannot move down. " . $name . " is looked at " . $this->orientationCharacter . "\n");
        }
    }


    // this method allows several movement indications to be given in a single instruction
    public function movePattern(string $pattern)
    {
        foreach (str_split($pattern) as $movement) {
            switch ($movement) {
                case 'R':
                    $this->moveRight();
                    break;
                case 'L':
                    $this->moveLeft();
                    break;
                case 'U':
                    $this->moveUp();
                    break;
                case 'D':
                    $this->moveDown();
                    break;
                default:
                
                    break;
            }
        }
    }

    // this method allows you to define an infinite movement path for the unit
    public function repeatMovePattern(string $pattern)
    {
        while (true) {
            $this->movePattern($pattern);
  
            $pattern = $this->reverseMovePattern($pattern);
        }
    }

    // essential method allowing the return path in the repeatMovePattern method
    protected function reverseMovePattern(string $pattern)
    {
        $reversedPattern = "";
        for ($i = 0; $i < strlen($pattern); $i++) {
            $currentMove = $pattern[$i];
            $inverseMove = $this->getInverseMove($currentMove);
            $reversedPattern .= $inverseMove;
        }
        return $reversedPattern;
    }


    // allows writing the return path for the reverseMovePattern method
    protected function getInverseMove($move)
    {
        switch ($move) {
            case 'R':
                return 'L';
            case 'L':
                return 'R';
            case 'U':
                return 'D';
            case 'D':
                return 'U';
            default:
                return $move; 
        }
    }

    // minimal mehod for basic attack
    public function attack()
    {
        $name = $this->getName();
        echo ($name . " attacks the target\n");
    }

    // minimal mehod for basic take damage  
    public function takeDamage()
    {
        $name = $this->getName();
        echo ($name . " takes damage\n");
    }



    // Getters and Setters
    public function getName(): string
    {
        return $this->name;
    }



    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }


    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    public function setMaxHealth(int $health): void
    {
        $this->maxHealth = $health;
        $this->setCurrentHealth($health);
    }

    public function getCurrentHealth(): int
    {
        return $this->currentHealth;
    }

    public function setCurrentHealth(int $health): void
    {
        $this->currentHealth = min($health, $this->getMaxHealth());
    }

    public function dealPhysicalDamage(Character $target): void
    {
        $damage = $this->getPhysicalDamage() - $target->getPhysicalResistance();
        $damage = max(0, $damage);
        $target->setCurrentHealth($target->getCurrentHealth() - $damage);
    }

    public function dealMagicalDamage(Character $target): void
    {
        $damage = $this->getMagicalDamage() - $target->getMagicalResistance();
        $damage = max(0, $damage);
        $target->setCurrentHealth($target->getCurrentHealth() - $damage);
    }


    public function getPhysicalDamage(): int
    {
        return $this->physicalDamage;
    }

    public function setPhysicalDamage(int $physicalDamage): void
    {
        $this->physicalDamage = $physicalDamage;
    }


    public function getMagicalDamage(): int
    {
        return $this->magicalDamage;
    }

    public function setMagicalDamage(int $magicalDamage): void
    {
        $this->magicalDamage = $magicalDamage;
    }

    public function getPhysicalResistance(): int
    {
        return $this->physicalResistance;
    }

    public function setPhysicalResistance(int $physicalResistance): void
    {
        $this->physicalResistance = $physicalResistance;
    }


    public function getMagicalResistance(): int
    {
        return $this->magicalResistance;
    }

    public function setMagicalResistance(int $magicalResistance): void
    {
        $this->magicalResistance = $magicalResistance;
    }



    public function getPositionYCharacter()
    {
        return $this->positionYCharacter;
    }

    public function setPositionYCharacter($positionY)
    {
        $this->positionYCharacter = $positionY;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable(Table $table): void
    {
        $this->table = $table;
    }
}
