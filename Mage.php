<?php

require_once "./Personnages.php";

class Mage extends Personnages {

    public function __construct($name)
    {
    
        parent::__construct($name, 1, 10, 0, 6, 5, 10);
    
    }
}

?>