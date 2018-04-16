<?php
/*Template Name: Lista General*/
include('../ccwperu/wp-content/themes/simple-life/model/var_lista_general.php');
get_header();
?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
    
<table width="100%" border="1">
    <tr>
    	<th>Código</th>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Centro</th>
    </tr>
<?php
	foreach ($children as $element){	
?>
    <tr>
        <td>
            <?php echo mb_strtoupper($element->cod);?>
        </td>
        <td>
            <?php 
                echo $count.". ".mb_strtoupper($element->nom);
                $count = $count + 1;
            ?>
        </td>
        <td>
            <?php echo mb_strtoupper($element->sta);?>
        </td>
        <td>
            <?php echo mb_strtoupper($element->centro);?>
        </td>
    </tr>
<?php	
	}
?>
	
</table>
    
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>