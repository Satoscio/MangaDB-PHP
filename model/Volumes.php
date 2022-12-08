<?php

class Volumes {
    
    // attributes
    private $volnumber;
    private $seriesID;
    
    // constructor
    public function __construct($seriesID, $volnumber) {
        $this -> seriesID = $seriesID;
        $this -> volnumber = $volnumber;
    }

    // methods
    public function __get($variable) {
        if(property_exists($this, $variable)){
            return $this -> $variable;
        }
        return 'Does not exist';
    } 
}


?>