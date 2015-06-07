<?php
	ob_start();
	session_start();
	include 'testmysql.php';
	$fname=$_POST['first_name'];
	$lname=$_POST['last_name'];
	$name=$fname.' '.$lname;
	//echo $name;
	$url="https://ac.khoslalabs.com/hackgate/hackathon/auth/raw";
	$json=json_encode(array(
		"aadhaar-id"=>$_POST['uidaiNumber'],
		"modality"=>"demo",
  		"device-id"=>"tarungarg",
  		"certificate-type"=>"preprod",
  		"demographics"=>array(
    		"name"=>array(
      			"name-value"=>$name
      			),
    		"address-format"=>"freetext",
    		"address-freetext"=>array(
      		"matching-strategy"=>"partial",
      		"matching-value"=>"70",
      		"address-value"=>$_POST['address']
    			)
   			),
  		"location"=>array(
    		"type"=>"pincode",
    		"pincode"=>"121106"
  			),
		)
	);
	//print_r($json);
	$options = array(
         		CURLOPT_RETURNTRANSFER => true,     // return web page
          // 		CURLOPT_HEADER         => false,    // don't return headers
    		    // CURLOPT_FOLLOWLOCATION => true,     // follow redirects
    		    CURLOPT_POST      => 1,    
    		    CURLOPT_POSTFIELDS => $json, 
    		    
  		    );
	$ch=curl_init($url);
	//echo $ch;
	curl_setopt_array( $ch, $options );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
   	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   	// curl_setopt($ch, CURL_POST, 1);
   	// curl_setopt($ch, CURL_POSTFIELDS, $json);
    $content = curl_exec( $ch );
    //echo $content;
    curl_close( $ch );
    $response=json_decode($content,true);
    //echo "somethinf";
    if(!$response['success'])
    {
    	setcookie('verified','false',time() + (86400 * 30), "/");
    	//$_COOKIE['verified']='false';
    	header('location:schoolAdd.php');
    	exit();
    	//echo "correct";
    }
    else
    {
    	
    	$uidai=$_POST['uidaiNumber'];
    	//$name=$_POST['name'];
    	$address=$_POST['address'];
    	$yoe=$_POST['yoe'];
    	$yop=$_POST['yop'];
    	$result=mysqli_query($conn,"SELECT * from shareddb where UIDAI='$uidai'") or die(mysqli_error($conn));
    	if($result->num_rows>0)
    	{
    		setcookie('verified','copied',time() + (86400 * 30), "/");
    		//$_COOKIE['verified']='false';
    		header('location:schoolAdd.php');
    		exit();
    	}
    	else
    	{
    		mysqli_query($conn,"INSERT into shareddb values ('$uidai','$name','$address','YMCAUST,Faridabad','$yoe','$yop')") or die(mysqli_error($conn));
    	}
    	setcookie('verified','true',time() + (86400 * 30), "/");
    	//$_COOKIE['verifed']='true';
    	header('location:schoolAdd.php');
    	exit();
    }
    // echo json_decode($content);
?>