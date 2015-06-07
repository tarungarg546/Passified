<?php
	date_default_timezone_set("Asia/Kolkata");
	include 'testmysql.php';
	$uidai=$_GET['uidai'];
	$sql=mysqli_query($conn,"SELECT * from transportdb where UIDAI='$uidai'") or die(mysqli_error($conn));
	$row=mysqli_fetch_array($sql);
	$sp=$row['StartingDate'];
	$se=$row['EndingDate'];

	if(date('Y-m')>=$se or $sql->num_rows==0)
	{
		echo "<script>";
		echo "alert('Application is genuine')";
		//echo "window.open('loadProfile.php?uidai=".$uidai."clg=".$clg."',_self)";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('Applicant is not genuine!He has previous bus pass issued on  ".$sp." SO reject this application!')";
		echo "window.open('transport_index.php',_self)";
		echo "</script>";
	}

?>