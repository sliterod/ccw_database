<?php
/*Template Name: Reporte Nombre*/
?>

<?php get_header();

	$name = $_POST[nombre];
	$check = $_POST[check];
	$query = "";
	//echo 'reporte nombre: '.$name.', '.$check;
	
	$queryName = "
	SELECT concat(nombre_nin, ' ', apellido_nin) nom, id_nin id 
	FROM nino
	WHERE nombre_nin LIKE '%".$name."%'
	ORDER BY nom
	";
	
	$queryLast = "
	SELECT concat(nombre_nin, ' ', apellido_nin) nom, id_nin id 
	FROM nino
	WHERE apellido_nin LIKE '%".$name."%'
	ORDER BY nom
	";

	if ($check == "name") $query = $queryName;
	else if ($check == "last") $query = $queryLast;

	$result = $wpdb->get_results($query);

	if (count($result) > 0){
		foreach ($result as $element){
			$id = $element->id;
			$name = $element->nom;
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<table width="500px" border="1">
	<tr align="justify">
        <th>Nombre del niño</td>
    </tr>
	<tr align="justify">
    	<td><a href="http://localhost/ccwperu/ficha-simple-nino/?id=<?php echo $id?>">
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
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>