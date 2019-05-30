<?php 
$errors = '';
$myemail = 'info@imtiazpopatcounselling.com';
if(empty($_POST['Patient_Name'])  || 
   empty($_POST['Number']) || 
  empty($_POST['email'])  ||
   empty($_POST['Text']) || 
   empty($_POST['Time']) ||
   empty($_POST['Location']) ||
   empty($_POST['Gender']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['Patient_Name']; 
$email_address = $_POST['email']; 
$date = $_POST['Text']; 
$time = $_POST['Time']; 
$phone = $_POST['Number'];
$location = $_POST['Location'];
$gender = $_POST['Gender'];

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
	$email_body = "You have received a new message for an appointment. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Phone Number: $phone \n Gender: $gender \n Date: $date  \n Time: $time \n Location: $location  \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: appointment-form-thank-you.html');
	
} 
?>

<html>
<head>
	<title>Appointment form handler</title>
</head>

<body>

<?php
echo nl2br($errors);
?>


</body>
</html>