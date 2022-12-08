<?php

class Series {
    
    // attributes
    private $id;
    private $volumes;
    private $name;
    private $author;
    private $artist;
    private $genre;
    private $publisher;
    private $language;
    private $ongoing;
    
    // constructor
    public function __construct($id, $name, $author, $artist, $genre, $publisher, $language, $volumes, $ongoing) {
        $this -> id = $id;
        $this -> name = $name;
        $this -> author = $author;
        $this -> artist = $artist;
        $this -> genre = $genre;
        $this -> publisher = $publisher;
        $this -> language = $language;
        $this -> volumes = $volumes;
        $this -> ongoing = $ongoing;
    }

    // methods
    public function __get($variable) {
        if(property_exists($this, $variable)){
            return $this -> $variable;
        }
        return 'Does not exist';
    } 
}
