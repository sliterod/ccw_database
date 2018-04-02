<?php
/*Template Name: Lista Niño*/
get_header();

require ('../ccwperu/wp-content/themes/simple-life/model/db_conn.php');

abstract class Status{
	const todos = 0;
	const apadrinado = 1;	
	const espera = 2;
	const retirado = 3;
	const egresado = 4;
}

class ListaNino {
	
	function getStatus($tipo){
		
		$status = 0;
		
		switch ($tipo){
			case "apadrinados":
			$status = Status::apadrinado;	
			break;
			
			case "espera":
			$status = Status::espera;	
			break;
			
			case "egresados":
			$status = Status::egresado;	
			break;
			
			case "retirados":
			$status = Status::retirado;	
			break;
			
			case "todos":
			$status = Status::todos;
			break;
		}
		
		return $status;
	}
	
	function getChildren($tipo, $centro){
		
		$fk_status = $this->getStatus($tipo);
		$query = "";
		
		if ($fk_status > 0){
			$query = "
			select 
			(select concat(nino.nombre_nin,' ',nino.apellido_nin)) nombre,
			nino.codigo_nin codigo
			from nino
			inner join historial_nino on nino.id_nin = historial_nino.fk_nino
			where nino.fk_status = ".$fk_status."
			and historial_nino.fk_centro = ".$centro." 
			order by nombre";
		}
		else {
			$query ="
			select 
			(select concat(nino.nombre_nin,' ',nino.apellido_nin)) nombre,
			nino.codigo_nin codigo
			from nino
			inner join historial_nino on nino.id_nin = historial_nino.fk_nino
			where historial_nino.fk_centro = ".$centro." 
			order by nombre";
		}
		
		return $query;
	}
	
	function getCentro($centro){
		$query =
		"SELECT nombre_cv as nom,
		ifnull((select concat(nombre_ma,' ',apellido_ma) from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 1 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') maestro,
		ifnull((select telefono_ma from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 1 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') telmaestro
		FROM centro_vida cv
		WHERE id_cv = ".$centro."";
		
		return $query;
	}
}

	$id = $_POST['id'];
	$tipo = $_POST['tipo'];

	$listaNino = new ListaNino();
	$dbConn = new DatabaseConn();
	
	$nombres = "";
	$centro = "";

	$data = $dbConn->generateResult($listaNino->getChildren($tipo,$id));
	$dataCentro = $dbConn->generateResult($listaNino->getCentro($id));
	
	foreach ($data as $element){
		
		if ($nombres == ""){
			$nombres = $element->nombre.";".$element->codigo;			
		}
		else {
			$nombres = $nombres.'_'.$element->nombre.";".$element->codigo;	
		}
	}
	
	foreach ($dataCentro as $element){
		$centro = $element->nom.'_'.$element->maestro.'_'.$element->telmaestro;
	}

	$tipo = strtoupper($tipo);
?>
<form target="_blank" id="data" action="http://192.168.1.8/ccwperu/pdf-lista-nino/" method="post">
<input type="hidden" name="centro" value="<?php echo $centro;?>"/>
<input type="hidden" name="nombres" value="<?php echo $nombres;?>"/>
<input type="hidden" name="tipo" value="<?php echo $tipo;?>"/>
</form>
<script type="text/javascript">
	document.getElementById('data').submit();
</script>
<?php 
//header ('location:http://192.168.1.8/ccwperu/pdf-lista-nino/?id='.$id.'');
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<p>Los resultados se mostraron en una nueva ventana. Si estos no aparecen, por favor permita a su navegador abrir ventanas emergentes de esta pagína.</p>
<form action="http://192.168.1.8/ccwperu/listas/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>