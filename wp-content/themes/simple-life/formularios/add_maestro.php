<?php
/*Template Name: Form Add Maestro*/
include('../ccwperu/wp-content/themes/simple-life/model/var_form_data.php');
get_header();
?>
<?php
	$formData = new FormData();

	$resultDistrict = $formData->getDistrito();
	$resultCentre = $formData->getCentro();
	$resultRol = $formData->getRolMaestro();
	
?><head>
<link rel="stylesheet" type="text/css" href="/ccwperu/wp-content/themes/simple-life/css/form.css">
<script src="/ccwperu/wp-content/themes/simple-life/js/form-validations.js"></script>
</head>


<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<form action="" method="post" name="formmaestro">
<div id="basic-data" class="row" style="width:inherit">
	<div class="column">
    <table id="" border="1">
    	<tr>
        	<th colspan="3">información maestra(o)</th>
        </tr>
        <tr align="justify">
        	<th width="25%">centro de vida</th>
            <td colspan="2"><select name="centro">
            <?php 
                foreach($resultCentre as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->centro);?></option>
            <?php		
                }?>	
            </select>
            </td>
        </tr>
        <tr align="justify">
        	<th>nombres</th>
            <td><input type="text" name="nombreA" class="to-upper"/></td>
            <td><input type="text" name="nombreB" class="to-upper"/></td>
        </tr>
        <tr align="justify">
        	<th>apellidos</th>
            <td><input type="text" name="apellidoA" class="to-upper"/></td>
            <td><input type="text" name="apellidoB" class="to-upper"/></td>
        </tr>
        <tr align="justify">
        	<th>f. nacimiento</th>
            <td colspan="2"><input type="date" name="fechanac"/></td>
        </tr>
        <tr align="justify">
            <th>Teléfono (s)</th>
            <td><input type="text" name="telmad" onkeypress="javascript:return CheckNumberInput(event)"/></td>
            <td><input type="text" name="telmad" onkeypress="javascript:return CheckNumberInput(event)"/></td>
        </tr>
        <tr align="justify">
        	<th>Correo electrónico</th>
            <td colspan="2"><input type="email" name="correo" /></td>
        </tr>
        <tr align="justify">
        	<th>observaciones</th>
            <td colspan="2"><input type="text" name="observ" maxlength="255"/></td>
        </tr>
        <tr align="justify">
        	<th>rol asignado</th>
            <td colspan="2"><select name="rol">
            <?php 
                foreach($resultRol as $element){
            ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->nombre);?></option>
            <?php		
                }?>	
            </select>
            </td>
        </tr>
    </table>
	</div>
</div>
<div id="basic-data" class="row" style="width:inherit">
	<div class="column">
    <table id="" border="1">
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
            ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->dist);?></option>
            <?php		
                }?>	
            </select>
            </td>
        </tr>
        <tr align="justify">
            <th width="20%">Dirección domicilio</th>
            <td><input type="text" name="lugar" class="to-upper"/></td>
        </tr>
    </table>
    </div>
</div>
<div id="basic-data" class="row" style="width:inherit">
	<div class="column">
    <table id="tabla-conversion" border="1">
    	<tr>
        	<th colspan="2">Datos conversión</th>
        </tr>
        <tr align="justify">
        	<th width="25%">Información</th>
            <td>
            <input type="radio" name="converRadio" onclick="ChangeConvertionRow(this);" value="full" checked="checked"/>FECHA COMPLETA
            <input type="radio" name="converRadio" onclick="ChangeConvertionRow(this);" value="year" />SOLO AÑO
            </td>
        </tr>
        <tr align="justify">
        	<th width="25%">f. conversión</th>
            <td><input type='date' name='conver'/></td>
        </tr>
    </table>
    </div>
</div>
<input type="submit" align="middle" value="Crear entrada"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>