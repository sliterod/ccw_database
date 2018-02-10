<?php
include('db_conn.php');
class Estadistica{
		
		function queryCountAge($sex, $status, $age){
			$query = "
			select count(id_nin)
			from nino
			where fk_status = ".$status." and sexo_nin = '".$sex."'
			and timestampdiff (year, fechanac_nin, now()) = ".$age."";
			
			return $query;
		}
		
		function queryCountTotalSex($sex, $status){
			$query = "
			select count(id_nin)
			from nino 
			where fk_status = ".$status." and sexo_nin = '".$sex."';";
			
			return $query;
		}
		
		function queryCountTotal($status){
			$query = "
			select count(id_nin)
			from nino 
			where fk_status = ".$status."";
			
			return $query;
		}
		
		function countAge($dbConn, $sex, $status){
			
			$ages = array(5,6,7,8,9,10,11,12,13,14,15,16,17);
			$ageCount = array();
			$index = 0;
			
			for ($i = 0; $i < count($ages); $i++){
				$result = $dbConn->getVar($this->queryCountAge($sex,$status,$ages[$i]),"%d");	
				$ageCount[$i] = $ages[$i]."_".$result;			
			}	
			
			return $ageCount;
		}
}

	$dbConn = new DatabaseConn();
	$stats = new Estadistica();
		
	//$resultAgeM = $dbConn->generateResult($stats->queryCountAge("M",1));
	$ageCountMaleA = $stats->countAge($dbConn,"M",1);
	$ageCountFemaleA = $stats->countAge($dbConn,"F",1);
	$ageCountMaleE = $stats->countAge($dbConn,"M",2);
	$ageCountFemaleE = $stats->countAge($dbConn,"F",2);
	
	$totalMaleA = $dbConn->getVar($stats->queryCountTotalSex("M",1),"%d");
	$totalMaleE = $dbConn->getVar($stats->queryCountTotalSex("M",2),"%d");
	$totalMaleR = $dbConn->getVar($stats->queryCountTotalSex("M",3),"%d");
	$totalMaleEg = $dbConn->getVar($stats->queryCountTotalSex("M",4),"%d");

	$totalFemaleA = $dbConn->getVar($stats->queryCountTotalSex("F",1),"%d");	
	$totalFemaleE = $dbConn->getVar($stats->queryCountTotalSex("F",2),"%d");
	$totalFemaleR = $dbConn->getVar($stats->queryCountTotalSex("F",3),"%d");	
	$totalFemaleEg = $dbConn->getVar($stats->queryCountTotalSex("F",4),"%d");
	
	$total = $dbConn->getVar($stats->queryCountTotal(1),"%d");
	$espera = $dbConn->getVar($stats->queryCountTotal(2),"%d");
	$retirado = $dbConn->getVar($stats->queryCountTotal(3),"%d");
	$egresado = $dbConn->getVar($stats->queryCountTotal(4),"%d");
?>