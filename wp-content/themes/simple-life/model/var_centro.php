<?php
include('db_conn.php');
class CentroVida{
	private $dbConn;
	
	function __construct(){
		$this->dbConn = new DatabaseConn();		
	}	
		
	function getCentros(){
		$query = "SELECT id_cv as id, nombre_cv as nom FROM centro_vida ORDER BY nombre_cv";	
		
		$result = $this->dbConn->generateResult($query);
		return $result;
	}
	
	function getNombreCentro($id){
		$query = "SELECT nombre_cv nom FROM centro_vida where id_cv = ".$id."";			
		$result = $this->dbConn->getVar($query,"%s");

		return $result;
	}
	
	function getDireccion($id){
		$query = "
		select (select concat(lugar_dir,'. ',distrito_dir,' - ',provincia_dir)
		from direccion 
		where id_dir = cv.fk_direccion) dir
		from centro_vida cv
		where id_cv = ".$id."";			

		$result = $this->dbConn->getVar($query,"%s");
		return $result;
	}
	
	function getIdAyudantes($id){

		$query = "
			select fk_maestro id 
			from maestro_centro 
			where fk_centro = ".$id." 
			and fk_rol = 2";
		
		$result = $this->dbConn->generateResult($query);

		return $result;
	}
	
	function getInfoMaestro($id, $rol){
		
		$query = "
		SELECT id_ma id,
		ifnull(concat(nombre_ma,' ',apellido_ma),'---') nombre,
		ifnull(telefono_ma,'---') telA,
		ifnull(telefono_b_ma,'---') telB,
		ifnull(correo_ma,'---') correo
		FROM maestro 
		WHERE id_ma = (select fk_maestro id from maestro_centro where fk_centro = ".$id." and fk_rol = ".$rol.")
		AND estado_ma = 'Activo(a)'";

		$result = $this->dbConn->generateResult($query);
		return $result;
	}

	function getInfoAyudante($id, $rol){
		
		$query = "
		SELECT 
		ifnull(concat(nombre_ma,' ',apellido_ma),'---') nombre,
		ifnull(telefono_ma,'---') telA,
		ifnull(telefono_b_ma,'---') telB,
		ifnull(correo_ma,'---') correo
		FROM maestro 
		WHERE id_ma = ".$id." 
		AND estado_ma = 'Activo(a)'";

		$result = $this->dbConn->generateResult($query);
		return $result;
	}
}