<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug  = 1;                                       //Enable verbose debug output
    $mail->isSMTP();                                             //Send using SMTP
    $mail->Host       = 'smtpout.secureserver.net';                        //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
    $mail->Username   = 'team.pedassist@gmail.com';               //SMTP username
    $mail->Password   = 'Ped@ssist180122';                           //SMTP password
    $mail->SMTPSecure = "ssl";                                   //Enable implicit TLS encryption
    $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('team.pedassist@gmail.com', 'Team Pedassist');
    $mail->addAddress(''.$_COOKIE['email']);                        //Add a recipient
    // $mail->addAddress('arti.agni01@gmail.com');
    // $mail->addAddress('tanmaysm1711@gmail.com');                  //Name is optional

    //Attachments
    $mail->addAttachment('SVG/badge_'.$_POST['completedLesson'].'.svg', $_COOKIE['name'] . 'badge' . $_POST['completedLesson'] . '.pdf');         //Add attachments with name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Congratulation " . $_COOKIE['name'] . ", you've completed lesson " . $_POST['completedLesson'] . ". Check out the badge you've earned!";
    $mail->Body    = "<h3>Here you have a badge that you have earned on completion of lesson " . $_POST['completedLesson'] . " </h3> 
                    <p>This is an official email by PEDASSIST team. Enjoy your day!!</p> ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
