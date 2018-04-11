<?php
/*Template Name: Miscelaneos*/
get_header();

$url = "../ccwperu/archivos";
$dirs = array_filter(glob($url.'/*'), 'is_dir');
?><head>
<link rel="stylesheet" type="text/css" href="/ccwperu/wp-content/themes/simple-life/css/general-style.css">
</head>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
<main id="main" class="site-main" role="main">
<div id="basic-data" class="row" style="width:inherit">
    <div class="column">
    <table>
	<tr>
    	<th bgcolor="#0b789c">
        <center>
        <font color="#FFFFFF">MISCELANEOS</font>
        </center>
        </th>
    </tr>
<?php	
        $dirFiles = array_slice(scandir($url),2);
    
        for ($i = 0; $i < count($dirFiles); $i++){
            $fileName = urldecode($dirFiles[$i]);
            $link = "../".$url."/".$dirName."/".$fileName;
?>
    <tr>
    	<td><a href="<?php echo $link;?>" download><?php echo $fileName;?></a></td>
    </tr>
<?php 
        }
?>
    </table>
    </div>
</div>
<form action="http://192.168.1.8/ccwperu/">
<input type="submit" align="middle" value="Regresar"/>
</form>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>