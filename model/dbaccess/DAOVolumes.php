<?php

require_once 'model/dbaccess/Database.php';
require_once 'model/Volumes.php';

class DAOVolumes {
    const table = 'volume';    
    // attribute
    private $conn;
    // constructor
    public function __construct() {
        $db = new Database();
        $this -> conn = $db -> getConnection();
    }
    // crud methods
    public function create($volnumber, $idseries) {
        $query = ' INSERT INTO ' . DAOVolumes::table
                .' VALUES (:nvol, :id)';
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':nvol', $volnumber);
            $stmt -> bindParam(':id', $idseries);
            $stmt -> execute();
        } catch (Exception $exc) {
            echo 'Error reading volume data: ' . $exc -> getMessage();
        }        
    }

    public function getSeriesID() {
        $idqr = "SELECT MAX(id) as x FROM serie WHERE 1=1";
        $res = $this -> conn -> prepare($idqr);
        $res -> execute();

        while($row = $res -> fetchAll(PDO::FETCH_ASSOC)) {
            $id = $row[0]["x"];
        }
        return $id;

    }

    public function readAll() {
        $query = ' SELECT idserie, nvol '
                .' FROM ' . DAOVolumes::table
                .' WHERE 1=1';
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            $list = [];
            foreach ($result as $row) {
                array_push($list, new Volumes($row['idserie'], $row['nvol']));
            }
            return $list;
        } catch (PDOException $exc) {
            echo 'Read error: ' . $exc -> getMessage();
        }
    }
    
    public function update($seriesID, $volnumber) {
        $query = 'UPDATE ' . DAOVolumes::table .
                ' SET nvol = :nvol' .
                ' WHERE idserie = :idserie';
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':idserie', $seriesID);
            $stmt -> bindParam(':nvol', $volnumber);
            $stmt -> execute();
        } catch (Exception $exc) {
            echo ' Error updating volume data: ' . $exc -> getMessage();
        }
    }
    
    public function delete($seriesID) {
        $query = 'DELETE FROM ' . DAOVolumes::table .
                ' WHERE idserie = :idserie';
        try {
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':idserie', $seriesID);
            $stmt -> execute();
        } catch (Exception $exc) {
            echo ' Error deleting volume data: ' . $exc -> getMessage();
        }
    }
}
