<?php
	if(isset($_POST['email'])) 
	{
 
		// EDIT THE 2 LINES BELOW AS REQUIRED
		$email_to = "metroglam.phil@gmail.com";
		$email_subject = "Metroglam Studio Inquiries";
	 
		function died($error) 
		{
			// your error code can go here
			echo "<div class='w3-center w3-black w3-text-white'>";
			echo "<p class='aaa'>We are very sorry, but there were error(s) found with the form you submitted.</p><br> ";
			echo "<p class='aaa' style='left:135px;'>These errors appear below.</p><br />";
			echo $error."<br /><br />";
			echo "<p class='aaa' style='left:120px;'>
			<a href='ttps://www.metroglamstudio.com/index.html#contact'>Please go back and fix these errors.</a></p><br /><br />";
			echo "</div>";
			die();
		}
 
		// validation expected data exists
		if(!isset($_POST['full_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['contact_no']) ||
		!isset($_POST['inquiries'])) 
			
		{
			died('We are sorry, but there appears to be a problem with the form you submitted.');       
		}
 
		$full_name = $_POST['full_name']; // required
		$email_from = $_POST['email']; // required
		$contact_no = $_POST['contact_no']; // required
		$inquiries = $_POST['inquiries']; // required
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		$int_exp = "/^[0-9+ ]+$/";
 
		if(!preg_match($email_exp,$email_from)) 
		{
			$error_message .= "<p class='aaa' style='text-align:center;'>* The Email Address you entered does not appear to be valid.</p>";
		}
 
		$string_exp = "/^[A-Za-z .'-]+$/";
	 
		if(!preg_match($string_exp,$full_name)) 
		{
			$error_message .= "<p class='aaa' style='text-align:center;'>* The First Name you entered does not appear to be valid.</p>";
		}
 
	 
		if(strlen($inquiries) < 2) 
		{
			$error_message .= "<p class='aaa' style='text-align:center;'>* The message you entered do not appear to be valid.</p>";
		}
		
		if(!preg_match($int_exp, $contact_no)) 
		{
			$error_message .= "<p class='aaa' style='text-align:center;'>* The contact number you entered does not appear to be valid.</p>";
		}
 
		$string_exp = "/^[A-Za-z .'-]+$/";
 
		if(strlen($error_message) > 0) 
		{
			died($error_message);
		}
	 
	 
	 
	 
		$email_message = "Form details below.\n\n";
	 
		function clean_string($string) 
		{
		  $bad = array("content-type","bcc:","to:","cc:","href");
		  return str_replace($bad,"",$string);
		}
 
		$email_message .= "Full Name: ".clean_string($full_name)."\n";
		$email_message .= "Email: ".clean_string($email_from)."\n";
		$email_message .= "ContactUs: ".clean_string($contact_no)."\n";
		$email_message .= "Inquiries: ".clean_string($inquiries)."\n";
	 
		// create email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);  
		?>
	 
		<!-- include your own success html here -->
		<center>
			<br>
			<br>
			<br>
			<br>
			<h2 class='bbb'>Inquiries was successfully Sent. </h2>
			<br />
			<h1 class='bbb' style='left:120px;'>Thank you! </h1>
		</center>
	 
		<?php
		 
	}
		?>
		

<!DOCTYPE>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="W3.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
#container
{
	position:relative;
	width: 1276px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}

#container2
{
	position:relative;
	width: 75%;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
}

#toTop2 {

  text-decoration: none;
  position: fixed;
  bottom: 20%;
  right: 45%;
  overflow: hidden;
  z-index: 999; 
  border: none;
  text-indent: 100%;

}


</style>
</head>
<body>


<a href="https://www.metroglamstudio.com/index.html#contact" title="Back To Home"><img src="images/lipstick2.png" id="toTop2"></a>



</body>
</html>
