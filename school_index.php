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
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Home For Schools</title>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
	</head>
	<body>
		<button> <a href="logout.php" style="text-decoration:none;color:black;">Log Out!</a></button>
		<div class="container">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<h1><?php echo $_SESSION['name'];?><span>Developed By Student of YMCA University,Faridabad</span></h1>
				<p>Online Data Maintainance and Upgradation Forum</p>
			</header>
			<section class="demo-4">
				<div class="grid">
					<div class="box" data-category="schoolAdd">
						<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
							<line class="top" x1="0" y1="0" x2="900" y2="0"/>
							<line class="left" x1="0" y1="460" x2="0" y2="-920"/>
							<line class="bottom" x1="300" y1="460" x2="-600" y2="460"/>
							<line class="right" x1="300" y1="0" x2="300" y2="1380"/>
						</svg>
						<h3>A</h3>
						<span class="date"></span>
						<span>Add New Entry</span>
					</div>
					<div class="box" data-category="schoolModify">
						<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
							<line class="top" x1="0" y1="0" x2="900" y2="0"/>
							<line class="left" x1="0" y1="460" x2="0" y2="-920"/>
							<line class="bottom" x1="300" y1="460" x2="-600" y2="460"/>
							<line class="right" x1="300" y1="0" x2="300" y2="1380"/>
						</svg>
						<h3>M</h3>
						<span class="date"></span>
						<span>Modify previous Entry</span>
					</div>
					<div class="box" data-category="schoolDelete">
						<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
							<line class="top" x1="0" y1="0" x2="900" y2="0"/>
							<line class="left" x1="0" y1="460" x2="0" y2="-920"/>
							<line class="bottom" x1="300" y1="460" x2="-600" y2="460"/>
							<line class="right" x1="300" y1="0" x2="300" y2="1380"/>
						</svg>
						<h3>D</h3>
						<span class="date"></span>
						<span>Delete Any Entry</span>
					</div>
				</div><!-- /grid -->
			</section>
		</div><!-- /container -->
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.box').each(function(){
			var $this=$(this),
				$category=$this.data('category');
			$this.on('click',function(){
				window.open($category+'.php');
			});
		});
	});
	//$('.box').each(f)
	</script>
</html>