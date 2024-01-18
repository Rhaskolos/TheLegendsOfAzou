<?php
require_once("Monster.php");

class Picachun extends Monster {
    /* tete */
    public int $head;
    /* pattes */
    public int $legs;
    /* queue */
    public int $tail;
    /* cornes */
    public int $horns;

    public function __construct($name, $head, $legs, $tail, $horns)
    {
        parent::__construct($name);     

        $this->setPhysicalDamage(1);
        $this->setMagicDamage(1);  
        $this->setPhysicalResistance(1);
        $this->setMagicResistance(1);

        $this->head =$head;
        $this->legs =$legs;
        $this->tail =$tail;
        $this->horns =$horns;    
}

}
$picachun1 = new Picachun('Orque', 1, 1, 2, 2);
var_dump ($picachun1);



