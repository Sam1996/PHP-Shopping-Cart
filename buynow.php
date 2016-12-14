<?php
	include("includes/db/db_config.php");
	include("header.php");
	session_start();

	if(isset($_GET['action']) && $_GET['action']=="buy"){

		$id=$_GET['id']; 

	}

	echo $id;

?>