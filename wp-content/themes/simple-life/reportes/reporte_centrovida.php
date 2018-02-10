<?php
/*Template Name: Reporte Centro Vida*/
?>

<?php get_header();

	$id = $_GET[id];

if ($id){
	global $wpdb;
		$query = "
		SELECT id_cv, nombre_cv as nom,
		ifnull((select concat(nombre_ma,' ',apellido_ma) from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 1 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') maestro,
		ifnull((select concat(nombre_ma,' ',apellido_ma) from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 2 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') ayudante,
		ifnull((select telefono_ma from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 1 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') telmaestro,
		ifnull((select telefono_ma from maestro where estado_ma = 'Activo(a)' and fk_rol_maestro = 2 and id_ma =(select fk_maestro from maestro_centro where fk_centro = id_cv)),'---') telayudante,
		ifnull((select concat(lugar_dir,', ',distrito_dir,' - ',provincia_dir) from direccion where id_dir = cv.fk_direccion),'---') dir
		FROM centro_vida cv
		WHERE id_cv =".$id;
		
		$result = $wpdb->get_results($query);
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">

	<form action="http://localhost/ccwperu/pdf-centro-vida/" method="post">
	<div id="results">
<?php	
	foreach ($result as $element){?>
	<table border ="1" width="800px" align="center">
		<tr>
			<th width="30%"><center>Nombre del centro</center></th>
            <th width="70%"><center>Dirección</center></th>
            
        </tr>
        <tr>
	        <td><input type="hidden" name="centro" value="<?php echo $element->nom;?>" />
            	<center><?php echo $element->nom;?></center>
            </td>
			<th width="70%"><input type="hidden" name="direccion" value="<?php echo $element->dir;?>" />
            	<center><?php echo $element->dir;?></center>
            </th>
        </tr>
    </table>
    </br>
    <table border ="1" width="800px" align="center">
        <tr>
			<th width="50%"><center>Maestra(o)</center></th>
            <th width="50%"><center>Teléfono Maestra(o)</center></th>
        </tr>
        <tr>
			<td><input type="hidden" name="maestro" value="<?php echo $element->maestro;?>" />
            <center><?php echo $element->maestro;?></center>
            </td>
            <td><input type="hidden" name="maes_tel" value="<?php echo $element->telmaestro;?>" />
            <center><?php echo $element->telmaestro;?></center>
            </td>
        </tr>
        <tr>
			<th width="50%"><center>Ayudante</center></th>
            <th width="50%"><center>Teléfono Ayudante</center></th>
        </tr>
        <tr>
			<td><input type="hidden" name="ayudante" value="<?php echo $element->ayudante;?>" />
            <center><?php echo $element->ayudante;?></center></td>
            <td><input type="hidden" name="ayu_tel" value="<?php echo $element->telayudante;?>" />
            <center><?php echo $element->telayudante;?></center></td>
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
    <form action="http://localhost/ccwperu/centro-vida/">
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