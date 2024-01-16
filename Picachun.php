<?php
require_once("Monster.php");

class Picachun extends Monster {

    public function __construct($name)
    {
        parent::__construct($name);     

        $this->setPhysicalDamage(1);
        $this->setMagicDamage(1);  
        $this->setPhysicalResistance(1);
        $this->setMagicResistance(1);
}

}
$picachun1 = new Picachun('Orque');
var_dump ($picachun1);



