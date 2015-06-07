<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	#rest
	{
		width: 505px;
		float: right;
		background-color: transparent;
		position: absolute;
	}
	a {
  text-decoration: none;
  color: dimgrey;
}
	#result
	{
		background: white;
		margin-top: 2px;
		border: 2px solid #a1a1a1;
    	border-radius: 5px;
		font-size: 31px;
		padding-left: 4%;
		height: 100%;
	}
	span#college {
  font-size: 17px;
  /* margin-left: 148px; */
}
#arrow {
  float: right;
  
  font-size: 25px;
  }
  #arrow:hover
  {
  	font-size: 30px;
  }
	</style>
</head>
<body>

</body>
</html>

<?php
include 'testmysql.php';
$dropdown=$_POST['dropdown'];
$data=$_POST['data'];
if($dropdown=='uidaiNumber')//search by uidai number
{
	//echo "here";
	$result=mysqli_query($conn,"SELECT * FROM shareddb where UIDAI like'%$data%'") or die(mysqli_error($conn));
	//echo $result->num_rows;
	/*echo "<li>"
	
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		$clg=$row['college'];
		echo "<ul class='result'>";
		echo "<a href='loadProfile.php?name=".$name."&clg=".$clg."'>";
		echo $name;
		echo "</a>";
		echo "</ul>";
	}
	echo "</li>";*/
}
else//search by name
{
	$result=mysqli_query($conn,"SELECT * FROM shareddb where Name like '%$data%'") or die(mysqli_error($conn));
	//$result=mysqli_fetch_array($result);	
}
$rows=$result->num_rows;
$flag=0;
echo "<div id='rest'>";
//echo $rows;
if($rows>=1)
{
	$flag=1;
	while($row=mysqli_fetch_array($result))
	{
		$number=$row['UIDAI'];
		$name=$row['Name'];
		$clg=$row['College'];
		echo "<div id='result'>";
      	echo "<a href='loadProfile.php?uidai=".$number."&clg=".$clg."'>";
   		echo $name;
   		echo "</a>";
   		echo "<span id='college'>";
   		echo "<a href='loadProfile.php?uidai=".$number."&clg=".$clg."'>";
   		echo "(".$clg.")";
   		echo "<span id='arrow'>&rarr;</span>";
   		echo "</a>";
   		echo "</span>";
        echo "</div>";
        
    }
}
else
{
	echo "<div id='result'>No Result Found</div>";
}
echo "</div>";
?>