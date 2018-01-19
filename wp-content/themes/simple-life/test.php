<?php
/*Template Name: Test*/
?>

<?php get_header();

	global $wpdb;
	$result = $wpdb->get_results(
	"SELECT id_cv as id, nombre_cv as nom 
	FROM centro_vida
	ORDER BY nom"
	);
?>
<div id="results">
<table border ="1">
    <tr>
        <th><center>CENTRO VIDA</center></th>
    </tr>

<?php	
	foreach ($result as $element){?>
		<tr>
        	<td><center><a href="http://localhost/ccwperu/reporte-centro-vida/?id=<?php echo $element->id?>"><?php echo $element->nom;?></a></center></td>
		</tr>
        <?php
	}
?>
</table>
</div>
<?php get_footer(); ?>