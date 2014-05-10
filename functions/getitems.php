<?php 
	
	require_once( '../includes/includes.php' );

	$query = "SELECT * FROM `assortment`";
	$queryParams->multi = TRUE;
	$data = MysqlQuery( $query, $queryParams );

	echo json_encode($data);
	
?>