<?php
/*Template Name: Form Mod Centro*/
include('../ccwperu/wp-content/themes/simple-life/model/var_form_data.php');
get_header();
?>
<?php
	$formData = new FormData();

	$resultDistrict = $formData->getDistrito();
	$resultCentre = $formData->getCentro();
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
        	<th colspan="3">información centro de vida</th>
        </tr>
        <tr align="justify">
        	<th width="25%">nombre actual</th>
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
        	<th>nombre nuevo</th>
            <td><input type="text" name="nombre" class="to-upper" placeholder="Dejar en blanco si no se desea cambiar"/></td>
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
            <th width="20%">Dirección actual</th>
            <td><input type="text" name="lugar" class="to-upper" disabled/></td>
        </tr>
        <tr align="justify">
            <th width="20%">Dirección nueva</th>
            <td><input type="text" name="lugarN" class="to-upper" placeholder="Dejar en blanco si no se desea cambiar"/></td>
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