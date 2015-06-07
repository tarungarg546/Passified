<?php 
	include 'testmysql.php';
	session_start();
	if(isset($_SESSION['name']))
	{
		unset($_SESSION['name']);
		header('location:index.php');
		exit();
	}
	else if(isset($_SESSION['busName']))
	{
		unset($_SESSION['busName']);
		header('location:index.php');
		exit();
	}
?>