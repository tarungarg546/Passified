<?php
	date_default_timezone_set("Asia/Kolkata");
	include 'testmysql.php';
	$uidai=$_GET['uidai'];
	echo $uidai;
	$sql=mysqli_query($conn,"SELECT * from shareddb WHERE UIDAI='$uidai'") or die(mysqli_error($conn));
	$row=mysqli_fetch_array($sql);
	$yop=$row['yop'];
	$clg=$row['College'];
	if(date('Y')>=$yop)//galat
	{
		echo "<script>";
		echo "alert('Applicant is not studying in this institution from ".$yop." SO reject this application!')";
		echo "window.open('transport_index.php',_self)";
		echo "</script>";
		//header('location:transport_index.php');
	}
	else {
		echo "<script>";
		echo "alert('Application is genuine')";
		//echo "window.open('loadProfile.php?uidai=".$uidai."clg=".$clg."',_self)";
		echo "</script>";	
	}
?>