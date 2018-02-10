<?php
/*Template Name: Busqueda Status*/
get_header();
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<?php 
	$query = "SELECT id_sta id, estado_sta estado from status";
	$result = $wpdb->get_results($query);
?>
<form action="http://localhost/ccwperu/reporte-status/" method="post">
	<label for="sta">Seleccione el estado a buscar:</label>
    <select name="status">
	<?php
	foreach($result as $element){?>
		<option value="<?php echo $element->id;?>"><?php echo $element->estado;?></option>
	<?php
	}
	?>
    </select>
    <input type="hidden" name="offset" value="0" />
    <br />
	<input type="submit" value="BUSCAR" /></form>
    </br>
    <form action="http://localhost/ccwperu/busquedas/">
    <input type="submit" align="middle" value="Regresar"/>
    </form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>