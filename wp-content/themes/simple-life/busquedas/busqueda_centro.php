<?php
/*Template Name: Buscar por Centro*/
get_header();
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<?php 
	
	$tipo = $_GET[lista];

	$query = "SELECT id_cv id, nombre_cv nombre from centro_vida";
	$result = $wpdb->get_results($query);
?>
<form action="http://localhost/ccwperu/lista-ninos/" method="post">
	<label for="sta">Seleccione el Centro de Vida:</label>
    <select name="id">
	<?php
	foreach($result as $element){?>
		<option value="<?php echo $element->id;?>"><?php echo $element->nombre;?></option>
	<?php
	}
	?>
    </select>
    <input type="hidden" name="tipo" value="<?php echo $tipo;?>" />
    <br />
	<input type="submit" value="BUSCAR" /></form>
    </br>
    <form action="http://localhost/ccwperu/listas/">
    <input type="submit" align="middle" value="Regresar"/>
    </form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>