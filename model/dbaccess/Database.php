<?php

class Database {

    public function getConnection(){

        $this -> conn = null;
        try {
            $this -> conn = new PDO("sqlite:" . __DIR__ . "/manga.db");
        }
        catch (PDOException $exc) {
            echo 'Error connecting to Database! \n' . $exc -> getMessage();
        }
        return $this -> conn;

    }
    
    public function closeConnection(){
        $this -> conn = null;
    }
    
}

?>