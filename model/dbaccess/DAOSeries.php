<?php

require_once 'model/dbaccess/Database.php';
require_once 'model/Series.php';
require_once 'model/Volumes.php';

class DAOSeries {
    const table = 'serie';    
    // attribute
    private $conn;
    // constructor
    public function __construct(){
        $db = new Database();
        $this -> conn = $db -> getConnection();
    }
    // crud methods
    public function create($name, $author, $artist, $genre, $publisher, $language, $volumes, $ongoing){
        $query = ' INSERT INTO ' . DAOSeries::table
                .' VALUES (NULL, :nome, :autore, :artista, :genere, :editore, :lingua, :volumi, :ongoing)';
        // preparing statement
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':nome', $name);
            $stmt -> bindParam(':autore', $author);
            $stmt -> bindParam(':artista', $artist);
            $stmt -> bindParam(':genere', $genre);
            $stmt -> bindParam(':editore', $publisher);
            $stmt -> bindParam(':lingua', $language);
            $stmt -> bindParam(':volumi', $volumes);
            $stmt -> bindParam(':ongoing', $ongoing);
            $stmt -> execute();
        } catch (Exception $exc) {
            echo 'Error reading series: ' . $exc -> getMessage();
        }        
    }
    
    public function readAll(){
        $query = ' SELECT id, nome, autore, artista, genere, editore, lingua, volumi, ongoing '
                .' FROM ' . DAOSeries::table
                .' WHERE 1=1';
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            $list = [];
            foreach ($result as $row) {
                array_push ($list, new Series($row['id'], $row['nome'], $row['autore'], $row['artista'],
                                              $row['genere'], $row['editore'], $row['lingua'], $row['volumi'], $row['ongoing'], ));
            }
            return $list;
        } catch (PDOException $exc) {
            echo 'Read error: ' . $exc -> getMessage();
        }
    }
    
    public function update($id, $name, $author, $artist, $genre, $publisher, $language, $volumes, $ongoing) {
        $query = 'UPDATE ' . DAOSeries::table .
                ' SET nome = :nome, autore = :autore, artista = :artista, genere = :genere, editore = :editore, lingua = :lingua, volumi = :volumi, ongoing = :ongoing' .
                ' WHERE id = :id';
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':id', $id);
            $stmt -> bindParam(':nome', $name);
            $stmt -> bindParam(':autore', $author);
            $stmt -> bindParam(':artista', $artist);
            $stmt -> bindParam(':genere', $genre);
            $stmt -> bindParam(':editore', $publisher);
            $stmt -> bindParam(':lingua', $language);
            $stmt -> bindParam(':volumi', $volumes);
            $stmt -> bindParam(':ongoing', $ongoing);
            $stmt -> execute();
        } catch (Exception $exc) {
            echo ' Error updating series: ' . $exc -> getMessage();
        }
    }
    
    public function delete($id) {
        $query = 'DELETE FROM ' . DAOSeries::table .
                 ' WHERE id = :id';    
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
        } catch (Exception $exc) {
            echo ' Error deleting series: ' . $exc -> getMessage();
        }

    }   
}