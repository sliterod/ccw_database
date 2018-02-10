<?php
/*Template Name: Formato*/
get_header();

$url = "../ccwperu/formatos";
$directories = array_filter(glob($url.'/*'), 'is_dir');

$files = array_slice(scandir($url),2);

?>
<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<div style="width:33%">
<table>
	<tr>
    	<th>Formatos</th>
    </tr>
<?php 
	for ($i = 0; $i < count($files); $i++){
		
		$fileName = utf8_encode($files[$i]);
?>
	<tr>
    	<td><a href="<?php echo '../formatos/'.$fileName;?>" download><?php echo $fileName;?></a></td>
    </tr>
<?php
	}	
?>
</table>
</div>
    <form action="http://localhost/ccwperu/">
    <input type="submit" align="middle" value="Regresar"/>
    </form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>