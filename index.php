<?php

// require('vendor\phpmailer\phpmailer\src\PHPMailer.php');
// require('vendor\phpmailer\phpmailer\src\SMTP.php');
// require('vendor\phpmailer\phpmailer\src\Exception.php');

// require('includes\PHPMailer.php');
// require('includes\SMTP.php');
// require('includes\Exception.php');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPDebug = 1;// debugging: 1 = errors and messages, 2 = messages only
// Define SMTP Host
$mail->Host = "smtp.gmail.com";
// Enable smtp authentication
$mail->SMTPAuth = "true";
// set type of encryption
$mail->SMTPSecure = "tls";
// set port to connect smtp
$mail->Port = "578";
// set gmail username
$mail->Username = "feljohn.loe.bangasan@gmail.com";
// set gmail password
$mail->Password = "sstkndpooachiqgk";
// set email subject
$mail->Subject = "OTP TEST";
// set sender email
$mail->setFrom("feljohn.loe.bangasan@gmail.com");
// set email body
$mail->Body = "this is the body";
// add recipient
$mail->addAddress("feljohn.loe.bangasan@gmail.com");
// send the email
if(!$mail->Send()){
    "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message has been sent";
}

// close smtp connection
$mail->smtpClose();

echo "test";

?>