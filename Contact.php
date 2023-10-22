<?php
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$recipient = "garukavassalaarachchi@gmail.com";
	$mailheader = "From: ".$name."<".$email.">\r\n";
	
	mail($recipient, $subject, $message, $mailheader) or die("Error!");
	
	echo "Email Sent!";
}


?>