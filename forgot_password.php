<?php

// defining necessery variables
$_POST['success']  = "";
// $part = "1";
$error_message = "";

// establish connection with the database.
$conn = mysqli_connect("localhost", "mayani", "180122", "pedassist");
// $part = $part . "2";


if (!empty($_POST["submit_email"]) && $conn) {

    $result = mysqli_query($conn, "SELECT * FROM login_credentials WHERE email='" . $_POST["email"] . "'");
    $count  = mysqli_num_rows($result);
    if ($count > 0) {
        // $part = $part . "4";
        // generate OTP
        $otp = rand(100000, 999999);
        // Send OTP
        require_once("mail_otp_function.php");
        $mail_status = sendOTP($_POST["email"], $otp);
        // $part = $part . "5";

        if ($mail_status == 1) {
            // $part = $part . "6";

            $result = mysqli_query($conn, "INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s") . "')");
            // $part = $part ."  result: ". $result ." ";
            $current_id = mysqli_insert_id($conn);
            if (!empty($current_id)) {
                $_POST['success'] = 1;
                session_start();    
                $_SESSION['Login_email'] = $_POST["email"];
            }
        }
    } else {
        $error_message = "Email not exists!";
    }
}
if (!empty($_POST["submit_otp"])) {
    $result = mysqli_query($conn, "SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
    $count  = mysqli_num_rows($result);
    if (!empty($count)) {
        $result = mysqli_query($conn, "UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
        session_start();    
        include('assets/login_without_password.php');
        login_without_password($_SESSION['Login_email']);
        $_POST['success']  = 2;
    } else {
        $_POST['success']  = 1;
        $_SESSION['Login_email'] = $_POST["email"];
        $error_message = "Invalid OTP!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="shortcut icon" type="image/png" href="images/pedassist_favicon.png">
    <link rel="stylesheet" href="forgot_password.css">

</head>

<body>
    <?php
    if (!empty($error_message)) {
    ?>
        <div class="message error_message"><?php echo $error_message; ?></div>
    <?php
    }
    ?>

    <form name="frmUser" method="post" action="">
        <div class="tblLogin">
            <?php
            if (!empty($_POST['success']  == 1)) {
                echo "email : " . $_POST["email"];
            ?>
                <div class="tableheader">Enter OTP</div>
                <p style="color:#31ab00;">Check your email for the OTP</p>

                <div class="tablerow">
                    <input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
                </div>
                <div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
            <?php
            } else if ($_POST['success']  == 2) {
            ?>
                <p style="color:#31ab00;">Welcome, You have successfully loggedin!</p>
            <?php
            } else {

            ?>

                <div class="tableheader">Enter Your Login Email</div>
                <!-- <div class="tableheader">to recieve OTP</div> -->
                <div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
                <div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btnSubmit"></div>
            <?php
            }
            ?>
        </div>
    </form>
</body>

</html>