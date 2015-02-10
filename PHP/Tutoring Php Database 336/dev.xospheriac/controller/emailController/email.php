<?php
session_start();
$first = $_POST['first'];
$last = $_POST['last'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = $_POST['date'];
$classes = $_POST['classes'];
$description = $_POST['description'];


// Email Template 
$subject = 'Someone wants to get tutored!';
$message = 'First: ' . $first . "\n".
           'Last: ' . $last . "\n".
           'Phone: ' . $phone . "\n".
           'Email: ' . $email . "\n"."\n".
           'Date: '. $date . "\n".
           'Classes: ' . $classes . "\n".
           'Description: ' . $description;

$to = 'xospheriac@gmail.com';
$type = 'plain'; // or HTML
$charset = 'utf-8';

$mail     = 'no-reply@'.str_replace('www.', '', $_SERVER['SERVER_NAME']);
$uniqid   = md5(uniqid(time()));
$headers  = 'From: '.$mail."\n";
$headers .= 'Reply-to: '.$mail."\n";
$headers .= 'Return-Path: '.$mail."\n";
$headers .= 'Message-ID: <'.$uniqid.'@'.$_SERVER['SERVER_NAME'].">\n";
$headers .= 'MIME-Version: 1.0'."\n";
$headers .= 'Date: '.gmdate('D, d M Y H:i:s', time())."\n";
$headers .= 'X-Priority: 3'."\n";
$headers .= 'X-MSMail-Priority: Normal'."\n";
$headers .= 'Content-Type: multipart/mixed;boundary="----------'.$uniqid.'"'."\n\n";
$headers .= '------------'.$uniqid."\n";
$headers .= 'Content-type: text/'.$type.';charset='.$charset.''."\n";
$headers .= 'Content-transfer-encoding: 7bit';

mail($to, $subject, $message, $headers);
Header('Location: /view/emailConfirmation.php')
?>