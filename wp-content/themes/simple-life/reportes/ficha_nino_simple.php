<?php
/*Template Name: Ficha Simple*/
?>

<?php get_header();?>
<?php
	//database data and variables
	
global $wpdb;
$id = $_GET[id];

$query =
"select
(select nombre_cv from centro_vida where id_cv = (select fk_centro from historial_nino where fk_nino = id_nin)) centro,
(select nombre_spo from sponsor where id_spo = (select fk_sponsor from historial_nino where fk_nino = id_nin)) padrino,
timestampdiff (year, fechanac_nin, now()) as edad,
(select concat(url_foto,nombre_foto) from foto where tipo_foto ='Código' and fk_nino = id_nin) foto,
(select estado_sta from status where id_sta = nino.fk_status) estado,
date_format(fechanac_nin,'%d-%m-%Y') nac,
codigo_nin cod, 
nombre_nin nom, 
apellido_nin ape, 
sexo_nin sexo
from nino
where id_nin = ".$id;

	$result = $wpdb->get_results($query);

	foreach ($result as $element){
		$nombre = $element->nom;
		$apellido = $element->ape;
		$sexo = $element->sexo;
		$fecha = $element->nac;
		$edad = $element->edad;
		$centro = $element->centro;
		$sponsor = $element->padrino;
		$codigo = $element->cod;
		$status = $element->estado;
		$foto = $element->foto;
	}
	
	$header = 'Código'.'_'.'Nombres'.'_'.'Apellidos'.'_'
	.'Sexo'.'_'.'Fecha de nacimiento'.'_'.'Edad actual'
	.'_'.'Nombre del Padrino'.'_'.'Estado actual'
	.'_'.'Centro de vida';
	
	$data = $codigo.'_'.$nombre.'_'.$apellido.'_'.$sexo.'_'.$fecha.'_'.$edad.'_'.$sponsor
	.'_'.$status.'_'.$centro;
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<form action="http://localhost/ccwperu/pdf-nino-simple/" method="post">
<table id="datos_nino" border="1" width="800px">
    <tr align="center">
    	<th colspan="3">Datos del niño</th>
    </tr>
    <tr align="center">
    	<th width="30%" rowspan="10">
        <img name="pic" src="<?php echo $foto;?>" width="200" height="200" align="middle"/>
        </th>
    </tr>
	<tr align="justify">
	    <th width="25%">Código</th>
        <td width="45%"><?php echo $codigo;?></td>
    </tr>
    <tr align="justify">
        <th>Nombres</th>
        <td><?php echo $nombre;?></td>
    </tr>
    <tr align="justify">
        <th>Apellidos</th>
        <td><?php echo $apellido;?></td>
    </tr>
    <tr align="justify">
        <th>Sexo</th>
        <td><?php echo $sexo;?></td>
    </tr>
    <tr align="justify">
        <th>Fecha de nacimiento</th>
        <td><?php echo $fecha;?></td>
    </tr>
        <tr align="justify">
        <th>Edad actual</th>
		<td><?php echo $edad;?></td>
    </tr>
    <tr align="justify">
        <th>Nombre del padrino</th>
        <td><?php echo $sponsor;?></td>
    </tr>
    <tr align="justify">
        <th>Estado actual</th>
        <td><?php echo $status;?></td>
    </tr>
    <tr align="justify">
        <th>Centro de vida</th>
        <td><?php echo $centro;?></td>
    </tr>
</table>
<input type="hidden" name="head" value="<?php echo $header?>" />
<input type="hidden" name="data" value="<?php echo $data?>" />
<input type="hidden" name="url" value="<?php echo $foto?>" />
<input type="submit" align="middle" value="Generar reporte"/>
</form>
</br>
<form action="http://localhost/ccwperu/ficha-nino/?id=<?php echo $id;?>" method="post">
<input type="submit" ="middle" value="Ampliar ficha"/>
</form>
</br>
<form action="http://localhost/ccwperu/busquedas/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->