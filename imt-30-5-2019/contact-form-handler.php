<?php 
$errors = '';
$myemail = 'info@imtiazpopatcounselling.com';
if(empty($_POST['Name'])  || 
   empty($_POST['Email']) || 
  empty($_POST['phone'])  ||
   empty($_POST['Subject']) || 
   empty($_POST['Message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['Name']; 
$email_address = $_POST['Email']; 

$subject = $_POST['Subject']; 
$message = $_POST['message']; 
$phone = $_POST['phone'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address ))
{
    $errors .= "\n Error: Invalid Email Address";
	
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Phone Number: $phone_number \n Subject: $subject  \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
	
} 
?>

<html>
<head>
	<title>Contact form handler</title>
</head>

<body>

<?php
echo nl2br($errors);
?>


</body>
</html>