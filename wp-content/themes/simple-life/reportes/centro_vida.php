<?php
/*Template Name: Centro Vida*/
include('../ccwperu/wp-content/themes/simple-life/model/var_centro.php');
?>

<?php get_header();

	$centroData = new CentroVida();	
	$resultCentro = $centroData->getCentros();
	
?><head>
<link rel="stylesheet" type="text/css" href="/ccwperu/wp-content/themes/simple-life/css/general-style.css">
</head>


<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<form action="http://192.168.1.8/ccwperu/pdf-lista-centros/" method="post">
<div id="results">
<table border ="1" width="800px" align="center" id="centre">
    <tr>
	    <th class="to-upper" width="5%"><input type="hidden" name="head_num" value="N°" />
        <center>N°</center>
        </th>
        <th class="to-upper" width="25%"><input type="hidden" name="head_centro" value="CENTRO DE VIDA" />
        <center>Centro de Vida</center>
        </th>
        <th class="to-upper" width="35%"><input type="hidden" name="head_maestro" value="MAESTRA (O)" />
        <center>Maestra (o)</center>
        </th>
        <th class="to-upper" colspan="2"><input type="hidden" name="head_telf" value="TELÉFONOS" />
        <center>Teléfonos</center>
        </th>
    </tr>

<?php	
	$counter = 1;
	$number = '';
	$centre = '';
	$teach = '';
	$phone = '';
	
	foreach ($resultCentro as $element){
		$id = $element->id;
		$name = $element->nom;

		$resultMaestro = $centroData->getInfoMaestro($id,1);
		
		foreach($resultMaestro as $teacher){
			$maestro = $teacher->nombre;
			$telfA = $teacher->telA;
			$telfB = $teacher->telB;
			$teachId = $teacher->id;
		}
	
		?>
		<tr>
	        <td><center><?php echo $counter;?></center></td>
        	<td>
            <center><a href="http://192.168.1.8/ccwperu/reporte-centro-vida/?id=<?php echo $id;?>">
			<?php echo $name;?></a></center>
            </td>
            <td><a href="">
			<center><?php echo $maestro;?></center>
            </a></td>
            <td><center><?php echo $telfA;?></center></td>
            <td><center><?php echo $telfB;?></center></td>
		</tr>
        <?php
		$number = $number.'_'.$counter;
		$centre = $centre.'_'.$name;
		$counter = $counter+1;
		$teach = $teach.'_'.$maestro;
		$phone = $phone.'_'.$telfA.'/'.$telfB;
	}
?>
</table>
</div>
<input type="hidden" name="numero" value="<?php echo $number?>" />
<input type="hidden" name="centro" value="<?php echo $centre?>" />
<input type="hidden" name="maestro" value="<?php echo $teach?>" />
<input type="hidden" name="telefono" value="<?php echo $phone?>" />
<input type="submit" align="middle" value="Generar reporte"/>
</form>
<br />
<form action="http://192.168.1.8/ccwperu/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>