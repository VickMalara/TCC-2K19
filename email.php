<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\USBserver\composer\vendor\autoload.php';


$mail = new PHPMailer;

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = 'deh.pbrasil@gmail.com';
$mail->Password = '515253xd';

?>