<?php
	include 'testmysql.php';
	$url="https://ac.khoslalabs.com/hackgate/hackathon/auth/raw";
	$json=json_encode(array(
		"aadhar-id"=>$_POST['uidaiNumber'];
		"modality"=>"demo",
  		"device-id"=>"tarungarg",
  		"certificate-type"=>"preprod",
  		"demographics"=>array(
    		"name"=>array(
      			"name-value"=>$_POST['name'];
      			),
    		"gender"=>"male",
    		"address-format"=>"freetext",
    		"address-freetext"=>array(
      		"matching-strategy"=>"partial",
      		"matching-value"=>"70",
      		"address-value"=>$_POST['address'];
    			)
   			),
  		"location"=>array(
    		"type"=>"pincode",
    		"pincode"=>"121106"
  			),
		)
	);
	echo $json;
	/*$options = array(
         		CURLOPT_RETURNTRANSFER => true,     // return web page
          		CURLOPT_HEADER         => false,    // don't return headers
    		    CURLOPT_FOLLOWLOCATION => true,     // follow redirects
    		    CURLOPT_ENCODING       => "",       // handle all encodings
    		    CURLOPT_AUTOREFERER    => true,     // set referer on redirect
    		    CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
    		    CURLOPT_TIMEOUT        => 120,      // timeout on response
    		    CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
  		    );
	$ch=curl_init($url);*/
?>