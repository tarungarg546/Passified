<?php
	include 'testmysql.php';
	session_start();
	//echo "yes";
	$name=$_POST['city'];
	$password=$_POST['password'];
	/*echo $name;
	echo $password;*/
	$sql=mysqli_query($conn,"SELECT * from busDB where name='$name' and password='$password'") or die(mysqli_error($conn));
	//echo $sql->num_rows;
	if($sql->num_rows<=0)
	{
		$_SESSION['verified']='false';
		header('location:index.php');
	}	
	else
	{
		$_SESSION['busName']=$name;
		header('location:transport_index.php');
	}
?>