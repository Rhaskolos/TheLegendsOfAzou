<?php

class Mage extends Character {

    public function __construct($name)
    {
        parent::__construct($name);
        $this->setPhysicalDamage(0);
        $this->setMagicDamage(6);
        $this->setPhysicalResistance(5);
        $this->setMagicResistance(10);
    }
}
