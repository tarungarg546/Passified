<?php
	include 'testmysql.php';
	session_start();
	if(!isset($_SESSION['busName']) or $_SESSION['busName']=="")
	{
		header('location:index.php');
		exit();
	}
	if(!isset($_GET['uidai']) or !isset($_GET['clg']))
	{
		header('location:transport_index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
	/* body
	
	{
		overflow: auto;
			height: 100%;
			width: 718px;
	} */
	body{
        font-family:arial;
        font-size:.8em;
    }
    button
    {	
	  font-size: 3.2em;
	  width: 30%;
	  height: 100%;
	  color: white;
	  background-color: lightseagreen;
	  border: 1px solid lightseagreen;
	  border-radius: 23px;
    }
    button:active{
    	background-color: seagreen;
    }
    #gmap_canvas{
        width:100%;
        height:30em;
    }
    p{
    	padding-top: 15px;
    	margin: 0px;
  		height: 50px;
  		width: 100%;
    }
    #outputDiv
    {
    	margin-top: 2px;
    	color: azure;
    	font-size: 25px;
    }
    #check
    {
    	margin-top: 2px;
    	color: azure;
    	font-size: 30px;
    	text-align: right;
    	float: right;	
    }
    #final{
    	width: 100%;
    }
    #record
    {
    	height: 100px;
    	float: right;
    }
    #academics
    {
    	font-size: 1.5em;
    	height: 50px;
    }
	</style>
</head>
<body background="img/bus.jpg">
	<?php
		if(isset($_GET['uidai']) and isset($_GET['clg'])){
			$name=$_GET['uidai'];
			//$clg=$_GET['clg'].','.$_SESSION['loc'];
			$clg=$_GET['clg'];
			$sql=mysqli_query($conn,"SELECT * from shareddb where UIDAI='$name'") or die(mysqli_error($conn));
			if($sql->num_rows>0)
			{
				$row=mysqli_fetch_array($sql);
				$source=geocode($row['Address']);
				if($source)
				{
					$sourceLat=$source[0];
					$sourceLang=$source[1];
					$sourceFormattedAdd=$source[2];
					$des=geocode($clg);
					if($des)
					{
						$destLat=$des[0];
						$destLang=$des[1];
						$destFormattedAdd=$des[2];
					}
				}
				else
				{
					echo "No Map Found!";
				}
			}
		}
		?>
				 <!-- google map will be shown here -->
	    	<div id="gmap_canvas">Loading map...</div>
	    	<p><button type="button" id="dist" onclick="calculateDistances();">Calculate
          	distances</button>
          	<button type="button" onclick="Check();" id="record" class="record">Check Previous Record</button><br><br><br><br><br><span id="check">Check if applicant holds<br> any previous Bus Pass! </span></p>
	 		<div id="outputDiv"></div>
	 		<div id="final"></div>
	 		<div id="result"></div>
	    <!-- JavaScript to show google map -->
	    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>    
	    <script type="text/javascript">
	        //function init_map() {
	        	var map;
				var geocoder,count=0;
				var bounds = new google.maps.LatLngBounds();
				var markersArray = [];

				var origin1 = new google.maps.LatLng(<?php echo $sourceLat;?>,<?php echo $sourceLang;?>);
				var destinationA = new google.maps.LatLng(<?php echo $destLat;?>,<?php echo $destLang;?>);

				var destinationIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=D|FF0000|000000';
				var originIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=O|FFFF00|000000';

				function initialize() {
				  var opts = {
				    center: origin1,
				    zoom: 10,
				  };
				  map = new google.maps.Map(document.getElementById('gmap_canvas'), opts);
				  geocoder = new google.maps.Geocoder();
				}

				function calculateDistances() {
					document.getElementById("dist").value="Calculating..";
  					var service = new google.maps.DistanceMatrixService();
  					service.getDistanceMatrix(
    				{
      					origins: [origin1],
      					destinations: [destinationA],
      					travelMode: google.maps.TravelMode.DRIVING,
     	 				unitSystem: google.maps.UnitSystem.METRIC,
      					avoidHighways: false,
      					avoidTolls: false
    				}, callback);
				}
				function callback(response, status) {
  					if (status != google.maps.DistanceMatrixStatus.OK) {
    					alert('Error was: ' + status);
  					} else {
    					var origins = response.originAddresses;
    					var destinations = response.destinationAddresses;
    					var outputDiv = document.getElementById('outputDiv');
    					outputDiv.innerHTML = '';
    					deleteOverlays();

    					for (var i = 0; i < origins.length; i++) {
      							var results = response.rows[i].elements;
							      addMarker(origins[i], false);
							      for (var j = 0; j < results.length; j++) {
							        addMarker(destinations[j], true);
							        outputDiv.innerHTML += 'Length='+results[j].distance.text ;

					document.getElementById("dist").value="Calculate Distance";
							        if(results[j].distance.text<='60 km'){
							        	count++;
							        	outputDiv.innerHTML+="<br>Check Wheter he is eligible and verify!<br>"+"<button type='button' id='academics' onclick=perform()>Verify!</button>";
							        }
							        else
							        {
							        	outputDiv.innerHTML+="Person with UIDAI number="+<?php echo $_GET['uidai']?>+"<br> is not elegible<br><a href='transport_index.html'>Check Another</a>";
							        }
							      }
    						}
  						}
				}
				function addMarker(location, isDestination) {
					  var icon;
					  if (isDestination) {
					    icon = destinationIcon;
					  } else {
					    icon = originIcon;
					  }
					  geocoder.geocode({'address': location}, function(results, status) {
					    if (status == google.maps.GeocoderStatus.OK) {
					      bounds.extend(results[0].geometry.location);
					      map.fitBounds(bounds);
					      var marker = new google.maps.Marker({
					        map: map,
					        position: results[0].geometry.location,
					        icon: icon
					      });
					      markersArray.push(marker);
					    } else {
					      alert('Geocode was not successful for the following reason: '
					        + status);
					    }
					  });
					}

					function deleteOverlays() {
					  for (var i = 0; i < markersArray.length; i++) {
					    markersArray[i].setMap(null);
					  }
					  markersArray = [];
					}

	        google.maps.event.addDomListener(window, 'load', initialize);
	    </script>
	<?php
	 
	// function to geocode address, it will return false if unable to geocode address
	function geocode($address){
	 
	    // url encode the address
	    $address = urlencode($address);
	     
	    // google map geocode api url
	    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
	 
	    // get the json response
	    $resp_json = file_get_contents($url);
	     
	    // decode the json
	    $resp = json_decode($resp_json, true);
	 
	    // response status will be 'OK', if able to geocode given address 
	    if($resp['status']='OK'){
	 
	        // get the important data
	        $lati = $resp['results'][0]['geometry']['location']['lat'];
	        $longi = $resp['results'][0]['geometry']['location']['lng'];
	        $formatted_address = $resp['results'][0]['formatted_address'];
	         
	        // verify if data is complete
	        if($lati && $longi && $formatted_address){
	         
	            // put the data in the array
	            $data_arr = array();            
	             
	            array_push(
	                $data_arr, 
	                    $lati, 
	                    $longi, 
	                    $formatted_address
	                );
	             
	            return $data_arr;
	             
	        }else{
	            return false;
	        }
	         
	    }else{
	        return false;
	    }
	}
	?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
	function Check() {
		$("#check").val("Checking...!");
		$("#result").val(' ');
		$.ajax({
			url:'checkPrevious.php?uidai='+<?php echo $_GET['uidai']?>,
			success:function(response){
				count++;
				console.log(count);
				$("#result").append(response);
				if(count==3)
				{
					$("#final").append('<button id="final" type="button" onclick="generateChallan()">Generate Challan!</button>');
				}
				$("#check").val("Check Previous Record");
			}
		});
	}
	function perform(){
		$("#academics").val("Verifying..");
		$("#result").val(' ');
		$.ajax({
			url:'verifyAcademics.php?uidai='+<?php echo $_GET['uidai']?>,
			success:function(response){
				//console.log(response);
				count++;
				console.log(count);
				$("#result").append(response);
				if(count==3)
				{
					$("#final").append('<button id="final" type="button" onclick="generateChallan()">Generate Challan!</button>');
				}

		$("#academics").val("Verify!");
			}
		})
		// body...
	}
	function generateChallan()
	{
		alert('This is banking part!Here Challan is generate and after  depositing Challan we have a Challan number');
		alert('Again when applicant come with challan number we have only the formality of filling details and issuing bus pass.');
		alert('After a bus pass is issued its entry is created in transportDB.For this application we have used a sample database');
		alert('Thank You!');
	}
</script>
</html>