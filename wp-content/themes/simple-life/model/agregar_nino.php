<?php
/*Template Name: Agregar Niño*/
include_once('db_manager_nino.php');
get_header();
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<?php
		
	//Datos niño
	$nombre = $_POST['nombreA'].' '.$_POST['nombreB'];
	$apellido = $_POST['apellidoA'].' '.$_POST['apellidoB'];
	$sexo = $_POST['sexo'];
	$dni = $_POST['dni'];
	$fechanac = $_POST['fechanac'];
	$status = $_POST['status'];
	$codigo = $_POST['codigoA'].$sexo.$_POST['codigoB'];
	
	//Sponsor
	$sponsor = $_POST['sponsor'];
	$title = $_POST['title'];
	
	if ($title != "none"){
		$sponsor = $title.' '.$sponsor;
	}
		
	//Escuela
	$grado = $_POST['grado'];
	$turno = $_POST['turno'];
	$tech = $_POST['tech'];
	$techini = $_POST['techini'];
	$techfin = $_POST['techfin'];
	
	//Padres
	$nommad = $_POST['nommadA'].' '.$_POST['nommadB'];
	$apemad = $_POST['apemadA'].' '.$_POST['apemadB'];
	$ocumad = $_POST['ocumad'];
	$religionMad = $_POST['religionmad'];
	$telmadA = $_POST['telmadA'];
	$telmadB = $_POST['telmadB'];
	$fechamad = $_POST['fechamad'];
	$civilmad = $_POST['civilmad'];
	$vivemad = $_POST['vivemad'];
	$razonvivemad = $_POST['razonvivemad'];
	$dianormalmad = $_POST['normalvivemad'];

	$nompad = $_POST['nompadA'].' '.$_POST['nompadB'];
	$apepad = $_POST['apepadA'].' '.$_POST['apepadB'];
	$ocupad = $_POST['ocupad'];
	$religionPad = $_POST['religionpad'];
	$telpadA = $_POST['telpadA'];
	$telpadB = $_POST['telpadB'];
	$fechapad = $_POST['fechapad'];
	$civilpad = $_POST['civilpad'];
	$vivepad = $_POST['vivepad'];
	$razonvivepad = $_POST['razonvivepad'];
	$dianormalpad = $_POST['normalvivepad'];
	
	//datos adicionales
	$familiar = $_POST['familiar'];
	$tareas = $_POST['tareas'];
	$hobby = $_POST['hobby'];
	$comida = $_POST['comida'];
	$rasgo1 = $_POST['rasgo1'];
	$rasgo2 = $_POST['rasgo2'];
	$rasgo3 = $_POST['rasgo3'];
	$historia = $_POST['historia'];
	$acept = $_POST['acept'];
	$aceptfecha = $_POST['aceptfecha'];
	$aceptobserv = $_POST['aceptobserv'];
	
	$cursoRadio = $_POST['cursoRadio'];
	$suenoRadio = $_POST['suenoRadio'];
	
	($cursoRadio == "fav") ? $curso = $_POST['cursoSel']:$curso = $_POST['cursoTxt'];
	($suenoRadio == "fav") ? $sueno = $_POST['suenoSel']:$sueno = $_POST['suenoTxt'];	
	
	//direccion
	$prov = $_POST['prov'];
	$dist = $_POST['dist'];
	$lugar = $_POST['lugar'];
	
	//centro
	$centro = $_POST['centro'];
	$inscrito = $_POST['inscrito'];
	$fechaInsCentro = $_POST['fechacentro'];
		
	//File
	$foto = $_POST['foto'];
	
	//Hermano
	$siblingArray = array();
	
	
	$siblingCount = $_POST['siblingCount'];
	echo "count: ".$siblingCount."</br>";
	
	for ($i = 0; $i < $siblingCount; $i++){
		$siblingArray[$i] = 
		$_POST['nombreh'.$i].'_'.
		$_POST['apellidoh'.$i].'_'.
		$_POST['edadh'.$i].'_'.
		$_POST['sexoh'.$i].'_'.
		//$_POST['gradoh'.$i].'_'.
		$_POST['observh'.$i].'_'
		;
	}
	echo "array count: ".count($siblingArray)."</br>";
	echo "array pos[0]: ".$siblingArray[0]."</br>";
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
	
///* echos
	echo "Nombre"." ".$nombre."</br>";
	echo "Apellido"." ".$apellido."</br>";
	echo "Sexo"." ".$sexo."</br>";
	echo "DNI"." ".$dni."</br>";
	echo "FechaNac"." ".$fechanac."</br>";
	echo "Status"." ".$status."</br>";
	echo "Codigo"." ".$codigo."</br>";
	
	//Sponsor
	echo "Sponsor"." ".$sponsor."</br>";
		
	//Escuela
	echo "Grado"." ".$grado."</br>";
	echo "Turno"." ".$turno."</br>";
	echo "Tecnológico"." ".$tech."</br>";
	echo "Inicio Tec"." ".$techini."</br>";
	echo "Fin Tec"." ".$techfin."</br>";
	
	//Padres
	echo "Nombre madre"." ".$nommad."</br>";
	echo "Apellido madre"." ".$apemad."</br>";
	echo "Ocup madre"." ".$ocumad."</br>";
	echo "Religion madre"." ".$religionMad."</br>";
	echo "Tel madre"." ".$telmadA."</br>";
	echo "Tel madre"." ".$telmadB."</br>";
	echo "Nac madre"." ".$fechamad."</br>";
	echo "Civil madre"." ".$civilmad."</br>";
	echo "Vive con el niño"." ".$vivemad."</br>";
	echo "Por qué"." ".$razonvivemad."</br>";
	echo "Dia normal"." ".$dianormalmad."</br>";

	echo "Nombre padre"." ".$nompad."</br>";
	echo "Apellido padre"." ".$apepad."</br>";
	echo "Ocup padre"." ".$ocupad."</br>";
	echo "Religion padre"." ".$religionPad."</br>";
	echo "Tel padre"." ".$telpadA."</br>";
	echo "Tel padre"." ".$telpadB."</br>";
	echo "Nac padre"." ".$fechapad."</br>";
	echo "Civil padre"." ".$civilpad."</br>";
	echo "Vive con el niño"." ".$vivepad."</br>";
	echo "Por qué"." ".$razonvivepad."</br>";
	echo "Dia normal"." ".$dianormalpad."</br>";
	
	//datos adicionales
	echo "Familiar"." ".$familiar."</br>";
	echo "Tareas"." ".$tareas."</br>";
	echo "Hobby"." ".$hobby."</br>";
	echo "Comida"." ".$comida."</br>";
	echo "Rasgo"." ".$rasgo1."</br>";
	echo "Rasgo"." ".$rasgo2."</br>";
	echo "Rasgo"." ".$rasgo3."</br>";
	echo "Historia"." ".$historia."</br>";
	echo "Acept"." ".$acept."</br>";
	echo "Acept fecha"." ".$aceptfecha."</br>";
	echo "Acept observ"." ".$aceptobserv."</br>";
	
	echo "Curso"." ".$curso."</br>";
	echo "Sueños"." ".$sueno."</br>";	
	
	//direccion
	echo "Provincia"." ".$prov."</br>";
	echo "Distrito"." ".$dist."</br>";
	echo "Lugar"." ".$lugar."</br>";
	
	//centro
	echo "Centro"." ".$centro."</br>";
	echo "Inscrito por"." ".$inscrito."</br>";
	echo "Inscripcion"." ".$fechaInsCentro."</br>";
//*/	
?>

</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>