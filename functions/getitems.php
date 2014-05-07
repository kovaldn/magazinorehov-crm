<?php 

	// error_reporting (E_ALL ^ E_NOTICE);

	// echo $_POST['getItems'];

	// if($_POST['getItems'])
	// {
		
		require_once( '../includes/includes.php' );

		$query = "SELECT * FROM `assortment`";
		$queryParams->multi = TRUE;
		$data = MysqlQuery( $query, $queryParams );

		echo json_encode($data);

	// }
	
?>