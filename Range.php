<?php

class Range extends Character {

    public function __construct($name)
    {
        parent::__construct($name);
        $this->setPhysicalDamage(6);
        $this->setMagicDamage(0);
        $this->setPhysicalResistance(5);
        $this->setMagicResistance(3);
    
    }
}
