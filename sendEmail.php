<?php
session_start();
// Replace this with your own email address
$siteOwnersEmail = 'abdarrahman.abouzaid@gmail.com';


if($_POST) {
	$company = trim(stripslashes($_POST['company']));
	$name = trim(stripslashes($_POST['client_name']));
	$mobileNumber = trim(stripslashes($_POST['mobile_number']));
	$email = trim(stripslashes($_POST['email']));
	$service = trim(stripslashes($_POST['service']));
	
	$errors = [];
   	// Check Name
	if (strlen($name) < 4) {
		$errors['client_name'] = 'Please enter your name. It should have at least 4 charachters';
	}

	// Check Name
	if (strlen($company) < 4) {
		$errors['company'] = 'Please enter your company. It should have at least 4 charachters';
	}

	// Check Name
	if (strlen($service) < 5) {
		$errors['service'] = 'Please enter your service. It should have at least 5 charachters';
	}

	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$errors['email'] = 'Please enter a valid email address.';
	}
	// Check Message
	if (strlen($mobileNumber) < 10) {
		$errors['mobile_number'] = 'Please enter valid Mobile number. It should have at least 8 numbers.';
	}

   	// Subject
	$subject = 'Requested service';

	// Set Message
	$message = '<html><head><title>Requested service</title></head><body>';
  	$message .= 'Company: ' . $company . '<br />';
  	$message .= 'Client Name: ' . $name . '<br />';
  	$message .= 'Client Number: ' . $mobileNumber . '<br />';
	$message .= 'Email: ' . $email . '<br />';
	$message .= 'Service:' . $service . '<br />';
	$message .= '</body></html>';

	// Set From: header
	$from =  $name . ' <' . $email . '>';

	// Email Headers
	$headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= 'From: ' . $from . '\r\n';
	$headers .= 'Reply-To: '. $email . '\r\n';

   	if (empty($errors)) {
		try {
			$mail = mail($siteOwnersEmail, $subject, $message, $headers);
			$_SESSION['success'] = 'Thanks for contacting with us! We\'ll reply to you soon';
		} catch (Exception $e) {
			$_SESSION['errors']['mailError'] = 'Sorry! Cannot send your email, please try again';
		}
	} else {
		$_SESSION['errors'] = $errors;
	}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>