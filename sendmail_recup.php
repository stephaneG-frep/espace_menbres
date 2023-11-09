<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;
$mail->Username = 'stephanegaillet44@gmail.com';
$mail->Password = 'fluovwnabrcxatjc';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->CharSet = "utf-8";
$mail->setFrom('stephanegaillet44@gamil.com','WebCMS');
$mail->addAddress($_POST['email']);
$mail->isHTML(true); 

$mail->Subject = 'Réinitialisation du mot de passe';
$mail->Body = 'Afin de réinitialiser votre mot de passe,
merci de cliquer sur le lien suivant :
<a href="localhost/espace_menbres/new_password.php?email='.$_POST['email']
.'&token='.$token.'">Réinitialisation du mot de passe</a>';

$mail->SMTPDebug = 0;

if(!$mail->send()){
	$message = "Mail non envoyé";
	echo 'Erreurs :' .$mail->ErrorInfo;
}else{
	$message = "Un email de réinitialisation vous a été envoyé,
    merci de suivre les instructions !";
	//echo $message;
	//echo $message1;
}
