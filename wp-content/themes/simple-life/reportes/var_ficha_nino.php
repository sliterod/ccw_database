<?php
class ProfileInfo{	
	
	function queryChildSimple ($id){
		$query =
		"select
		(select nombre_cv from centro_vida where id_cv = (select fk_centro from historial_nino where fk_nino = id_nin)) centro,
		(select nombre_spo from sponsor where id_spo = (select fk_sponsor from historial_nino where fk_nino = id_nin)) padrino,
		timestampdiff (year, fechanac_nin, now()) as edad,
		(select concat(url_foto,nombre_foto) from foto where tipo_foto ='Código' and fk_nino = id_nin) foto,
		(select estado_sta from status where id_sta = nino.fk_status) estado,
		date_format(fechanac_nin,'%d-%m-%Y') nac,
		codigo_nin cod, 
		nombre_nin nom, 
		apellido_nin ape, 
		sexo_nin sexo
		from nino
		where id_nin = ".$id;	
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function querySchool($id){
		$query ="
		select substring_index(estudios_hist,',',1) estudio,
		substring_index(substring_index(estudios_hist,',',2),',',-1) turno
		from historial_nino
		where fk_nino =".$id;	
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function queryTechSchool($id){
		$query = "
		select ifnull((select nombre_tec from tecnica where id_tec = hn.fk_tecnica),'---') nombretec,
		ifnull((select fechainicio_tec from tecnica where id_tec = hn.fk_tecnica),'---') iniciotec,
		ifnull((select fechafin_tec from tecnica where id_tec = hn.fk_tecnica),'---') fintec
		from historial_nino hn
		where fk_nino =".$id;	
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function querySiblings($id){
		$query = "
		select 
(select nombre_he from hermano where id_he = (select fk_hermano from nino_hermano where fk_nino = id_nin)) nombre,
(select ifnull(apellido_he,'---') from hermano where id_he = (select fk_hermano from nino_hermano where fk_nino = id_nin)) apellido,
(select sexo_he from hermano where id_he = (select fk_hermano from nino_hermano where fk_nino = id_nin)) sexo,
(select grado_he from hermano where id_he = (select fk_hermano from nino_hermano where fk_nino = id_nin)) grado,
(select ifnull(observacion_he,'---') from hermano where id_he = (select fk_hermano from nino_hermano where fk_nino = id_nin)) observacion
from nino
where id_nin =".$id;	
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function queryAcceptance($id){
		
		$query ="
		select ifnull((select aceptacion_ac from aceptacion where id_ac = n.fk_aceptacion),'---') acep,
		ifnull((select fecha_ac from aceptacion where id_ac = n.fk_aceptacion),'---') fecha,
		ifnull((select observacion_ac from aceptacion where id_ac = n.fk_aceptacion),'---') observ
		from nino n
		where id_nin =".$id;
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function queryCentre($id){
		$query = "
		select 
(select nombre_cv from centro_vida  where id_cv = (select fk_centro from historial_nino where fk_nino = n.id_nin)) centro,
(select telefono_ma from maestro where estado_ma = 'Activo(a)' and id_ma =(select fk_maestro from maestro_centro where fk_centro =(select fk_centro from historial_nino where fk_nino = id_nin))) telefono,
ifnull(fechaingreso_nin,'---') ingreso,
ifnull(inscritopor_nin ,'---') inscrito
from nino n
where id_nin =".$id;
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function queryDetails($id){
		$query =
		"select 
		ifnull(vivefamiliar_hist,'---') fam,
		ifnull(curso_hist,'---') curso, 
		ifnull(tareas_hist,'---') tareas, 
		ifnull(hobby_hist,'---') hobby,
		ifnull(sueno_hist,'---') sueno,
		ifnull(comida_hist,'---') comida,
		ifnull(rasgos_hist,'---') rasgos,
		ifnull(observacion_hist,'---') historia
		from historial_nino
		where fk_nino =".$id;

		$result = $this->generateResult($query);	
		return $result;
	}
	
	function queryParent($id, $parent){
		
		$query =
		"select 
		ifnull((select nombre_pad from padre where id_pad = (select fk_".$parent." from historial_nino where fk_nino = n.id_nin)),'---') nompad,
		ifnull((select apellido_pad from padre where id_pad = (select fk_".$parent." from historial_nino where fk_nino = n.id_nin)),'---') apepad,
		ifnull((select ocupacion_pad from padre where id_pad = (select fk_".$parent." from historial_nino where fk_nino = n.id_nin)),'---') ocupad,
		ifnull((select telefono_pad from padre where id_pad = (select fk_".$parent." from historial_nino where fk_nino = n.id_nin)),'---') telpad,
		ifnull((select date_format(fechanac_pad,'%d-%m-%Y') from padre where id_pad = (select fk_".$parent." from historial_nino where fk_nino = n.id_nin)),'---') fechapad,
		ifnull((select estado_mar from estado_marital where id_mar =(select fk_marital from padre where id_pad =(select fk_".$parent." from historial_nino where fk_nino = n.id_nin))),'---') civilpad,
		ifnull((select vive".$parent."_hist from historial_nino where fk_nino = n.id_nin),'---') vivepad,
		ifnull((select razon".$parent."_hist from historial_nino where fk_nino = n.id_nin),'---') razonpad
		FROM nino n
		WHERE id_nin =".$id;
		
		$result = $this->generateResult($query);	
		return $result;
	}
	
	function queryHome($id){		
		$query = 
		"select 
		ifnull((select provincia_dir from direccion where id_dir = (select fk_hogar_actual from historial_nino where fk_nino = n.id_nin)),'---') prov,
		ifnull((select distrito_dir from direccion where id_dir = (select fk_hogar_actual from historial_nino where fk_nino = n.id_nin)),'---') dist,
		ifnull((select lugar_dir from direccion where id_dir = (select fk_hogar_actual from historial_nino where fk_nino = n.id_nin)),'---') lugar
		from nino n
		where id_nin =".$id;
		
		$result = $this->generateResult($query);	
		return $result;
	}
		
		
	function generateResult($query){
		global $wpdb;	
		$result = $wpdb->get_results($query);
		
		return $result;
	}
	
	function getData($id){
		
		$resultChild = $this->queryChildSimple($id);
		$resultSchool = $this->querySchool($id);
		$resultTech = $this->queryTechSchool($id);
		$resultSibling = $this->querySiblings($id);
		$resultAcceptance = $this->queryAcceptance($id);
		$resultCentre = $this->queryCentre($id);
		$resultDetails = $this->queryDetails($id);
		$resultMother = $this->queryParent($id,'madre');
		$resultFather = $this->queryParent($id,'padre');
		$resultHome = $this->queryHome($id);
	
		foreach ($resultChild as $element){
			$nombre = $element->nom; 
			$apellido = $element->ape;
			$sexo = $element->sexo; 
			$fecha = $element->nac;
			$edad = $element->edad; 
			$centro = $element->centro; 
			$sponsor = $element->padrino;
			$codigo = $element->cod; 
			$status = $element->estado; 
			$foto = $element->foto;
		}
		
		foreach ($resultSchool as $element){
			$estudio = $element->estudio;
			$turno = $element->turno;	
		}
		
		foreach ($resultTech as $element){
			$nombretec = $element->nombretec;
			$iniciotec = $element->iniciotec;
			$fintec = $element->fintec;
		}
		
		foreach($resultAcceptance as $element){
			$acept = $element->acep;
			$aceptfecha = $element->fecha;	
			$aceptobserv = $element->observ;
		}
		
		foreach($resultCentre as $element){
			$telefono = $element->telefono;
			$ingreso = $element->ingreso;
			$inscrito = $element->inscrito;
		}
		
		foreach ($resultDetails as $element){
			$familiar = $element->fam;
			$curso =  $element->curso;
			$tareas = $element->tareas;
			$hobby = $element->hobby;
			$sueno = $element->sueno;
			$comida = $element->comida;
			$rasgos = $element->rasgos;
			$historia = $element->historia;
		}
		
		foreach ($resultHome as $element){
			$prov = $element->prov;
			$dist = $element->dist;
			$lugar = $element->lugar;	
		}
		
		foreach ($resultFather as $element){
			$nompad = $element->nompad;
			$apepad = $element->apepad;
			$ocupad = $element->ocupad;
			$telpad = $element->telpad;
			$fechapad = $element->fechapad;
			$civilpad = $element->civilpad;
			$razonpad = $element->razonpad;
			$vivepad = $element->vivepad;
		}
		
		foreach ($resultMother as $element){
			$nommad = $element->nompad;
			$apemad = $element->apepad;
			$ocumad = $element->ocupad;
			$telmad = $element->telpad;
			$fechamad = $element->fechapad;
			$civilmad = $element->civilpad;
			$razonmad = $element->razonpad;
			$vivemad = $element->vivepad;
		}
	}
}

	
?>