<?php
class DatabaseConn{
	
	function generateResult($query){
		global $wpdb;	
		$result = $wpdb->get_results($query);
		
		return $result;
	}	

	function getVar($query){
		global $wpdb;	
		$result = $wpdb->get_var($query);
		
		return $result;
	}

	function insertData($table, $data){
		global $wpdb;
	
		$wpdb->insert($table,$data);	
		
		return $wpdb->last_result;
	}	
	
	function updateData($table, $data, $condition){
		global $wpdb;
	
		$wpdb->update($table, $data, $condition);	
		
		return $result;
	}
}
?>