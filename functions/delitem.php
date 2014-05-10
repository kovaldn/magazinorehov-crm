<?php
	
	error_reporting (E_ALL ^ E_NOTICE);

	$post = (!empty($_POST)) ? true : false;

	if($post)
	{		
		require_once( '../includes/includes.php' );
		$id = stripslashes($_POST['id']);
		$query = "DELETE FROM `assortment` WHERE `id` = '$id'";
		$queryParams->multi = TRUE;
		MysqlQuery( $query, $queryParams );
	}

?>