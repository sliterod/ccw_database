<?php
/*Template Name: Agregar Niño*/
include_once('db_manager_nino.php');
get_header();
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<?php
		
	//Datos niño
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombreA'].' '.$_POST['nombreB'];
	$apellido = $_POST['apellido'];
	$sexo = $_POST['sexo'];
	$fechanac = $_POST['fechanac'];
	$sponsor = $_POST['sponsor'];
	$status = $_POST['status'];
	
	//Escuela
	$grado = $_POST['grado'];
	$turno = $_POST['turno'];
	$tech = $_POST['tech'];
	$techini = $_POST['techini'];
	$techfin = $_POST['techfin'];
	
	//Padres
	$nommad = $_POST['nommad'];
	$apemad = $_POST['apemad'];
	$ocumad = $_POST['ocumad'];
	$telmad = $_POST['telmad'];
	$fechamad = $_POST['fechamad'];
	$civilmad = $_POST['civilmad'];
	$vivemad = $_POST['vivemad'];
	$razonmad = $_POST['razonmad'];
	$nompad = $_POST['nompad'];
	$apepad = $_POST['apepad'];
	$ocupad = $_POST['ocupad'];
	$telpad = $_POST['telpad'];
	$fechapad = $_POST['fechapad'];
	$civilpad = $_POST['civilpad'];
	$vivepad = $_POST['vivepad'];
	$razonpad = $_POST['razonpad'];
	
	//datos
	$familiar = $_POST['familiar'];
	$curso = $_POST['curso'];
	$tareas = $_POST['tareas'];
	$hobby = $_POST['hobby'];
	$sueno = $_POST['sueno'];
	$comida = $_POST['comida'];
	$rasgo1 = $_POST['rasgo1'];
	$rasgo2 = $_POST['rasgo2'];
	$rasgo3 = $_POST['rasgo3'];
	$historia = $_POST['historia'];
	$acept = $_POST['acept'];
	$aceptfecha = $_POST['aceptfecha'];
	$aceptobserv = $_POST['aceptobserv'];
	
	//direccion
	$prov = $_POST['prov'];
	$dist = $_POST['dist'];
	$lugar = $_POST['lugar'];
	
	//centro
	$centro = $_POST['centro'];
	$inscrito = $_POST['inscrito'];
	$fechacentro = $_POST['fechacentro'];
		
	//File
	$foto = $_POST['foto'];
	
	//Hermano
	global $nombresH;
	
	//Insert
	//$result = $wpdb->get_results($query);
	
	$managerClass = new DataManager();
	/*$resultInsert = 
	$managerClass->InsertNino("test_nino",$codigo, $nombre, $apellido, $fechanac, $inscrito, $status);
	
	$resultUpdate = $managerClass->UpdateNino("test_nino","sexo_nin",$sexo);
	
	$resultSponsor = $managerClass->InsertSponsor("test_sponsor",$sponsor);
	$resultInHist = $managerClass->InsertHistorialNino("test_nino","test_historial_nino");*/
	
	$resultChild = unserialize(stripcslashes(htmlspecialchars_decode($_POST['resultChild'])));
	echo 'new: '.$nombre.'<br>';
	echo 'old: '.$resultChild[0]->nom.'<br>';
	
	if(strcasecmp($nombre,$resultChild[0]->nom) == 0){
		echo "same";
	}
	else{
		echo "different, can be updated";
	}
?>

</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>