<?php

abstract class Personnages {

    private string $name;
    private int $level;
    private int $vitality;
    private int $physicalDamage;
    private int $magicDamage;
    private int $physicalResistance;
    private int $magicResistance;


    public function __construct($name, $level, $vitality, $physicalDamage, $magicDamage, $physicalResistance, $magicResistance )
    {
        $this->name = $name;
        $this->level = $level;
        $this->vitality = $vitality;
        $this->physicalDamage = $physicalDamage;
        $this->magicDamage = $magicDamage;
        $this->physicalResistance = $physicalResistance;
        $this->magicResistance = $magicResistance;
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

    public function move() {
    $name = $this->getName();
    echo ($name. " is moving\n");
    }

    public function attack() {
    $name = $this->getName();    
    echo ($name. " attacks the target\n");
    }

    public function attacked() {
    $name = $this->getName();
    echo ($name. " takes damage\n");
    }

}


?>