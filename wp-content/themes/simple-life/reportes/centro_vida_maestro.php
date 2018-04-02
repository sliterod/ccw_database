<?php
/*Template Name: Centro Vida Maestro*/
?>

<?php get_header();

	global $wpdb;
	$result = $wpdb->get_results(
	"SELECT id_cv as id, nombre_cv as nom 
	FROM centro_vida
	ORDER BY nombre_cv"
	);
?>
<form action="http://192.168.1.8/ccwperu/pdf-lista-centros/" method="post">
<div id="results">
<table border ="1" width="400px" align="center" id="centre">
    <tr>
	    <th><input type="hidden" name="head_num" value="N°" />
        <center>N°</center>
        </th>
        <th><input type="hidden" name="head_centro" value="Centro de Vida" />
        <center>Centro de Vida</center>
        </th>
        <th><input type="hidden" name="head_maestro" value="Centro de Vida" />
        <center>Maestra(o)</center>
        </th>
        <th><input type="hidden" name="head_maestro" value="Centro de Vida" />
        <center>Teléfono</center>
        </th>
    </tr>

<?php	
	$counter = 1;
	$number = '';
	$centre = '';
	
	foreach ($result as $element){
		$id = $element->id;
		$name = $element->nom;;
		?>
		<tr>
	        <td><center><?php echo $counter;?></center>
            </td>
        	<td><center><a href="http://192.168.1.8/ccwperu/reporte-centro-vida/?id=<?php echo $id?>"><?php echo $element->nom;?></a></center></td>
            <td><center></center></td>
            <td><center></center></td>
		</tr>
        <?php
		$number = $number.'_'.$counter;
		$centre = $centre.'_'.$name;
		$counter = $counter+1;
	}
?>
</table>
</div>
<input type="hidden" name="numero" value="<?php echo $number?>" />
<input type="hidden" name="centro" value="<?php echo $centre?>" />
<input type="submit" align="middle" value="Generar reporte"/>
</form>
<?php get_footer(); ?>