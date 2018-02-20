<?php

include('../ccwperu/wp-content/themes/simple-life/model/var_form_data.php');
get_header();
?>

<?php
	$queryClass = new FormData();
	
	$resultStatus = $queryClass->getStatus();
	$resultGrade = $queryClass->getGrado();
	$resultShift = $queryClass->getTurno();
	$resultCivil = $queryClass->getMarital();
	$resultRasgo = $queryClass->getPersonalidad();
	$resultDistrict = $queryClass->getDistrito();
	$resultCentre = $queryClass->getCentro();
	
	for($i = 0; $i < count($resultGrade); $i++){
		$gradeArray[$i] = $resultGrade[$i]->id."_".strtoupper($resultGrade[$i]->gra);
	}
	
?><head>
<link rel="stylesheet" type="text/css" href="/ccwperu/wp-content/themes/simple-life/css/form-nino.css">
<script src="/ccwperu/wp-content/themes/simple-life/js/form-validations.js"></script>
<script>
	var grades = <?php echo json_encode($gradeArray);?>;
</script>
</head>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<div id="basic-data" class="row" style="width:inherit">
	<div class="column">
    <table id="datos_nino" border="1">
        <tr align="center">
            <th colspan="3">DATOS DEL NIÑO</th>
        </tr>   
        <tr align="justify">
            <th width="25%">Nombres</th>
            <td><input type="text" id="nombreA" class="to-upper"/></td>
            <td><input type="text" name="nombreB" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="25%">APELLIDOS</th>
            <td><input type="text" name="apellidoA" class="to-upper"/></td>
            <td><input type="text" name="apellidoB" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="25%">DNI</th>
            <td colspan="2"><input type="text" name="dni" onkeypress="javascript:return CheckNumberInput(event)"/></td>
        </tr>
        <tr align="justify">
            <th width="25%">SEXO</th>
            <td colspan="2">
            <select name="sexo">
            	<option value="M">M</option>
                <option value="F">F</option>
            </select>
            </td>
        </tr>
        <tr align="justify">
            <th width="25%">CÓDIGO</th>
            <td colspan="2">
            <input type="hidden" name="codigoA" value="PO1000"/>
            <input type="text" name="codigoB" maxlength="10" onkeypress="javascript:return CheckNumberInput(event)" placeholder="Ejm. 21334"/>
            </td>
        </tr>
        <tr align="justify">
            <th>F. NACIMIENTO</th>
            <td colspan="2"><input type="date" name="fechanac"/></td>
    	</tr>
        <tr align="justify">
            <th width="25%">FOTO</th>
            <td colspan="2"><input type="file" name="foto" accept="image/*"/></td>
        </tr>
	</table>
    </div>
	<div class="column">
	<table id="datos_nino" border="1">
        <tr align="center">
            <th colspan="3">datos padrinazgo</th>
        </tr>        
        <tr align="justify">
            <th>Estado actual</th>
            <td>
            <select name="status">
            <?php 
                foreach($resultStatus as $element){
            ?><option value="<?php echo $element->id_sta;?>">
			<?php echo strtoupper($element->estado_sta);?></option>
            <?php		
                }?>	
            </select>
            </td>
    	</tr>
        <tr align="justify">
            <th width="25%">sponsor</th>
            <td><input type="text" name="sponsor" class="to-upper"/></td>
        </tr>
	</table>
    <p></p>
    <table id="datos-centro" border="1">
	    <tr align="center">
            <th colspan="3">datos centro de vida</th>
        </tr>
    	<tr align="justify">
	        <th width="25%">centro de vida</th>
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
            <th width="25%">inscribe:</th>
            <td><input type="text" name="inscrito" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="25%">F. inscripción</th>
            <td><input type="date" name="fechacentro"/></td>
        </tr>
    </table>
    </div>
</div>
<div id="" class="row" style="width:inherit">
	<div class="column">
    <table id="datos-escolares" border="1">
        <tr align="center">
            <th colspan="6">Datos escolares</th>
        </tr>
        <tr align="justify">
            <th width="25%">Grado</th>
            <td colspan="2">
                <select name="grado">
                <?php 
                    foreach($resultGrade as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->gra);?></option>
                <?php		
                    }?>	
                </select>
            </td>
        </tr>
        <tr align="justify">
            <th width="25%">Turno</th>
            <td colspan="2">
                <select name="turno">
                <?php 
                    foreach($resultShift as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->tur);?></option>
                <?php		
                    }?>	
                </select>
            </td>
        </tr>
    </table>
    </div>
    <div class="column">
    <table id="datos-tecnica" border="1">
        <tr align="center">
            <th colspan="4">datos escuela técnica</th>
        </tr>
        <tr align="justify">
            <th width="25%">Nombre</th>
            <td colspan="3"><input type="text" name="tech" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="25%">f. ingreso</th>
            <td><input type="date" name="techini"/></td>
            <th width="25%">f. culminación</th>
            <td><input type="date" name="techfin"/></td>
        </tr>
    </table>
    </div>
</div>
<div id="" class="row" style="width:inherit">
	<div class="full-column">
    <table id="tabla-hermano" border="1">
        <tr align="center">
        	<th colspan="6">datos hermanos</th>
        </tr>
        <tr align="justify">
        	<th width="30%">nombres</th>
            <th width="30%">apellidos</th>
           	<th width="5%">edad</th>
            <th width="5%">sexo</th>
            <th width="10%">grado</th>
            <th width="20%">observaciones</th>
        </tr>
    </table>
    <button onclick="RemoveSiblingRow()">-</button>
    <button onclick="AddSiblingRow(grades)">+</button>
    </div>
</div>
<div id="" class="row" style="width:inherit">
	<div class="column">
    <table id="tabla-madre" border="1">
        <tr align="center">
            <th colspan="3">datos madre</th>
        </tr>
        <tr align="justify">
            <th width="25%">Nombres</th>
            <td width="25%"><input type="text" name="nommad" class="to-upper"/></td>
            <td width="25%"><input type="text" name="nommad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>Apellidos</th>
            <td><input type="text" name="apemad" class="to-upper"/></td>
            <td><input type="text" name="apemad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>Ocupación</th>
            <td colspan="2"><input type="text" name="ocumad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>religión</th>
            <td colspan="2"><input type="text" name="religionmad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>Teléfono (s)</th>
            <td><input type="text" name="telmad" onkeypress="javascript:return CheckNumberInput(event)"/></td>
            <td><input type="text" name="telmad" onkeypress="javascript:return CheckNumberInput(event)"/></td>
        </tr>
        <tr align="justify">
            <th>Fecha nacimiento</th>
            <td colspan="2"><input type="date" name="fechamad"/></td>
        </tr>
        <tr align="justify">
            <th>Estado civil</th>
            <td colspan="2">
                <select name="civilmad">
                <?php 
                    foreach($resultCivil as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->est);?></option>
                <?php		
                    }?>	
                </select>
            </td>
        </tr>
        <tr align="justify">
            <th>¿Vive con la familia?</th>
            <td colspan="2">
                <select name="vivemad" onchange="ChangeParentRow(this.value,this.name,'tabla-madre')">
                    <option value="SI" selected="selected">SI</option>
                    <option value="NO">NO</option>
                </select>
            </td>
        </tr>
        <tr align="justify">
            <th>¿qué hace en un día normal?</th>
            <td colspan="2"><input type="text" name="razonmad" class="to-upper"/></td>
        </tr>
    </table>
	</div>
    <div class="column">
    <table id="tabla-padre" border="1">
        <tr align="center">
            <th colspan="3">datos padre</th>
        </tr>
        <tr align="justify">
            <th width="25%">Nombres</th>
            <td width="25%"><input type="text" name="nompad" class="to-upper"/></td>
            <td width="25%"><input type="text" name="nompad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>Apellidos</th>
            <td><input type="text" name="apepad" class="to-upper"/></td>
            <td><input type="text" name="apepad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>Ocupación</th>
            <td colspan="2"><input type="text" name="ocupad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>religión</th>
            <td colspan="2"><input type="text" name="religionpad" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th>Teléfono (s)</th>
            <td><input type="text" name="telpad" onkeypress="javascript:return CheckNumberInput(event)"/></td>
            <td><input type="text" name="telpad" onkeypress="javascript:return CheckNumberInput(event)"/></td>
        </tr>
        <tr align="justify">
            <th>Fecha nacimiento</th>
            <td colspan="2"><input type="date" name="fechapad"/></td>
        </tr>
        <tr align="justify">
            <th>Estado civil</th>
            <td colspan="2">
                <select name="civilpad">
                <?php 
                    foreach($resultCivil as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->est);?></option>
                <?php		
                    }?>	
                </select>
            </td>
        </tr>
        <tr align="justify">
            <th>¿Vive con la familia?</th>
            <td colspan="2">
                <select name="vivepad" onchange="ChangeParentRow(this.value,this.name,'tabla-padre')">
                    <option value="SI" selected="selected">SI</option>
                    <option value="NO">NO</option>
                </select>
            </td>
        </tr>
        <tr align="justify">
            <th>¿qué hace en un día normal?</th>
            <td colspan="2"><input type="text" name="razonpad" class="to-upper"/></td>
        </tr>
    </table>
	</div>
</div>
<div id="" class="row" style="width:inherit">
	<div class="column">
    <table id="tabla-info" border="1">
	    <tr align="center">
            <th colspan="3">información adicional</th>
        </tr>
        <tr align="justify">
            <th width="35%">Si no vive con los padres, ¿con quién vive?</th>
            <td><input type="text" name="familiar" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="35%">Curso favorito en su lugar de estudios</th>
            <td><input type="radio" name="cursoRadio" value="fav" />SOLO AÑO
            	<input type="text" name="curso" class="to-upper"/>
                <input type="radio" name="cursoRadio" value="fav" />SOLO AÑO
                <input type="text" name="curso" class="to-upper"/>
            </td>
        </tr>
            <tr align="justify">
            <th width="35%">¿En qué forma ayuda el niño a su familia?</th>
            <td><input type="text" name="tareas" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="35%">¿Cuál es su juego o actividad favorita?</th>
            <td><input type="text" name="hobby" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="35%">¿Qué quiere ser cuando sea grande?</th>
            <td><input type="text" name="sueno" class="to-upper"/></td>
        </tr>
        <tr align="justify">
            <th width="35%">¿Alimento principal?</th>
            <td><input type="text" name="comida" class="to-upper"/></td>
        </tr>
        <tr align="left">
            <th width="20%">Rasgos de personalidad</th>
            <td colspan="2">
                <select name="rasgo1">
                <?php 
                    foreach($resultRasgo as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->rasgo);?></option>
                <?php		
                    }?>	
                </select>
                <select name="rasgo2">
                <?php 
                    foreach($resultRasgo as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->rasgo);?></option>
                <?php		
                    }?>	
                </select>
                <select name="rasgo3">
                <?php 
                    foreach($resultRasgo as $element){
                ?><option value="<?php echo $element->id;?>"><?php echo strtoupper($element->rasgo);?></option>
                <?php		
                    }?>	
                </select>
            </td>
        </tr>
        <tr align="left">
            <th width="20%">Historia del niño</th>
            <td colspan="2"><input type="text" name="historia" class="to-upper" maxlength="255"/></td>
        </tr>
	</table>
    </div>
    <div class="column">
    <table id="tabla-aceptacion" border="1">
	    <tr align="center">
            <th colspan="3">¿Ha aceptado el niño a Cristo como su salvador?</th>
        </tr>
        <tr align="justify">
            <th width="20%">Afirmación</th>
            <td>
                <select name="acept">
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </td>
        </tr>
        <tr align="justify">
            <th width="20%">Fecha de aceptación</th>
            <td><input type="date" name="aceptfecha"/></td>
        </tr>
        <tr align="justify">
            <th width="20%">Observación</th>
            <td><input type="text" name="aceptobserv" class="to-upper"/></td>
        </tr>
    </table>
    </div>
    <div class="column">
    <table id="datos_direccion" border="1"width="800px">
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
            <td><input type="text" name="lugar" class="to-upper"/></td>
        </tr>
    </table>
    </div>
</div>


</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>