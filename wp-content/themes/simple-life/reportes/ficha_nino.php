<?php
/*Template Name: Ficha Niño*/
?>
<?php 
	include('../ccwperu/wp-content/themes/simple-life/model/var_ficha_nino.php');
	get_header();
?>
<?php
	global $wpdb;
	//database data and variables
	$id = $_GET[id];

	$queryClass = new ProfileInfo();
	
	$resultChild = $queryClass->queryChildSimple($id);
	$resultSchool = $queryClass->querySchool($id);
	$resultTech = $queryClass->queryTechSchool($id);
	$resultSibling = $queryClass->querySiblings($id);
	$resultAcceptance = $queryClass->queryAcceptance($id);
	$resultCentre = $queryClass->queryCentre($id);
	$resultDetails = $queryClass->queryDetails($id);
	$resultMother = $queryClass->queryParent($id,'madre');
	$resultFather = $queryClass->queryParent($id,'padre');
	$resultHome = $queryClass->queryHome($id);
	
	$dataSiblings = array();
	$siblingCount = 0;
	
	foreach ($resultChild as $element){
		$nombre = $element->nom; $apellido = $element->ape; $sexo = $element->sexo; $fecha = $element->nac;
		$edad = $element->edad; $centro = $element->centro; $sponsor = $element->padrino;
		$codigo = $element->cod; $status = $element->estado; $foto = $element->foto;
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
	
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<form action="http://192.168.1.8/ccwperu/pdf-nino-completo/" method="post">
<table id="datos_nino" border="1" width="800px">
    <tr align="center">
    	<th colspan="3">Datos del niño</th>
    </tr>
    <tr align="center">
    	<th width="30%" rowspan="9" >
        <img name="pic" src="<?php echo $foto;?>" width="200" height="200" align="middle"/>
        <input type="hidden" name="foto" value="<?php echo $foto;?>" />
        </th>
    </tr>
	<tr align="justify">
	    <th width="25%">Código</th>
        <td width="45%"><?php echo $codigo;?>
        </td>
    </tr>
    <tr align="justify">
        <th>Nombres</th>
        <td><?php echo $nombre;?>
        </td>
    </tr>
    <tr align="justify">
        <th>Apellidos</th>
        <td><?php echo $apellido;?>
        </td>
    </tr>
    <tr align="justify">
        <th>Sexo</th>
        <td><?php echo $sexo;?>
        </td>
    </tr>
    <tr align="justify">
        <th>Fecha de nacimiento</th>
        <td><?php echo $fecha;?>
        </td>
    </tr>
        <tr align="justify">
        <th>Edad actual</th>
		<td><?php echo $edad;?>
        </td>
    </tr>
    <tr align="justify">
        <th>Nombre del padrino</th>
        <td><?php echo $sponsor;?>
        </td>
    </tr>
    <tr align="justify">
        <th>Estado actual</th>
        <td><?php echo $status;?>
        </td>
    </tr>
</table>
</br>
<table id="estudios" border="1" width="800px">
    <tr align="center">
    	<th colspan="6">Datos escolares</th>
    </tr>
    <tr align="justify">
    	<th width="20%">Grado de estudios</th>
        <td colspan="2"><?php echo $estudio;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Turno</th>
        <td colspan="2"><?php echo $turno;?></td>
    </tr>
    <tr align="center">
    	<th colspan="6">Escuela técnica</th>
    </tr>
    <tr align="justify">
        <th width="20%">Nombre</th>
        <td colspan="2"><?php echo $nombretec;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Fecha ingreso</th>
        <td colspan="2"><?php echo $iniciotec;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Fecha culminación</th>
        <td colspan="2"><?php echo $fintec;?></td>
    </tr>
</table>
</br>
<table id="datos_hermano" border="1" width="800px">
	<tr align="center">
    	<th colspan="6">Datos hermanos</th>
    </tr>
	<tr align="justify">
    	<th>Nombres</th>
        <th>Apellidos</th>
        <th width="10%">Grado</th>
        <th width="5%">Edad</th>
        <th width="5%">Sexo</th>
        <th>Observaciones</th>
    </tr>
   <?php 
	if (count($resultSibling) > 0){
		foreach ($resultSibling as $sibling){
			
			$snom =$sibling->nombre;
			$sape = $sibling->apellido;
			$sgrad = $sibling->grado;
			$sedad = $sibling->edad;
			$ssexo = $sibling->sexo;
			$sobserv = $sibling->observacion;
			
			$dataSiblings[$siblingCount] = 
			$snom.'_'.$sape.'_'.$sgrad.'_'.$sedad.'_'.$ssexo.'_'.$sobserv;
			
			$siblingCount = $siblingCount + 1;
	?>
    	<tr align="justify">
			<td><?php echo $snom;?></td>
			<td><?php echo $sape;?></td>
			<td><?php echo $sgrad;?></td>
			<td><?php echo $sedad;?></td>
			<td><?php echo $ssexo;?></td>
			<td><?php echo $sobserv;?></td>
		</tr>
    <?php		
		}
	}
	else{
	?>
		<tr align="justify">
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
		</tr>
    <?php 
	}
	?>
</table>
</br>
<table id="datos_padre" border="1" width="800px">
	<tr align="center">
    	<th colspan="4"><center>Datos padres</center></th>
    </tr>
    <tr align="center">
    	<th colspan="2"><center>Madre</center></th>
        <th colspan="2"><center>Padre</center></th>
    </tr>
    <tr align="justify">
	    <th width="25%">Nombres</th>
        <td width="25%"><?php echo $nommad;?></td>
        <th width="25%">Nombres</th>
        <td width="25%"><?php echo $nompad;?></td>
    </tr>
    <tr align="justify">
    	<th>Apellidos</th>
        <td><?php echo $apemad;?></td>
        <th>Apellidos</th>
        <td><?php echo $apepad;?></td>
    </tr>
    <tr align="justify">
        <th>Ocupación</th>
        <td><?php echo $ocumad;?></td>
        <th>Ocupación</th>
        <td><?php echo $ocupad;?></td>
    </tr>
    <tr align="justify">
	    <th>Teléfono</th>
        <td><?php echo $telmad;?></td>
        <th>Teléfono</th>
        <td><?php echo $telpad;?></td>
    </tr>
    <tr align="justify">
	    <th>Fecha nacimiento</th>
        <td><?php echo $fechamad;?></td>
        <th>Fecha nacimiento</th>
        <td><?php echo $fechapad;?></td>
    </tr>
    <tr align="justify">
    	<th>Estado civil</th>
        <td><?php echo $civilmad;?></td>
        <th>Estado civil</th>
        <td><?php echo $civilpad;?></td>
    </tr>
    <tr align="justify">
	    <th>¿Vive con la familia?</th>
        <td><?php echo $vivemad;?></td>
        <th>¿Vive con la familia?</th>
        <td><?php echo $vivepad;?></td>
    </tr>
    <tr align="justify">
        <th>Si la respuesta es no, ¿por qué?</th>
        <td><?php echo $razonmad;?></td>
        <th>Si la respuesta es no, ¿por qué?</th>
        <td><?php echo $razonpad;?></td>
    </tr>
</table>
</br>
<table id="datos_adicional" border="1" width="800px">
	<tr align="center">
    	<th colspan="3">Información adicional</th>
    </tr>
	<tr align="justify">
	    <th width="20%">(Familia)</th>
    	<th width="35%">Si no vive con los padres, ¿con quién vive?</th>
        <td><?php echo $familiar;?></td>
    </tr>
    <tr align="justify">
    	<th width="20%">(Curso favorito)</th>
    	<th width="35%">Curso favorito en su lugar de estudios</th>
        <td><?php echo $curso;?></td>
    </tr>
        <tr align="justify">
        <th width="20%">(Tareas)</th>
    	<th width="35%">¿En qué forma ayuda el niño a su familia?</th>
        <td><?php echo $tareas;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">(Pasatiempo)</th>
    	<th width="35%">¿Cuál es su juego o actividad favorita?</th>
        <td><?php echo $hobby;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">(Sueños futuros)</th>
    	<th width="35%">¿Qué quiere ser cuando sea grande?</th>
        <td><?php echo $sueno;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">(Comida común)</th>
    	<th width="35%">¿Qué come usualmente el niño como alimento principal?</th>
        <td><?php echo $comida;?></td>
    </tr>
        <tr align="left">
        <th width="20%">(Rasgos de personalidad)</th>
    	<td colspan="2"><center><?php echo $rasgos;?></center></td>
    </tr>
    <tr>
        <tr align="left">
        <th width="20%">Historia del niño</th>
    	<td colspan="2"><?php echo $historia;?></td>
    </tr>
</table>
</br>
<table id="datos_aceptacion" border="1" width="800px">
	<tr align="center">
    	<th colspan="2">¿Ha aceptado el niño a Cristo como su salvador?</th>
    </tr>
    <tr align="justify">
        <th width="20%">Afirmación</th>
        <td><?php echo $acept;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Fecha de aceptación</th>
        <td><?php echo $aceptfecha;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Observación</th>
        <td><?php echo $aceptobserv;?></td>
    </tr>
</table>	
</br>
<table id="datos_direccion" border="1" width="800px">
	<tr align="center">
    	<th colspan="2">Información domicilio</th>
    </tr>
	<tr align="justify">
        <th width="20%">Ciudad</th><td>Lima</td>
    </tr>
    <tr align="justify">
        <th width="20%">Provincia</th>
        <td><?php echo $prov;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Distrito</th>
        <td><?php echo $dist;?></td>
    </tr>
    <tr align="justify">
        <th width="20%">Dirección domicilio</th>
        <td><?php echo $lugar;?></td>
    </tr>
</table>
<br>
<table id="datos_centro" border="1" width="800px">
	<tr align="center">
    	<th colspan="2">Información Centro de Vida</th>
    </tr>
	<tr align="justify">
        <th width="30%">Nombre Centro de Vida</th>
        <td><?php echo $centro;?></td>
    </tr>
    <tr align="justify">
        <th width="30%">Nombre de quien inscribe</th>
        <td><?php echo $inscrito;?></td>
    </tr>
    <tr align="justify">
        <th width="30%">Teléfono</th>
        <td><?php echo $telefono;?></td>
    </tr>
	<tr align="justify">
        <th width="30%">Fecha de inscripción</th>
        <td><?php echo $ingreso;?></td>
    </tr>
</table>
</br>
<input type="hidden" name="nino" value="
<?php echo $codigo.'_'.$nombre.'_'.$apellido.'_'.$sexo.'_'.$fecha.'_'.$edad.'_'.$sponsor.'_'.$status.'_'.$centro;
?>" />
<input type="hidden" name="madre" value="
<?php echo $nommad.'_'.$apemad.'_'.$ocumad.'_'.$telmad.'_'.$fechamad.'_'.$vivemad.'_'.$razonmad.'_'.$civilmad;
?>"/>
<input type="hidden" name="padre" value="
<?php echo $nompad.'_'.$apepad.'_'.$ocupad.'_'.$telpad.'_'.$fechapad.'_'.$vivepad.'_'.$razonpad.'_'.$civilpad;
?>"/>
<input type="hidden" name="hermano" value="
<?php print base64_encode(serialize($dataSiblings));
?>"/>
<input type="hidden" name="estudio" value="
<?php echo $estudio.'_'.$turno;?>"/>
<input type="hidden" name="tecnica" value="
<?php echo $nombretec.'_'.$iniciotec.'_'.$fintec;?>"/>
<input type="hidden" name="adicional" value="
<?php echo $familiar.'_'.$curso.'_'.$tareas.'_'.$hobby.'_'.$sueno.'_'.$comida.'_'.$rasgos.'_'.$acept.'_'.$aceptfecha.'_'.$aceptobserv;?>"/>
<input type="hidden" name="centro" value="
<?php echo $centro.'_'.$inscrito.'_'.$telefono.'_'.$ingreso;?>"/>
<input type="hidden" name="domicilio" value="
<?php echo 'Lima_'.$prov.'_'.$dist.'_'.$lugar;?>"/>
<input type="hidden" name="historia" value="
<?php echo $historia;?>"/>
<input type="submit" align="middle" value="Generar reporte"/>
</form>
</br>
<form action="http://192.168.1.8/ccwperu/ficha-simple-nino/?id=<?php echo $id;?>"  method="post">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>