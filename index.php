<?php
include 'testmysql.php';
	if(isset($_SESSION['verified']) and $_SESSION['verified']=='false')
	{
		unset($_SESSION['verified']);
		echo "<script>alert('Invalid Credentials!')</script>";
	}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/demo-split.css" />
		<link rel="stylesheet" type="text/css" href="css/component-split.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<div id="splitlayout" class="splitlayout">
				<div class="intro">
					<div class="side side-left">
						<div class="intro-content">
							<div class="profile"><img src="img/bus1.jpg" alt="profile1"></div>
							<h1><span>Transport <br>Department</span><span>Verify &amp; issue E challan<br> for Applicants</span></h1>
						</div>
						<div class="overlay"></div>
					</div>
					<div class="side side-right">
						<div class="intro-content">
							<div class="profile"><img src="img/edu1.jpg" alt="profile2"></div>
							<h1><span>Education<br> Department</span><span>Attach UIDAI Number <br>with students data<br> and verify!</span></h1>
						</div>
						<div class="overlay"></div>
					</div>
				</div><!-- /intro -->
				<div class="page page-right">
					<div class="page-inner">
						<section>
							<h2>Education Department</h2>
							<p>
								Online Data repository for college student.
								You can add new student through add feature and you have to provide their demographic detail and after verifying
								the details through AADHAR api it will be stored in Database that will be equally accessible by Transport Department.
								This way we can reduce formalities to first verify the demographics on Instituion behalf and then verifying the same on
								Transport department behalf when applying to have Bus Pass.
								This application reduced a process that would take a week to mere 2 days or so.
							</p>
							
						</section>
						<section>
							<h2>Log In!</h2>
							<p>
								<form method="post" action="collegeLoginCheck.php">
									<label for="city">City Name</label>
									<input type="text" placeholder="City Name" name="city" id="city" class="city" required/><br><br>
									<label for="name">Name of Institution</label>
									<input type="text" placeholder="Name of college" name="name" id="name" class="name" required/><br><br>
									<label for="password">Password</label>
									<input required type="password" placeholder="Unique password" name="password" id="password" class="password"/><br><br>
									<input type="submit" value="Sign Me!" id="submit" class="submit">
								</form>
							</p>							
						</section>
					</div><!-- /page-inner -->
				</div><!-- /page-right -->
				<div class="page page-left">
					<div class="page-inner">
						<section>
							<h2>Transport Department</h2>
							<p>
								Here you can search directly verifed students through education department .We can search using name or UIDAI number.
								After searching we have to verify if the distance is in permissible limit to allow bus pass(here 63 KM) and after that we have 
								to verify that the applicant is current student of institution i.e. no pass out or teacher.
								After that we'll check whether applicant has any previous bus pass that is still relevant(This case can also be usefull when bus pass will be lost
								we can directly check that yes We HAD a bus pass).If any relevant bus pass is there then do not forward application on next stage.
								Here we had stoped the process after generation E-challan as after that its a mere formality with fee deposit and then we can have our bus pass.
								This application reduced a process  of having student bus passthat would take a week to mere 2 days or so.
							</p>
						</section>
						<section>
							<h2>Log In!</h2>
							<p>
								<form method="post" action="busLoginCheck.php">
									<label for="city">City Name</label>
									<input type="text" placeholder="City Name" name="city" id="city" class="city" required/>
									<br><br><label for="password">Password</label>
									<input required type="password" placeholder="Unique password" name="password" id="password" class="password"/>
									<br><br><input type="submit" value="Sign Me!" id="submit" class="btn submit">
								</form>
							</p>
						</section>
					</div><!-- /page-inner -->
				</div><!-- /page-left -->
				<a href="#" class="back back-right" title="back to intro">&rarr;</a>
				<a href="#" class="back back-left" title="back to intro">&larr;</a>
			</div><!-- /splitlayout -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/cbpSplitLayout.js"></script>
	</body>
</html>
