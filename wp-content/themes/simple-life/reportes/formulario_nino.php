<?php
/*Template Name: Formulario Niño*/
include('../ccwperu/wp-content/themes/simple-life/model/db_conn.php');
get_header();

	$queryClass = new DatabaseConn();
	
	$resultStatus = 
	$queryClass->generateResult("SELECT * FROM status");
	
	$resultGrade =
	$queryClass->generateResult("SELECT id_gra id, grado_gra gra FROM grado");
	
	$resultShift =
	$queryClass->generateResult("SELECT id_tur id, turno_tur tur FROM turno");
	
	$resultCivil =
	$queryClass->generateResult("SELECT id_mar id, estado_mar est FROM estado_marital");
	
	$resultRasgo =
	$queryClass->generateResult("SELECT id_pe id, rasgo_pe rasgo FROM personalidad");
	
	$resultDistrict =
	$queryClass->generateResult("SELECT id_dis id, nombre_dis dist FROM distrito");
	
	$resultCentre =
	$queryClass->generateResult("SELECT id_cv id, nombre_cv centro FROM centro_vida");
?>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<form action="http://localhost/ccwperu/agregar-nino/" method="post">
<table id="datos_nino" border="1" bordercolor="#0000FF" width="800px">
    <tr align="center">
    	<th colspan="3">Datos del niño</th>
    </tr>
    <tr align="justify">
    	<th width="25%">Foto</th>
        <td><input type="file" name="foto" accept="image/*"/></td>
    </tr>
	<tr align="justify">
	    <th width="25%">Código</th>
        <td width="45%"><input type="text" size="40" name="codigo"/></td>
    </tr>
    <tr align="justify">
        <th>Nombres</th>
        <td><input type="text" size="40" name="nombre"/></td>
    </tr>
    <tr align="justify">
        <th>Apellidos</th>
        <td><input type="text" size="40" name="apellido"/></td>
    </tr>
    <tr align="justify">
        <th>Sexo</th>
        <td>
        	<select name="sexo">
            	<option value="M">M</option>
                <option value="F">F</option>
            </select>
        </td>
    </tr>
    <tr align="justify">
        <th>Fecha de nacimiento</th>
        <td><input type="date" name="fechanac"/></td>
    </tr>
    <tr align="justify">
        <th>Nombre del padrino</th>
        <td><input type="text" size="40" name="sponsor"/></td>
    </tr>
    <tr align="justify">
        <th>Estado actual</th>
        <td>
        <select name="status">
        <?php 
			foreach($resultStatus as $element){
		?><option value="<?php echo $element->id_sta;?>"><?php echo $element->estado_sta;?></option>
        <?php		
			}?>	
        </select>
        </td>
    </tr>
</table>
</br>
<table id="estudios" border="1" bordercolor="#0000FF" width="800px">
    <tr align="center">
    	<th colspan="6">Datos escolares</th>
    </tr>
    <tr align="justify">
    	<th width="20%">Grado de estudios</th>
        <td colspan="2">
            <select name="grado">
            <?php 
                foreach($resultGrade as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->gra;?></option>
            <?php		
                }?>	
            </select>
        </td>
    </tr>
    <tr align="justify">
        <th width="20%">Turno</th>
        <td colspan="2">
            <select name="turno">
            <?php 
                foreach($resultShift as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->tur;?></option>
            <?php		
                }?>	
            </select>
        </td>
    </tr>
    <tr align="center">
    	<th colspan="6">Escuela técnica</th>
    </tr>
    <tr align="justify">
        <th width="20%">Nombre</th>
        <td colspan="2"><input type="text" size="40" name="tech"/></td>
    </tr>
    <tr align="justify">
        <th width="20%">Fecha ingreso</th>
        <td colspan="2"><input type="date" name="techini"/></td>
    </tr>
    <tr align="justify">
        <th width="20%">Fecha culminación</th>
        <td colspan="2"><input type="date" name="techfin"/></td>
    </tr>
</table>
</br>
<table id="datos_hermano" border="1" bordercolor="#0000FF" width="800px">
	<tr align="center">
    	<th colspan="6">Datos hermanos</th>
    </tr>
	<tr align="justify">
    	<th>Nombres</th>
        <th>Apellidos</th>
        <th width="10%">Grado</th>
        <th width="5%">Edad</th>
        <th width="5%">Sexo</th>
        <th>Observaciones</th>
    </tr>
	<tr align="justify">
        <td><input type="text" name="nomh"/></td>
        <td><input type="text" name="apeh"/></td>
        <td>
	        <select name="gradoh">
            <?php 
                foreach($resultGrade as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->gra;?></option>
            <?php		
                }?>	
            </select>
        </td>
        <td><input type="text" name="edadh"/></td>
        <td>
        <select name="sexoh">
           	<option value="M">M</option>
            <option value="F">F</option>
        </select>
        </td>
        <td><input type="text" name="observh"/></td>
	</tr>
</table>
</br>
<table id="datos_padre" border="1" bordercolor="#0000FF" width="800px">
	<tr align="center">
    	<th colspan="4"><center>Datos padres</center></th>
    </tr>
    <tr align="center">
    	<th colspan="2"><center>Madre</center></th>
        <th colspan="2"><center>Padre</center></th>
    </tr>
    <tr align="justify">
	    <th width="25%">Nombres</th>
        <td width="25%"><input type="text" name="nommad"/></td>
        <th width="25%">Nombres</th>
        <td width="25%"><input type="text" name="nompad"/></td>
    </tr>
    <tr align="justify">
    	<th>Apellidos</th>
        <td><input type="text" name="apemad"/></td>
        <th>Apellidos</th>
        <td><input type="text" name="apepad"/></td>
    </tr>
    <tr align="justify">
        <th>Ocupación</th>
        <td><input type="text" name="ocumad"/></td>
        <th>Ocupación</th>
        <td><input type="text" name="ocupad"/></td>
    </tr>
    <tr align="justify">
	    <th>Teléfono</th>
        <td><input type="text" name="telmad"/></td>
        <th>Teléfono</th>
        <td><input type="text" name="telpad"/></td>
    </tr>
    <tr align="justify">
	    <th>Fecha nacimiento</th>
        <td><input type="date" name="fechamad"/></td>
        <th>Fecha nacimiento</th>
        <td><input type="date" name="fechapad"/></td>
    </tr>
    <tr align="justify">
    	<th>Estado civil</th>
        <td>
        	<select name="civilmad">
            <?php 
                foreach($resultCivil as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->est;?></option>
            <?php		
                }?>	
            </select>
        </td>
        <th>Estado civil</th>
        <td>
	        <select name="civilpad">
            <?php 
                foreach($resultCivil as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->est;?></option>
            <?php		
                }?>	
            </select>
        </td>
    </tr>
    <tr align="justify">
	    <th>¿Vive con la familia?</th>
        <td>
        	<select name="vivemad">
            	<option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </td>
        <th>¿Vive con la familia?</th>
        <td>
	        <select name="vivemad">
            	<option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </td>
    </tr>
    <tr align="justify">
        <th>Si la respuesta es no, ¿por qué?</th>
        <td><input type="text" name="razonmad"/></td>
        <th>Si la respuesta es no, ¿por qué?</th>
        <td><input type="text" name="razonpad"/></td>
    </tr>
</table>
</br>
<table id="datos_adicional" border="1" bordercolor="#0000FF" width="800px">
	<tr align="center">
    	<th colspan="3">Información adicional</th>
    </tr>
	<tr align="justify">
	    <th width="20%">(Familia)</th>
    	<th width="35%">Si no vive con los padres, ¿con quién vive?</th>
        <td><input type="text" name="familiar"/></td>
    </tr>
    <tr align="justify">
    	<th width="20%">(Curso favorito)</th>
    	<th width="35%">Curso favorito en su lugar de estudios</th>
        <td><input type="text" name="curso"/></td>
    </tr>
        <tr align="justify">
        <th width="20%">(Tareas)</th>
    	<th width="35%">¿En qué forma ayuda el niño a su familia?</th>
        <td><input type="text" name="tareas"/></td>
    </tr>
    <tr align="justify">
        <th width="20%">(Pasatiempo)</th>
    	<th width="35%">¿Cuál es su juego o actividad favorita?</th>
        <td><input type="text" name="hobby"/></td>
    </tr>
    <tr align="justify">
        <th width="20%">(Sueños futuros)</th>
    	<th width="35%">¿Qué quiere ser cuando sea grande?</th>
        <td><input type="text" name="sueno"/></td>
    </tr>
    <tr align="justify">
        <th width="20%">(Comida común)</th>
    	<th width="35%">¿Qué come usualmente el niño como alimento principal?</th>
        <td><input type="text" name="comida"/></td>
    </tr>
        <tr align="left">
        <th width="20%">(Rasgos de personalidad)</th>
    	<td colspan="2">
	        <select name="rasgo1">
            <?php 
                foreach($resultRasgo as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->rasgo;?></option>
            <?php		
                }?>	
            </select>
            <select name="rasgo2">
            <?php 
                foreach($resultRasgo as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->rasgo;?></option>
            <?php		
                }?>	
            </select>
            <select name="rasgo3">
            <?php 
                foreach($resultRasgo as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo $element->rasgo;?></option>
            <?php		
                }?>	
            </select>
        </td>
    </tr>
    <tr>
        <tr align="left">
        <th width="20%">Historia del niño</th>
    	<td colspan="2"><input type="text" name="historia" size="100"/></td>
    </tr>
</table>
</br>
<table id="datos_aceptacion" border="1" bordercolor="#0000FF" width="800px">
	<tr align="center">
    	<th colspan="2">¿Ha aceptado el niño a Cristo como su salvador?</th>
    </tr>
    <tr align="justify">
        <th width="20%">Afirmación</th>
        <td>
	        <select name="acept">
            	<option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </td>
    </tr>
    <tr align="justify">
        <th width="20%">Fecha de aceptación</th>
        <td><input type="date" name="aceptfecha"/></td>
    </tr>
    <tr align="justify">
        <th width="20%">Observación</th>
        <td><input type="text" name="aceptobserv" size="100"/></td>
    </tr>
</table>	
</br>
<table id="datos_direccion" border="1" bordercolor="#0000FF" width="800px">
	<tr align="center">
    	<th colspan="2">Información domicilio</th>
    </tr>
	<tr align="justify">
        <th width="20%">Ciudad</th>
        <td><input type="text" name="prov" value="Lima" disabled></td>
    </tr>
    <tr align="justify">
        <th width="20%">Distrito</th>
        <td>
        <select name="dist">
        <?php 
			foreach($resultDistrict as $element){
		?><option value="<?php echo $element->id;?>"><?php echo $element->dist;?></option>
        <?php		
			}?>	
        </select>
        </td>
    </tr>
    <tr align="justify">
        <th width="20%">Dirección domicilio</th>
        <td><input type="text" name="lugar" size="100"/></td>
    </tr>
</table>
<br>
<table id="datos_centro" border="1" bordercolor="#0000FF" width="800px">
	<tr align="center">
    	<th colspan="2">Información Centro de Vida</th>
    </tr>
	<tr align="justify">
        <th width="30%">Nombre Centro de Vida</th>
        <td>
		<select name="centro">
        <?php 
			foreach($resultCentre as $element){
		?><option value="<?php echo $element->id;?>"><?php echo $element->centro;?></option>
        <?php		
			}?>	
        </select>
        </td>
    </tr>
    <tr align="justify">
        <th width="30%">Nombre de quien inscribe</th>
        <td><input type="text" name="inscrito"/></td>
    </tr>
	<tr align="justify">
        <th width="30%">Fecha de inscripción</th>
        <td><input type="date" name="fechacentro"/></td>
    </tr>
</table>
	
    <input type="submit" ="middle" value="Crear entrada"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>