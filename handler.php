<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['name','email'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('comments')->maxLength(6000);




$pp->sendEmailTo('rao.mayu097@gmail@gmail.com'); // ← Your email here

echo $pp->process($_POST);
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$email = $_POST['email'];
$name = $_POST['name'];
$comments = $_POST['comments'];
$experience = $_POST['experience'];
$msg="Name: ".$name."<br> Comments: ".$comments."<br> experience: ".$experience;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = 'rao.mayu097@gmail.com';
$mail->Password = 'mayuri@123';
$mail->From = "email.address@gmail.com";
$mail->FromName = "Mayuri Test Mail";
$mail->addAddress('rao.mayu097@gmail.com');
$mail->Subject = "Feedback";
$mail->msgHTML($msg);

$mail->send();