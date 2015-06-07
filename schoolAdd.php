<?php
	include 'testmysql.php';
	session_start();
	if(!isset($_SESSION['name']) or trim($_SESSION['name'])=="")
	{
		header('location:index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Add entries</title>
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component-form.css" />
	</head>
	<body>
		<button> <a href="logout.php" style="text-decoration:none;color:black;">Log Out!</a></button>
		<?php
		//echo "";
		if(isset($_COOKIE['verified']) and $_COOKIE['verified']=='false')
		{
			//echo "yes";

			echo "<script>";
			echo "alert('Data provided is incorrect')";
			echo "</script>";
			setcookie("verified", "", time() - 3600,'/');
		}
		else if(isset($_COOKIE['verified']) and $_COOKIE['verified']=='copied')
		{
			echo "<script>";
			echo "alert('Data already present in Database')";
			echo "</script>";
			setcookie("verified", "", time() - 3600,'/');

		}
		else if(isset($_COOKIE['verified']) and $_COOKIE['verified']=='true')
		{
			echo "<script>";
			echo "alert('Hurrah!!!Data added')";
			echo "</script>";
			setcookie("verified", "", time() - 3600,'/');

		}
	?>
		<div class="container">
			<header class="clearfix">
				<span>Add Entries</span>
				<h1><?php echo $_SESSION['name'];?> Repository</h1>
				<nav>
					<a href="schoolModify.php" class="bp-icon bp-icon-prev" data-info="Modify Already presented Entry"><span>Modify already presented Entry</span></a>
					<a href="schoolDelete.php" class="bp-icon bp-icon-next" data-info="Delete Some Entry"><span>Delete Some Entry</span></a>
					<a href="school_index.php" class="bp-icon bp-icon-archive" data-info="Home"><span>Go to Home</span></a>
				</nav>
			</header>	
			<div class="main">
				<form class="cbp-mc-form" action="verifyAadhar.php" method="post">
					<div class="cbp-mc-column">
	  					<label for="uidaiNumber">UIDAI Number</label>
	  					<input type="number" min="100000000000" id="uidaiNumber" autocomplete="off" name="uidaiNumber" placeholder="Look at bottom of Aadhaar Card" required>
						<label for="first_name">First Name</label>
	  					<input type="text" id="first_name" name="first_name" placeholder="First Name as in Aadhar Card" required>
	  					<label for="last_name">Last Name</label>
	  					<input type="text" id="last_name" name="last_name" placeholder="Leave Empty if not in aadhaar card">	  					
	  				</div>
	  				<div class="cbp-mc-column"><br><br>
						<label for="address">Address(as in Aadhaar Card)</label>
	  					<textarea id="address" name="address" required></textarea>
	  				</div>
	  				<div class="cbp-mc-column"><br><br>
						<label for="yoe">Year Of Entrance</label>
	  					<input type="number" min="2011" id="yoe" name="yoe" placeholder="2001" required>
	  					<label for="yop">Year of Passing(Expected)</label>
	  					<input type="number" min="2016" id="yop	" name="yop" placeholder="2005" required><br><br>
	  					<input class="cbp-mc-submit" type="submit" value="Send your data" />
	  				</div>
				</form>
			</div>
		</div>
	</body>
</html>
