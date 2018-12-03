<?php
	$respuesta = [];
	$name = @trim(stripslashes($_POST['InputName1'])); 
	$email = @trim(stripslashes($_POST['InputEmail1']));  
	$subject = @trim(stripslashes($_POST['InputSubject']));  
	$message = @trim(stripslashes($_POST['InputTextarea'])); 

	if (
		(!isset($name) || $name == "") || 
		(!isset($email) || $email == "") || 
		(!isset($subject) || $subject == "") || (!isset($message) || $message == ""))
	{
		$respuesta['respuesta'] = "incomplete";
	}

	$email_from = $email;
	$email_to = 'ezequiel.estigarribia@gmail.com'; //replace with your email

	$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

	$success = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message);
	
	if ($success){
		$respuesta['respuesta'] = "ok";
	}else{
		$respuesta['respuesta'] = "error";
	}

	$res = json_encode($respuesta);

	echo $res;

?>