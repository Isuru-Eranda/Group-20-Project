<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$heading = $_POST['subject'];
	$message = $_POST['message'];

	if(!empty($email) && !empty($message)) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$receiver = "garukavassalaarachchi@gmail.com";
			$subject = "From: $name <$email>";
			$body = "Name: $name\nEmail: $email\n\nSubject: $heading\n\n Message: $message\n\nRegards,\n$name";
			$sender = "From: $email";
			if(mail($receiver, $subject, $body, $sender)){
				echo "Your Message has benn sent!";
			}else{
				echo "Sorry, failed to send your Message!";
			}
		}else{
			echo "Enter a valid Email address!";
		}
	}else{
		echo "Email and Message is required!";
	}
?>