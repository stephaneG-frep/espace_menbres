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

$mail->Subject = 'Confirmation d\' email';
$mail->Body = 'Pour valider, merci de cliquer sur le lien suivant :
<a href="localhost/espace_menbres/verification.php?email='.$_POST['email']
.'&token='.$token.'"> Confirmation</a>';

$mail->SMTPDebug = 0;

if(!$mail->send()){
	$message = "Mail non envoyé";
	echo 'Erreurs:' .$mail->ErrorInfo;
}else{
	$message = "Un email vous a été envoyé, merci de vérifier votre boite mail !";
	//echo $message;
	//echo $message1;
}
