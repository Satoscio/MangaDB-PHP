<?php

require_once 'model/dbaccess/DAOSeries.php';
require_once 'model/dbaccess/DAOVolumes.php';

class Controller {
    // attributi
    private $seriesObj;
    private $volumesObj;
    // costruttore
    public function __construct() {
        $this -> seriesObj = new DAOSeries();
        $this -> volumesObj = new DAOVolumes();
    }
    // metodi
    public function mostraTemplate() {
        include 'view/template.php';
    }
    
    public function attiva() {
        if(isset($_REQUEST['action'])) {
            $scelta = $_REQUEST['action'];
        }
        else {
            $scelta = 'home';
        }
        
        switch($scelta) {
            case 'home':
                include 'view/home/home.php';
                break;
               
            case 'seriesList':
                include 'view/series/list.php';
                break;
            
            case 'seriesViewAdd':
                include 'view/series/add.php';
                break;

            case 'seriesAdd':
                if(isset($_REQUEST['name'], $_REQUEST['author'], $_REQUEST['genre'], $_REQUEST['publisher'], $_REQUEST['language'], $_REQUEST['ongoing'])) {
                    $this -> seriesObj -> create($_REQUEST['name'], $_REQUEST['author'], $_REQUEST['artist'], $_REQUEST['genre'], $_REQUEST['publisher'], $_REQUEST['language'], $_REQUEST['volumes'], $_REQUEST['ongoing']);
                    $seriesid = $this -> volumesObj -> getSeriesID();
                    $this -> volumesObj -> create($_REQUEST['volnumber'], $seriesid);
                   
                    
                }
                include 'view/series/list.php';
                break;

            case 'seriesViewEdit':
                if(isset($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['author'], $_REQUEST['genre'],
                         $_REQUEST['publisher'], $_REQUEST['language'], $_REQUEST['volnumber'], $_REQUEST['ongoing'])) {
                    $id = $_REQUEST['id'];
                    $name = $_REQUEST['name'];
                    $author = $_REQUEST['author'];
                    $artist = $_REQUEST['artist'];
                    $genre = $_REQUEST['genre'];
                    $publisher = $_REQUEST['publisher'];
                    $language = $_REQUEST['language'];
                    $voln = $_REQUEST['volnumber'];
                    $volumes = $_REQUEST['volumes'];
                    $ongoing = $_REQUEST['ongoing'];
                    
                    include 'view/series/edit.php';
                }
                break;

            case 'seriesEdit':
                if(isset($_REQUEST['name'], $_REQUEST['author'], $_REQUEST['genre'], $_REQUEST['publisher'], $_REQUEST['language'], $_REQUEST['volnumber'], $_REQUEST['ongoing'])) 
                {
                    
                    $this -> seriesObj -> update($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['author'], $_REQUEST['artist'], $_REQUEST['genre'], $_REQUEST['publisher'], $_REQUEST['language'], $_REQUEST['volumes'], $_REQUEST['ongoing']);
                    $this -> volumesObj -> update($_REQUEST['id'], $_REQUEST['volnumber']);
                    include 'view/series/list.php';
                }
                break;

            case 'seriesDelete': 
                if(isset($_REQUEST['id'])) {
                    $this -> volumesObj -> delete($_REQUEST['id']);
                    $this -> seriesObj -> delete($_REQUEST['id']);
                }
                include 'view/series/list.php';
                break;
        }
        
    }
}

?>