<?php
/*Template Name: Estadistica*/
include('../ccwperu/wp-content/themes/simple-life/model/var_estadistica.php');
get_header();

	
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<div style="width:inherit" align="center">
<table width="100%" border="1">
	<tr>
    	<th colspan="8"><center>Estadísticas generales</center></th>
    </tr>
    <tr>
	    <td width="10%"></td>
    	<th><center>Niños apadrinados</center></th>
        <th><center>Niños en espera</center></th>
        <th><center>Niños egresados</center></th>
        <th><center>Niños retirados</center></th>
    </tr>
    <tr>
    	<th width="10%"><center>Niños</center></th>
        <td><center><?php echo ($totalMaleA == 0) ? '---':$totalMaleA;?></center></td>
        <td><center><?php echo ($totalMaleE == 0) ? '---':$totalMaleE;?></center></td>
        <td><center><?php echo ($totalMaleEg == 0) ? '---':$totalMaleEg;?></center></td>
        <td><center><?php echo ($totalMaleR == 0) ? '---':$totalMaleR;?></center></td>
    </tr>
    <tr>
    	<th width="10%"><center>Niñas</center></th>
        <td><center><?php echo ($totalFemaleA == 0) ? '---':$totalFemaleA;?></center></td>
        <td><center><?php echo ($totalFemaleE == 0) ? '---':$totalFemaleE;?></center></td>
        <td><center><?php echo ($totalFemaleEg == 0) ? '---':$totalFemaleEg;?></center></td>
        <td><center><?php echo ($totalFemaleR == 0) ? '---':$totalFemaleR;?></center></td>
    </tr>
    <tr>
    	<td width="10%"><strong><center>Total</center></strong></td>
        <th><center><?php echo ($total == 0) ? '---':$total;?></center></th>
        <th><center><?php echo ($espera == 0) ? '---':$espera;?></center></th>
        <th><center><?php echo ($egresado == 0) ? '---':$egresado;?></center></th>
        <th><center><?php echo ($retirado == 0) ? '---':$retirado;;?></center></th>
    </tr>
</table>
</br>
<table width="100%" border="1">
	<tr>
    	<th colspan="8"><center>Niños por edades</center></th>
    </tr>
    <tr>
    	<th rowspan="2" width="10%"><center>Edad</center></th>
        <th colspan="2"><center>Apadrinados</center></th>
        <th colspan="2"><center>En espera</center></th>
    </tr>
    <tr>
        <th><center>Niños</center></th>
        <th><center>Niñas</center></th>
        <th><center>Niños</center></th>
        <th><center>Niñas</center></th>
    </tr>
    <?php 
	for ($i = 0; $i < count($ageCountMaleA); $i++){
		$ageMaleExp = explode ("_",$ageCountMaleA[$i]);
		$ageMaleExpE = explode ("_",$ageCountMaleE[$i]);
		$ageFemaleExp = explode ("_",$ageCountFemaleA[$i]);
		$ageFemaleExpE = explode ("_",$ageCountFemaleE[$i]);
		
		$ageMA = ($ageMaleExp[1] == 0) ? '---':$ageMaleExp[1];
		$ageME = ($ageMaleExpE[1] == 0) ? '---':$ageMaleExpE[1];
		$ageFA = ($ageFemaleExp[1] == 0) ? '---':$ageFemaleExp[1];
		$ageFE = ($ageFemaleExpE[1] == 0) ? '---':$ageFemaleExpE[1];
		
		echo "<tr>";
		echo"	<th><center>".$ageMaleExp[0]."</center></th>
				<td><center>".$ageMA."</center></td>
				<td><center>".$ageFA."</center></td>
				<td><center>".$ageME."</center></td>
				<td><center>".$ageFE."</center></td>";
		echo "</tr>";
	}
	?>
    <tr>
    	<th><center>Total</center></th>
        <th><center><?php echo ($totalMaleA == 0) ? '---':$totalMaleA;?></center></th>
        <th><center><?php echo ($totalFemaleA == 0) ? '---':$totalFemaleA;?></center></th>
        <th><center><?php echo ($totalMaleE == 0) ? '---':$totalMaleE;?></center></th>
        <th><center><?php echo ($totalFemaleE == 0) ? '---':$totalFemaleE;?></center></th>
    </tr>
</table>
<form action="http://localhost/ccwperu/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>