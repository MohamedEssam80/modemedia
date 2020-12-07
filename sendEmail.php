<?php

// Replace this with your own email address
$siteOwnersEmail = 'abdarrahman.abouzaid@gmail.com';


if($_POST) {

	$comapany = trim(stripslashes($_POST['company']));
	$name = trim(stripslashes($_POST['client_name']));
	$mobileNumber = trim(stripslashes($_POST['mobile_number']));
	$email = trim(stripslashes($_POST['email']));
	$service = trim(stripslashes($_POST['service']));
	
	$error = [];
   	// Check Name
	if (strlen($name) < 4) {
		$error['name'] = "Please enter your name. It should have at least 4 charachters";
	}

	// Check Name
	if (strlen($comapany) < 4) {
		$error['comapany'] = "Please enter your comapany. It should have at least 4 charachters";
	}

	// Check Name
	if (strlen($service) < 5) {
		$error['name'] = "Please enter your service. It should have at least 5 charachters";
	}

	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($mobileNumber) < 10) {
		$error['message'] = "Please enter valid Mobile number. It should have at least 8 numbers.";
	}

   	// Subject
	$subject = "Requested service";

   	// Set Message
  	$message = "Company: " . $comapany . "<br />";
  	$message .= "Client Name: " . $name . "<br />";
  	$message .= "Client Number: " . $mobileNumber . "<br />";
	$message .= "Email: " . $email . "<br />";
	$message .= "Service:" . $service . "<br />";
	$message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

	// Set From: header
	$from =  $name . " <" . $email . ">";

   	// Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0" . "\r\n";
	// $headers .= "Content-Type: text/html;charset=UTF-8" . "\r\n";


   	if (!$error) {
		try {
			$mail = mail($siteOwnersEmail, $subject, $message, $headers);
			echo "ok";
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	} else {
		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;
	}
}

?>