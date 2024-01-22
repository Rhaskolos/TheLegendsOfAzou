<?php

class Melee extends Character {

    public function __construct($name)
    {
        parent::__construct($name);
        $this->setPhysicalDamage(5);
        $this->setMagicDamage(0);
        $this->setPhysicalResistance(10);
        $this->setMagicResistance(5);
    }
}
