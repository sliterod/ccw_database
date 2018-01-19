<?php
class DatabaseConn{
	
	function generateResult($query){
		global $wpdb;	
		$result = $wpdb->get_results($query);
		
		return $result;
	}	
	
}
?>