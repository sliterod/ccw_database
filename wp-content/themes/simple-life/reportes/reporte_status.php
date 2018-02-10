<?php
/*Template Name: Reporte Status*/
get_header();
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<?php
	$status = $_POST[status];
	$offset = $_POST[offset];
	$limit = 25;
	
	$query = "select estado_sta estado from status where id_sta =".$status;
	$queryCount = "select count(id_nin) cantidad from nino where fk_status =".$status;
		
	$result = $wpdb->get_results($query);
	foreach ($result as $element){
		$statusName = $element->estado;
	}
	
	$result = $wpdb->get_results($queryCount);
	foreach ($result as $element){
		$count = $element->cantidad;
	}
	
	$pages = ceil($count/$limit);
	$currentPage = ($offset/$limit)+1;
		
	$queryChild = 
	"SELECT concat (nombre_nin,' ',apellido_nin) nom, 
	id_nin id FROM nino 
	where fk_status =".$status."
	order by nom asc
	limit ".$limit
	." offset ".$offset;

	
	$resultChild = $wpdb->get_results($queryChild);
?>
<table width="800px">
	<tr>
    	<td width="50%" align="center"><strong>Estado: <?php echo $statusName;?></strong></td>
        <td align="center"><strong>Cantidad de niños(as): <?php echo $count;?></strong></td>
    </tr>
    <tr>
    	<th colspan="2"></br></th>
    </tr>
    <?php
	if (count($resultChild) > 0){
		foreach ($resultChild as $element){
			$id = $element->id;
			$nom = $element->nom;
	?>
    <tr align="justify">
    	<td colspan="2"><a href="http://localhost/ccwperu/ficha-simple-nino/?id=<?php echo $id?>">
        <?php echo $nom?>
        </a>
        </td>
    </tr>
    <?php }?>
    <tr>
    	<th colspan="2"><center>Página <?php echo $currentPage.' / '.$pages;?></center></th>
    </tr>
    <?php 
	}
	else{
	?>
    <tr align="justify">
    	<td colspan="2">Disculpe, no se han encontrado resultados que coincidan con su criterio de búsqueda.</td>
    </tr>
    <?php	
	}
	?>
</table>
<form action="http://localhost/ccwperu/reporte-status/" method="post"><center>
<?php 
if($pages > 1){
	for ($i = 0; $i < $pages; $i++){
		$_page = $i+1;
		$_offset = $i * $limit;
?>	
	<button type="submit" formmethod="post" value="<?php echo $_offset;?>" name="offset">
    <?php echo $_page;?>
    </button>
<?php 
	}
}
?>
<input type="hidden" value="<?php echo $status;?>" name="status"/>
</center>
</form>
<form action="" method="post">
<input type="submit" value="Generar reporte">
</form>
</br>
<form action="http://localhost/ccwperu/busqueda-status/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>