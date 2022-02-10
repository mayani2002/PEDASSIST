<?php	
	function send($name,$email,$phone_no,$message) {
        require("PHPMailer/src/PHPMailer.php");
        require("PHPMailer/src/SMTP.php");
        require("PHPMailer/src/Exception.php");
    
	
		$mail = new  PHPMailer\PHPMailer\PHPMailer(true);

     try{  
		 //Server settings
         $mail->SMTPDebug  = 0;                                       //Enable verbose debug output
         $mail->isSMTP();                                             //Send using SMTP
         $mail->Host       = 'pedassist.in';                          //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
         $mail->Username   = 'team@pedassist.in';                     //SMTP username
         $mail->Password   = 'PED@SSIST180122';                       //SMTP password
         $mail->SMTPSecure = "ssl";                                   //Enable implicit TLS encryption
         $mail->Port       = 465;            

        //Recipients
		$mail->setFrom($email, $name);
		$mail->addAddress('team.pedassist@gmail.com');

		// $mail->MsgHTML($message_body);
		$mail->isHTML(true);

        // Mail content
		$mail->Subject = $name." trying to contact";
		$mail->Body = "Email : ".$email."<br> Name : ".$name."<br> Phone No. : ".$phone_no."<br> Message : ".$message;
        
        // send otp in mail
		$result = $mail->send();
		
		echo "1";
	} catch (Exception $e) {
        echo "0";
    }
}
?>