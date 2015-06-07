<?php
	$serverName="localhost";
	$username="root";
	$password="";
	$conn=mysqli_connect($serverName,$username,$password) or die("Can't connect to db");
	$dbSelect=mysqli_select_db($conn,'uidai');
	if(!$dbSelect)
	{
		$sql='Create Database uidai';
		$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		mysqli_select_db($conn,'uidai');		
	}
	//$sql="Create Database uidai if not exist";
?>