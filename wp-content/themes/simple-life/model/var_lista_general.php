<?php
include_once('db_conn.php');



class ListaGeneral{
    
    private $dbConn;
	
    function __construct(){
        $this->dbConn = new DatabaseConn();		
    }
        
    function getChildData(){
        $query = 
	"SELECT 
        (SELECT nombre_cv FROM centro_vida WHERE id_cv =
        (SELECT fk_centro FROM historial_nino WHERE fk_nino = nino.id_nin)
        ) centro,
        (SELECT estado_sta FROM status WHERE id_sta = nino.fk_status
        ) sta,
        concat (nombre_nin,' ',apellido_nin) nom,
        codigo_nin cod, 
        id_nin id
        FROM nino
        order by nom";
        
        return $query;
    }
    
    
}

    $dbConn = new DatabaseConn();
    $generalList = new ListaGeneral();
    $children = $dbConn->generateResult($generalList->getChildData());
    
    $count = 1;
?>