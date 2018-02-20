<?php
include('db_conn.php');
class EstadisticaEdad{
	
	function queryChildAge($status, $sex, $age){
		$query = "select id_nin id, concat(nombre_nin,' ',apellido_nin) nombre
		from nino
		where fk_status = ".$status." 
		and sexo_nin = '".$sex."'
		and timestampdiff (year, fechanac_nin, now()) = ".$age."";
		
		return $query;
	}
	
	function queryStatus($status){
		
		$query = "select estado_sta estado from status where id_sta =".$status."";
		
		return $query;	
	}
	
}

	$status = $_GET[status];
	$sexo = $_GET[sexo];
	$edad = $_GET[edad];

	$dbConn = new DatabaseConn();
	$stats = new EstadisticaEdad();

	$childAge = $dbConn->generateResult($stats->queryChildAge($status,$sexo,$edad));
	$statusNom = $dbConn->getVar($stats->queryStatus($status));
?>