<?php

require_once "./Personnages.php";

class MeleeFighter extends Personnages {

    public function __construct($name)
    {
    
        parent::__construct($name, 1, 10, 5, 0, 10, 5);
    
    }
}

?>