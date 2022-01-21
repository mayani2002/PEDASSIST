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
    $mail->Host       = 'pedassist.in';                        //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
    $mail->Username   = 'team@pedassist.in';               //SMTP username
    $mail->Password   = 'Ped@ssist180122';                           //SMTP password
    $mail->SMTPSecure = "ssl";                                   //Enable implicit TLS encryption
    $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('team@pedassist.in', 'Team Pedassist');
    $mail->addAddress(''.$_COOKIE['email']);                        //Add a recipient
    // $mail->addAddress('arti.agni01@gmail.com');
    // $mail->addAddress('tanmaysm1711@gmail.com');                  //Name is optional

    //Attachments
    // $mail->addAttachment('SVG/badge_'.$_POST['completedLesson'].'.svg', $_COOKIE['name'] . 'badge' . $_POST['completedLesson'] . '.pdf');         //Add attachments with name

    // Setting the lesson name for the template
    if ($_POST['completedLesson'] == 1)
        $lesson_name = 'first lesson "Brain Architecture"';
    else if ($_POST['completedLesson'] == 2)
        $lesson_name = 'second lesson "Serve & Return"';
    else if ($_POST['completedLesson'] == 3)
        $lesson_name = ' lesson "Toxic Stress"';
    else if ($_POST['completedLesson'] == 4)
        $lesson_name = ' lesson "Child Neglect"';

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Congratulation " . $_COOKIE['name'] . ", you've completed lesson " . $_POST['completedLesson'] . ". Check out the badge you've earned!";
    $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Test HTML Template</title>
        </head>
        <body style="margin: 0;">
            <center style="margin: 0;">
                <table style="border-collapse: collapse;">
                    <tr style="width: 100%;">
                        <td>
                            <img src="https://pedassist.in/images/badge.png" style="
                                                                                    display: block;
                                                                                    margin-left: auto;
                                                                                    margin-right: auto;
                                                                                    width: 252px; 
                                                                                    height: 244px; 
                                                                                    padding-block: 15px;
                            ">
                        </td>
                    </tr>
                    <tr style="width: 100%;">
                        <td>
                            <img src="https://pedassist.in/images/congratulations_text.png" style="
                                                                                    display: block;
                                                                                    margin-left: auto;
                                                                                    margin-right: auto;
                                                                                    width: 294px; 
                                                                                    height: 121px; 
                                                                                    padding-block: 15px;
                            ">
                        </td>
                    </tr>
                    <tr style="width: 100%">
                        <td>    
                            <p style="
                                    display: block;
                                    margin: 0;
                                    margin-left: auto;
                                    margin-right: auto;
                                    width: fit-content;
                                    font-size: 24px;
                                    font-weight: bold; 
                                    color: #16CFFA; 
                                    font-family: Montserrat;
                                    font-size: 45px;
                                    text-align: center;
                            ">
                            TANMAY SINGHANIA
                            </p>
                        </td>
                    </tr>
                    <tr style="width: 100%">
                        <td>    
                            <p style="
                                    width: 544px; 
                                    font-size: 20px; 
                                    color: #FD6062; 
                                    font-family: Montserrat;
                                    text-align: center;
                            ">
                                You have done an excellent work and have successfully completed the 
                                ' . $lesson_name . '
                            </p>
                        </td>
                    </tr>
                    <tr style="width: 100%;">
                        <td>
                            <img src="https://pedassist.in/images/pedassist_stamp.png" style="
                                                                                    width: 218px; 
                                                                                    height: 133px; 
                                                                                    padding-block: 15px;
                            ">
                        </td>
                    </tr>
                </table>
        </center>
        </body>
        </html>
    ';

                // "<h3>Here you have a badge that you have earned on completion of lesson " . $_POST['completedLesson'] . " </h3> 
                // <p>This is an official email by PEDASSIST team. Enjoy your day!!</p> ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
