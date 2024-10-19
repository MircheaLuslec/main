<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);


$name2 = $data['name2'];
$tel2 = $data['tel2'];


$title = "Заголовок письма";
$body = '<p>Имя: <strong>'.$name2.'</strong></p>'.
        '<p>Телефон: <strong>'.$tel2.'</strong></p>';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                          //Send using SMTP
    $mail->Host       = 'smtp.mail.ru';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
    $mail->Username   = 'home.solid@mail.ru';                                   //SMTP username
    $mail->Password   = 'Wcz48CtVc9u2U7pT60Mm';                                   //SMTP password
    $mail->SMTPSecure = 'TLS';                                //Enable implicit TLS encryption
    $mail->Port       = 587;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('home.solid@mail.ru', 'test user name');
    $mail->addAddress('home.solid@mail.ru');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $title;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}