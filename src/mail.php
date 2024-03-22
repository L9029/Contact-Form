<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;

function sendEmail($name, $email, $subject, $body, $html = false){

    //Settings of the email server
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '496abc120f0b20';
    $phpmailer->Password = '********98ac';

    //Adding the addressees
    $phpmailer->setFrom("company@mycompany.com", "My Company");
    $phpmailer->addAddress($email, $name);

    //Content
    $phpmailer->isHTML($html);

    //Email format to html
    $phpmailer->Subject = $subject;
    $phpmailer->Body = $body;

    $phpmailer->send();
}

?>