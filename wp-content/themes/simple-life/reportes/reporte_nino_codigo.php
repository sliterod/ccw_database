<?php
/*Template Name: Reporte Código*/
?>

<?php get_header();

	$code = $_POST[code];
	
	$query = "
	SELECT concat (nombre_nin,' ',apellido_nin) nom, id_nin id
	FROM nino 
	WHERE codigo_nin LIKE '%".$code."'
	ORDER BY nom
	";

	$result = $wpdb->get_results($query);
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<table width="500px" border="1">
	<tr align="justify">
        <th>Nombre del niño</td>
    </tr>
<?php
	if (count($result) > 0){
		foreach ($result as $element){
			$id = $element->id;
			$name = $element->nom;
?>
	<tr align="justify">
    	<td><a href="http://192.168.1.8/ccwperu/ficha-simple-nino/?id=<?php echo $id?>">
        <?php echo $name?>
        </a>
        </td>
    </tr>
<?php			
		}
	}
	else{
		echo ('Disculpe, no se encontraron resultados que coincidan con su criterio de búsqueda.');
	}
?>
</table>
</br>
<form action="http://192.168.1.8/ccwperu/busqueda-codigo/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>