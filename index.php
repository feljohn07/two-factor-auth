<?php

// require('vendor\phpmailer\phpmailer\src\PHPMailer.php');
// require('vendor\phpmailer\phpmailer\src\SMTP.php');
// require('vendor\phpmailer\phpmailer\src\Exception.php');

require('includes\PHPMailer.php');
require('includes\SMTP.php');
require('includes\Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
// Define SMTP Host
$mail->Host = "smtp.gmail.com";
// Enable smtp authentication
$mail->SMTPAuth = "true";
// set type of encryption
$mail->SMTPSecure = "tls";
// set port to connect smtp
$mail->Port = "587";
// set gmail username
$mail->Username = "feljohn.loe.bangasan@gmail.com";
// set gmail password
$mail->Password = "tfgwiqpccwlgxoaj";
// set email subject
$mail->Subject = "OTP TEST";
// set sender email
$mail->setFrom("feljohn.loe.bangasan@gmail.com");
// set email body
$mail->Body = "this is the body";
// add recipient
$mail->addAddress("feljohn.loe.bangasan@gmail.com");
// send the email
if($mail->Send()){
    echo "email sent!";
}else{
    echo "error occured";
}

// close smtp connection
$mail->smtpClose();

echo "test";

?>