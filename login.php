<?php

$email = $password = "";
$errors = array('email' => '', 'password' => '');


// if (isset($_POST['submit'])) {
//     // connect to the database
//     $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

//     // validating the email by adding filter
//     if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//         $errors['email'] = "Enter a valid email address !";
//     }
//     // if the email is valid, variable will be assigned the value of email
//     else {
//         $email = $_POST['email'];
//     }


//     // validating the password by adding filter
//     if (!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $_POST['password'])) {
//         $errors['password'] = "Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters";
//     }
//     // if the password is valid,a variable will be assigned the value of password
//     else {
//         $password = $_POST['password'];
//     }

//     if (!$conn) {
//         echo 'Connection error:' . mysqli_connect_error();
//     } else if (!array_filter($errors)) {

//         $sql = "SELECT * FROM login_credentials where EMAIL = '$email' and PASSWORD = '$password' ";
//         $res = mysqli_query($conn, $sql);

//         if (!$res) {
//             echo 'query error;' . mysqli_error($conn);
//         } else if (mysqli_num_rows($res) > 0) {
//             $row = mysqli_fetch_assoc($res);
//             $_SESSION['email'] = $row['EMAIL'];
//             setcookie('email', $row['EMAIL'], time() + (60 * 60 * 24 * 30));
//             setcookie('name', $row['USER_NAME'], time() + (60 * 60 * 24 * 30));
//             $cookie = 1;
//             header('location:index.php');
//             die();
//         } else {
//             echo "Please Enter Valid Login Details.";
//         }
//     }

//     //free result from memory
//     $conn->close();
// }
// if (!defined('allow')) {
//     die('Access Denied..........');
// }

?>

<div class="login_popup">
    <div class="background"></div>
    <!-- LOGIN FORM -->
    <form class="form_login" name="form_login" action="login.php" method="POST">
        <div class="main-container-login" id="main-container-login">

            <!-- CREDENTIAL SECTION -->
            <div class="credentials">

                <!--  (for mobile mode)  CROSS MARK -->
                <div class="xmark_mobile xmark" onclick="loginSignUpClose()">
                    <svg class="cross" aria-hidden="true" width="20" height="20" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="black" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                    </svg>
                </div>

                <!-- HEADING -->
                <h1 style="letter-spacing: 1px;">Login</h1>

                <!-- SOCIAL MEDIA LOGIN  -->
                <!-- <div class="social-btns-container">
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-fb.svg">
                    </div>

                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-google.svg">
                    </div>
                </div> -->

                <!-- <p style="font-size: 14px;text-align: center;">or use your account</p> -->

                <!-- EMAIL INPUT -->
                <div class="input-box" name="input-box">
                    <input type="text" value="<?php echo htmlspecialchars($email) ?>" name="email" class="email-input" id="login-email-input" required>
                    <label>Email</label>
                </div>
                <div class="login_email_error" style=" color:red; "></div>
                <!-- PASSWORD -->
                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($password) ?>" name="password" class="password-input" id="login-password-input" required>
                    <label>Password</label>
                </div>
                <div class="login_password_error" style=" color:red; font: size 1px;"></div>

                <!-- SHOW PASSWORD BUTTON -->
                <div class="show_password">
                    &nbsp<input type="checkbox" onclick="showPassword()"> &nbsp <small>Show Password</small>
                </div>

                <!-- FORGOT PASSWORD -->
                <p class="forgot-password">Forgot your password?</p>

                <!-- LOGIN BUTTON -->
                <div class="btn-container">
                    <input name="submit" type="button" value="Login" class="login-submit-btn">
                </div>

                <div class="login_error" style=" color:red; font: size 1px;"></div>

                <!-- SIGNUP FOR MOBILE MODE -->
                    <small class="hidden_btn_mobile" onclick="toggleLoginSignupForm(1)"> <u>SignUp</u></small>

            </div>

            <!--FORM DESCRIPTION SECTION -->
            <div class="form_description_container">
                <div class="xmark" onclick="loginSignUpClose()">
                    <svg class="cross" aria-hidden="true" width="20" height="20" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="black" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                    </svg>
                </div>
                <div class="form_description">
                    <h1>PEDASSIST</h1>
                    <h3>You need to login to complete the course and track your progress &nbsp : )</h3>
                    <div class="btn-container">
                        <div>
                            <small>Haven't made an account? &nbsp &nbsp</small>
                        </div>
                        <div class="btn-login" onclick="toggleLoginSignupForm(1)">SignUp</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>