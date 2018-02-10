<?php
/*Template Name: Centro Vida*/
?>

<?php get_header();

	global $wpdb;
	$result = $wpdb->get_results(
	"SELECT id_cv as id, 
	nombre_cv as nom, 
	ifnull((select concat(nombre_ma,' ',apellido_ma) from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 1 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') maestro
	FROM centro_vida
	ORDER BY nombre_cv"
	);
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<form action="http://localhost/ccwperu/pdf-lista-centros/" method="post">
<div id="results">
<table border ="1" width="600px" align="center" id="centre">
    <tr>
	    <th><input type="hidden" name="head_num" value="N°" />
        <center>N°</center>
        </th>
        <th><input type="hidden" name="head_centro" value="Centro de Vida" />
        <center>Centro de Vida</center>
        </th>
        <th><input type="hidden" name="head_maestro" value="Maestra (o)" />
        <center>Maestra (o)</center>
        </th>
    </tr>

<?php	
	$counter = 1;
	$number = '';
	$centre = '';
	$teacher = '';
	
	foreach ($result as $element){
		$id = $element->id;
		$name = $element->nom;
		$maestro = $element->maestro;
		?>
		<tr>
	        <td><center><?php echo $counter;?></center>
            </td>
        	<td>
            <center><a href="http://localhost/ccwperu/reporte-centro-vida/?id=<?php echo $id;?>"><?php echo $element->nom;?></a></center></td>
            <td><center><?php echo $maestro;?></center></td>
		</tr>
        <?php
		$number = $number.'_'.$counter;
		$centre = $centre.'_'.$name;
		$counter = $counter+1;
		$teacher = $teacher.'_'.$maestro;
	}
?>
</table>
</div>
<input type="hidden" name="numero" value="<?php echo $number?>" />
<input type="hidden" name="centro" value="<?php echo $centre?>" />
<input type="hidden" name="maestro" value="<?php echo $teacher?>" />
<input type="submit" align="middle" value="Generar reporte"/>
</form>
<br />
<form action="http://localhost/ccwperu/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>