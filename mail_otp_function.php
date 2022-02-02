<?php	
	function sendOTP($email,$otp) {
        require("PHPMailer/src/PHPMailer.php");
        require("PHPMailer/src/SMTP.php");
        require("PHPMailer/src/Exception.php");
    
	
		$mail = new  PHPMailer\PHPMailer\PHPMailer(true);

     try{  
		 //Server settings
         $mail->SMTPDebug  = 0;                                       //Enable verbose debug output
         $mail->isSMTP();                                             //Send using SMTP
         $mail->Host       = 'pedassist.in';                        //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
         $mail->Username   = 'team@pedassist.in';               //SMTP username
         $mail->Password   = 'PED@SSIST180122';                           //SMTP password
         $mail->SMTPSecure = "ssl";                                   //Enable implicit TLS encryption
         $mail->Port       = 465;            

        //Recipients
		$mail->setFrom('team@pedassist.in', 'Team Pedassist');
		$mail->addAddress($email);

		// $mail->MsgHTML($message_body);
		$mail->isHTML(true);

        // Mail content
		$mail->Subject = "OTP to Login to your PEDASSIST account";
		$mail->Body = "One Time Password for your login authentication is:<br/><br/>" . $otp;
        
        // send otp in mail
		$result = $mail->send();
		
		return $result;
	} catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>