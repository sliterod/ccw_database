<?php
include_once('db_conn.php');
abstract class FormQuery{
	const status = 0;
	const grado = 1;
	const turno = 2;
	const marital = 3;
	const personalidad = 4;
	const distrito = 5;
	const centro = 6;
	const rol_maestro = 7;
	const religion = 8;
}
	
class FormData{	
	
	private $dbConn;
	private $queryArray;
	
	function __construct(){
		$this->dbConn = new DatabaseConn();		
		$this->createQueryArray();
	}
	
	function createQueryArray(){
		$this->queryArray = array(
			"SELECT * FROM status",
			"SELECT id_gra id, grado_gra gra FROM grado",
			"SELECT id_tur id, turno_tur tur FROM turno",
			"SELECT id_mar id, estado_mar est FROM estado_marital",
			"SELECT id_pe id, rasgo_pe rasgo FROM personalidad",
			"SELECT id_dis id, nombre_dis dist FROM distrito",
			"SELECT id_cv id, nombre_cv centro FROM centro_vida ORDER BY centro",
			"SELECT id_rol id, nombre_rol nombre FROM rol_maestro",
			"SELECT nombre_rel nombre FROM religion"
		);
	}
	
	function getData($index){
		$query = $this->queryArray[$index];
		
		$result = $this->dbConn->generateResult($query);
		return $result;
	}
	
	function getStatus(){
		return $this->getData(FormQuery::status);
	}
	
	function getGrado(){
		return $this->getData(FormQuery::grado);
	}
	
	function getCentro(){
		return $this->getData(FormQuery::centro);
	}
	
	function getDistrito(){
		return $this->getData(FormQuery::distrito);
	}
	
	function getMarital(){
		return $this->getData(FormQuery::marital);
	}
	
	function getPersonalidad(){
		return $this->getData(FormQuery::personalidad);
	}
	
	function getTurno(){
		return $this->getData(FormQuery::turno);
	}
	
	function getRolMaestro(){
		return $this->getData(FormQuery::rol_maestro);
	}
	
	function getReligion(){
		return $this->getData(FormQuery::religion);
	}
}
?>