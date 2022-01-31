<?php
    // Importing the PHPMailer and SMTP class files
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    try {
        //Server settings
        $mail->SMTPDebug  = 1;                                       //Enable verbose debug output
        $mail->isSMTP();                                             //Send using SMTP
        $mail->Host       = 'pedassist.in';                        //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
        $mail->Username   = 'team@pedassist.in';               //SMTP username
        $mail->Password   = 'PED@SSIST180122';                           //SMTP password
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
            $lesson_name = 'third lesson "Toxic Stress"';
        else if ($_POST['completedLesson'] == 4)
            $lesson_name = 'fourth lesson "Child Neglect"';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Congratulations " . $_COOKIE['name'] . ", you've completed lesson " . $_POST['completedLesson'] . ". Check out the badge you've earned!";
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
                            <td colspan="2">
                                <img src="https://pedassist.in/images/badge_' . $_POST["completedLesson"] . '.png" 
                                    style="
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
                            <td colspan="2">
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
                            <td colspan="2">    
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
                                ' . $_COOKIE["name"] . '
                                </p>
                            </td>
                        </tr>
                        <tr style="width: 100%">
                            <td colspan="2">    
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
                            <td style="width: 50%;">
                                <center>
                                    <img src="https://pedassist.in/images/pedassist_stamp.png" style="
                                                                                            width: 218px; 
                                                                                            height: 133px; 
                                                                                            padding-block: 15px;
                                    ">
                                </center>
                            </td>
                            <td style="width: 50%;">
                                <center>
                                    <table style="border-collapse: collapse;">
                                        <tr style="width: 100%;">
                                            <td colspan="3">
                                                <p style="
                                                    text-align: center; 
                                                    font-family: Sniglet;
                                                    font-size: 33px;
                                                    color: #FD6062;
                                                    margin-bottom: 10px;
                                                ">
                                                    PEDASSIST
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="width: 100%;">
                                            <td>
                                                <a href=""><img src="https://pedassist.in/images/email.png" style="width: 36px; height: 36px;"></a>
                                            </td>
                                            <td>
                                                <a href=""><img src="https://pedassist.in/images/instagram.png" style="margin-inline: 27px;width: 36px; height: 36px;"></a>
                                            </td>
                                            <td>
                                                <a href=""><img src="https://pedassist.in/images/linkedin.png" style="width: 36px; height: 36px;"></a>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </table>
            </center>
            </body>
            </html>
        ';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>