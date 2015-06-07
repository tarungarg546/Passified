<?php
	include 'testmysql.php';
	session_start();
	//echo "yes";
	$cityName=$_POST['city'];
	$name=$_POST['name'].','.$cityName;
	//echo $name;
	$password=$_POST['password'];
	$sql=mysqli_query($conn,"SELECT * from collegeDB where name='$name' and password='$password'") or die(mysqli_error($conn));
	//echo $sql->num_rows;
	if($sql->num_rows<=0)
	{
		$_SESSION['verified']='false';
		header('location:index.php');
	}	
	else
	{
		$_SESSION['name']=$name;
		header('location:school_index.php');
	}
?>

