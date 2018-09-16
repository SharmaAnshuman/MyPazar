<?php
session_start();
echo $_SESSION["mobile"];
echo $_SESSION["otp"];
if(strlen($mobile)==10){

	//Your authentication key
	$authKey = "237543AMD7PFcNDz5b9b2399"; //"237543AXK7PWmNBz5b9b8693";

	//Multiple mobiles numbers separated by comma
	$mobileNumber = $mobiles;

	//Sender ID,While using route4 sender id should be 6 characters long.
	$senderId = "eSabji";

	//Your message to send, Add URL encoding here.
	$message = urlencode("
		Your verification code is ".$otp."
	        
	    Welcome to eSabji
	    http://9m.io/03oD");

	//Define route 
	$route = "default";
	//Prepare you post parameters
	$postData = array(
	    'authkey' => $authKey,
	    'mobiles' => $mobileNumber,
	    'message' => $message,
	    'sender' => $senderId,
	    'route' => $route
	);

	//API URL
	$url="http://api.msg91.com/api/sendhttp.php";

	// init the resource
	$ch = curl_init();
	curl_setopt_array($ch, array(
	    CURLOPT_URL => $url,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_POST => true,
	    CURLOPT_POSTFIELDS => $postData
	    //,CURLOPT_FOLLOWLOCATION => true
	));


	//Ignore SSL certificate verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


	//get response
	$output = curl_exec($ch);

	//Print error if any
	if(curl_errno($ch))
	{
	    echo 'error:' . curl_error($ch);
	}

	curl_close($ch);

	echo $output;

}
?>