<?php
require ('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
// $mail->SMTPDebug = 1;// debugging: 1 = errors and messages, 2 = messages only
// Define SMTP Host
$mail->Host = "ssl://smtp.gmail.com";
// Enable smtp authentication
$mail->SMTPAuth = "true";
// set type of encryption
$mail->SMTPSecure = "ssl";
// set port to connect smtp
$mail->Port = "465";
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
// $response = $mail->Send();

// echo $response;

if($mail->Send()){
    echo "email sent!";
}else{
    echo "error occured";
}

// close smtp connection
$mail->smtpClose();

echo "test";

?>