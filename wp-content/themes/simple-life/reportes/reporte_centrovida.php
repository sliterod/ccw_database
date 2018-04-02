<?php
/*Template Name: Reporte Centro Vida*/
include('../ccwperu/wp-content/themes/simple-life/model/var_centro.php');
?>

<?php get_header();

	$id = $_GET['id'];

if ($id){
		$centroData = new CentroVida();
		$nombreCentro = $centroData->getNombreCentro($id);
		$dirCentro = $centroData->getDireccion($id);
		$resultMaestro = $centroData->getInfoMaestro($id,1);
		
		$resultAyudantes = $centroData->getIdAyudantes($id);
		
?><head>
<link rel="stylesheet" type="text/css" href="/ccwperu/wp-content/themes/simple-life/css/general-style.css">
</head>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">

	<form action="http://192.168.1.8/ccwperu/pdf-centro-vida/" method="post">
	<div id="results">
	<table border ="1" width="800px" align="center">
		<tr>
			<th width="30%" class="to-upper" colspan="2">
            <input type="hidden" name="centro" value="<?php echo $nombreCentro;?>" />
            <center><?php echo $nombreCentro;?></center>
            </th>
        </tr>
        <tr>
	        <th width="10%" class="to-upper">Dirección</th>
            <td class="to-upper"><input type="hidden" name="direccion" value="<?php echo $dirCentro;?>" />
            <center><?php echo $dirCentro;?></center>
            </td>
        </tr>
    </table>
    </br>
    <table border ="1" width="800px" align="center">
        <tr>
			<th class="to-upper" colspan="4"><center>Maestros</center></th>
        </tr>
        <tr>
	        <th width="40%" class="to-upper"><center>nombre</center></th>
            <th class="to-upper" colspan="2"><center>teléfonos</center></th>
            <th width="30%" class="to-upper"><center>correo</center></th>
        </tr>
        <tr>
		<?php 
			foreach($resultMaestro as $element){
		?>
			<td><input type="hidden" name="maestro" value="<?php echo $element->nombre;?>" />
			<center><?php echo $element->nombre;?></center>
            </td>
            <td width="15%"><input type="hidden" name="maes_tel" value="<?php echo $element->telA;?>" />
            <center><?php echo $element->telA;?></center>
            </td>
            <td width="15%"><input type="hidden" name="maes_tel_B" value="<?php echo $element->telB;?>" />
            <center><?php echo $element->telB;?></center>
            </td>
            <td><input type="hidden" name="correo" value="<?php echo $element->correo;?>" />
            <center><?php echo $element->correo;?></center>
            </td>
       	<?php 
			}
		?>
        </tr>
<?php 
		foreach ($resultAyudantes as $ayudante){
		
			$resultAyud = $centroData->getInfoAyudante($ayudante->id,2);
		
			foreach ($resultAyud as $ayudante){
				$nomAyud = $ayudante->nombre;
				$telAyudA = $ayudante->telA;
				$telAyudB = $ayudante->telB;
				$correoAyud = $ayudante->correo;
			}
?>
        <tr>
        	<td><input type="hidden" name="ayudante" value="<?php echo $nomAyud;?>" />
			<center><?php echo $nomAyud;?></center>
            </td>
            <td><input type="hidden" name="telAyudA" value="<?php echo $telAyudA;?>" />
            <center><?php echo $telAyudA;?></center>
            </td>
            <td><input type="hidden" name="telAyudB" value="<?php echo $telAyudB;?>" />
            <center><?php echo $telAyudB;?></center>
            </td>
            <td><input type="hidden" name="correoAyud" value="<?php echo $correoAyud;?>" />
            <center><?php echo $correoAyud;?></center>
            </td>
		</tr>
<?php			
		}
?>
	</table>
	</div>	
    	<input type="hidden" name="contenido" value="contenido_cont2"/>
        <input type="hidden" name="head_centro" value="Nombre_Dirección"/>
        <input type="hidden" name="head_maestro" value="Maestra(o)_Teléfono Maestra(o)"/>
        <input type="hidden" name="head_ayudante" value="Ayudante_Teléfono Ayudante"/>
        <input type="submit" align="middle" value="Generar reporte"/>
    </form>
    </br>
    <form action="http://192.168.1.8/ccwperu/centro-vida/">
	<input type="submit" align="middle" value="Regresar"/>
	</form>

</main><!-- #main -->
</div><!-- #primary -->
<?php 

}

else{
	echo ('Disculpe, no se encontraron resultados que coincidan con su criterio de búsqueda.');
}



get_footer();?>