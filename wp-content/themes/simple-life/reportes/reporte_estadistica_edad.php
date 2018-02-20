<?php
/*Template Name: Estadistica Edad*/
include('../ccwperu/wp-content/themes/simple-life/model/var_estadistica_edad.php');
get_header();
?>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<div style="width:inherit" align="center">

<table width="100%" border="1">
	<tr>
    	<th><?php echo "Estado: ".$statusNom.", Sexo: ".$sexo.", Edad: ".$edad;?></th>
    </tr>
<?php
	foreach ($childAge as $element){	
?>
   		<tr>
    		<td><a href="http://localhost/ccwperu/ficha-simple-nino/?id=<?php echo $element->id?>">
			<?php echo $element->nombre;?></a>
            </th>
	    </tr>
<?php	
	}
?>
	
</table>

<form action="http://localhost/ccwperu/estadisticas-generales/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>