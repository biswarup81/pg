<?php
require 'class.phpmailer.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'localhost';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@pginfoservices.com';                            // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'admin@pginfoservices.com';
$mail->FromName = 'Mailer';
$mail->AddAddress('biswarup.ghoshal@gmail.com', 'Biswarup Ghoshal');  // Add a recipient
             // Name is optional
$mail->AddReplyTo('noreply@pginfoservices.com', 'No Reply');


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->AddAttachment('/tmp/ticket.csv', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';

?>
