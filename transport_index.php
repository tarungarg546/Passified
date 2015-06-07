<?php
	include 'testmysql.php';
	session_start();
	if(!isset($_SESSION['busName']) or $_SESSION['busName']=="")
	{
		header('location:index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Search For It!</title>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<!--<link rel="stylesheet" type="text/css" href="css/demo-select.css" />-->
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-elastic.css" />
		<style type="text/css">
		body
		{
			overflow: auto;
			height: 100%;
			width: 718px;
		}
		#select
		{
			position: relative;
			top: 300px;
			left: 295px;
			width: 343px;

			}
			section#searchInput {
  				position: relative;
  				top: 218px;
  				left: 648px;
  				height: 100%;
  			}
  			div.cs-skin-elastic
  			{
  				border: 3px solid;
  			}
  			input.self
  			{

  				width: 100%;
  				border: 3px solid;
  				  background: white;
  font-size: 2.5em;
  font-weight: 400;
  color: #5b8583;
  				width: 500px;
  				height:73.5px;
  				}
				input.self:active
				{
					/* padding-left: 2px; */
					color: Black;
					border: 3px solid #5b8583;
				}
				h1
				{
					  font-size: 3em;
  margin: 0.67em 0;
  left: 10%;
  top: 19%;
  text-align: center;
  color: burlywood;

				}
  				</style>
	</head>
	<body background="img/bus.jpg">
	<button> <a href="logout.php" style="text-decoration:none;color:black;">Log Out!</a></button>
		<div class="container">
			<h1 style="position:fixed; font-family:cursive;">Search and Verify using UIDAI number or Name</h1>
			<section id="select">
				<select class="cs-select cs-skin-elastic" id="dropdown">
					<option value="" disabled selected>Search By</option>
					<option value="uidaiNumber">UIDAI number</option>
					<option value="name">Name</option>
				</select>
			</section>
			<section id="searchInput">
				<input type="text" class="self" id="self" name="self" placeholder="Search Term" onkeyup="javascript:search('self')">
				<div id="rest"></div>
			</section>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
		<script type="text/javascript">
		function search(Id){
			var dt=document.getElementById(Id),
				dd=document.getElementById('dropdown');
			//console.log(dd.value);
			if(dd.value=="")
			{
				dt.value="";
				alert("select a search By parameter!");

				return ;
			}
			if(dt.length<=0)
			{
				document.getElementById('rest').innerHTML="";
			}
			/*console.log(dd.value);
			console.log(dt.value);*/
			/*fetch('loadSuggestion.php', {
					method: 'post',
					body:
					'dropdown='+dd.value+'&data='+dt.value
			}).then(function(response) {
				//console.log(response);
				document.getElementById('rest').innerHTML=response;
			}).catch(function(err) {
				// Error :(
					console.log("error");
			});*/
			if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("rest").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST","loadSuggestion.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("dropdown="+dd.value+"&data="+dt.value);
	}

		</script>
	</body>
</html>