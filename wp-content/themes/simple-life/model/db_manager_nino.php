<?php
include_once('db_conn.php');
class DataManager{
	
	private $dbConn;
	
	function __construct(){
		$this->dbConn = new DatabaseConn();
	}

	function MaxId($tableName, $column){
		
		$query = "select max(".$column.") from ".$tableName;

		$result = $dbConn->getVar($query,"%d");	
		$result = $result + 1;	
		
		return $result;
	}
	
	function MaxIdDesc($tableName, $column){

		$query = "select ".$column." from ".$tableName." order by ".$column." desc limit 1";
		$result = $dbConn->getVar($query,"%d");	
		
		return $result;
	}

	function InsertNino($tableName, $codigo, $nombre, $apellido, $nacimiento, $inscrito, $status){


		$count = $this->MaxId($tableName,"id_nin");	

		$data = 
		array(
			'id_nin' => $count,
			'codigo_nin' => $codigo,
			'nombre_nin' => $nombre,
			'apellido_nin' => $apellido,
			'fechanac_nin' => $nacimiento,
			'inscritopor_nin' => $inscrito,
			'fk_status' => $status
		);
		
		$result = $dbConn->insertData($tableName,$data);
		
		return $result;
	}	
	
	function UpdateNino($tableName, $column, $value){

		
		$conditionValue = $this->MaxIdDesc($tableName,"id_nin");
		
		$data = array(
			$column => $value
		);
		
		$condition = array(
			'id_nin' => $conditionValue
		); 
		
		$result = $dbConn->updateData($tableName, $data, $condition);
	}
	
	function InsertSponsor($tableName, $sponsor){

		
		$id = $this->MaxId($tableName,"id_spo");	

		$data = array(
			'id_spo' => $id,
			'nombre_spo' => $sponsor
		);

		$result = $dbConn->insertData($tableName,$data);
		
		return $result;
	}
	
	function InsertHistorialNino($tableName, $foreignTable){
		$fkNino = $this->MaxId($foreignTable,"id_nin");	
		
		$id = $this->MaxId($tableName,"id_hist");	
		
		$data = array(
			'id_hist' => $id,
			'fk_nino' => $fkNino
		);
		
		$result = $dbConn->insertData($tableName,$data);		
		return $result;
	}
}
?>