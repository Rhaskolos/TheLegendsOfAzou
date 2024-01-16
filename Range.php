<?php

require_once "./Personnages.php";

class Range extends Personnages {

    public function __construct($name)
    {
    
        parent::__construct($name, 1, 10, 6, 0, 5, 3);
    
    }
}

?>