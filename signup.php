<?php
// // Creating temporary variables for storing the email id, username and password
$email = $name = $password = $cpassword = "";

// // Creating variable for storing the beginning lesson number
// $last_lesson_no = 1;

// // Creating variables to store the errors
// $errors = array('name' => '', 'email' => '', 'password' => '', 'profile_pic' => '', 'cpassword' => '');
$errors = array( 'profile_pic' => '');

// if (isset($_POST['submit'])) {
//     // Connect to the database
//     $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

//     $name = $_POST['name-input'];

//     // Validating the email by adding filter
//     if (!filter_var($_POST['email-input'], FILTER_VALIDATE_EMAIL)) {
//         $errors['email'] = "Enter a valid email address !";
//     }
//     // If the email is valid, variable will be assigned the value of email
//     else {
//         $email = $_POST['email-input'];
//     }

    if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"] != "") {

        // variables to store file information suah as name, temperary location, file type, 
        // size, error if it occurs.            
        $fileName = $_FILES["profile_pic"]["name"];
        $fileTmpLoc = $_FILES["profile_pic"]["tmp_name"];
        $fileType = $_FILES["profile_pic"]["type"];
        $fileSize = $_FILES["profile_pic"]["size"];
        $fileErrorMsg = $_FILES["profile_pic"]["error"];

        // separating file name and extention as two differnt values in the array
        // and taking the extention.
        $kaboom = explode(".", $fileName);
        $fileExt = end($kaboom);

        // check for file size or other errors
        list($width, $height) = getimagesize($fileTmpLoc);
        if ($width < 10 || $height < 10) {
            $errors['profile_pic'] = "That image has no dimentions.";
            echo "<script> console.log('That image has no dimentions.'); setFormMessage('.profile_pic_error','That image has no dimentions.');</script>";
        } else if ($fileSize > 1048576) {
            $errors['profile_pic'] = "File size greater than 1 MB.";
            echo "<script> console.log('File size greater than 1 MB.'); setFormMessage('.profile_pic_error','File size greater than 1 MB.');</script>";
        } else if ($fileErrorMsg == 1) {
            $errors['profile_pic'] = "Some unknown error occured.";
            echo "<script> console.log('Some unknown error occured.'); setFormMessage('.profile_pic_error','Some unknown error occured.');</script>";
        }

        $db_file_name = $name . "." . $fileExt;

        $targetDir = "uploads/" . $db_file_name;
        // moving the file to a location in website folder 
        $moveResult = move_uploaded_file($fileTmpLoc, $targetDir);
        if ($moveResult != true) {
            $errors['profile_pic'] = "File upload failed.";
            echo "<script>console.log('File upload failed.');  setFormMessage('.profile_pic_error','File upload failed.')</script>";

        }

//         // resizing the existing file
//         // include_once("../PEDASSIST_V1.1/assets/image_resize.php");
//         // $target_file = $targetDir;
//         // $resized_file = $targetDir;
//         // $wmax = 200;
//         // $hmax = 300;
//         // img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);


    }

//     // Validating the password by adding filter
//     if (!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $_POST['password-input'])) {
//         $errors['password'] = "Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters";
//     }

//     // If the password is valid,a variable will be assigned the value of password
//     else {
//         $password = $_POST['password-input'];
//     }

//     // Showing error in conform section if the password in the password section fullfills the criteria 
//     // but password in conform password section does not matches it 
//     if ($_POST['password-input'] != $_POST['conf-password-input'] && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $_POST['password-input'])) {
//         $errors['cpassword'] = "Passwords do not match !";
//     }

//     if (!$conn) {
//         echo 'Connection error:' . mysqli_connect_error();
//     }
//     // if there are no errors in the $error array and connection is established with database,
//     // $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
//     else if (!array_filter($errors)) {
//         if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"] != "") {
//             $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('$email', '$password', '$name', '$last_lesson_no', '$db_file_name')";
//         } else {
//             $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO) VALUES('$email', '$password', '$name', '$last_lesson_no')";
//         }

//         if (mysqli_query($conn, $sql)) {
//             setcookie('email', $email, time() + (60 * 60 * 24 * 30));
//             setcookie('name', $name, time() + (60 * 60 * 24 * 30));
//             $cookie = 1;

//             // header('location:index.php');
//             die();
//         } else {
//             echo 'query error;' . mysqli_error($conn);
//         }

//         //free result from memory
//         $conn->close();
//     } else {
//         header('location:index.php');
//         die();
//     }
// }
if (!defined('allow')) {
    die('Access Denied..........');
}
?>
<div class="signup_popup">
    <div class="background"></div>
    <!-- SIGNUP FORM -->
    <form name="form_sign_up" method="POST" enctype="multipart/form-data" class="form_sign_up">
        <div class="main-container-sign-up" id="main-container-sign-up">

            <!-- CREDENTIAL SECTION -->
            <div class="credentials" style="padding-block: 2.5%;">

                <!--  for mobile mode  CROSS MARK -->
                <div title="close" class="xmark_mobile xmark" onclick="loginSignUpClose()">
                    <svg class="cross" aria-hidden="true" width="20" height="20" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="black" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                    </svg>
                </div>

                <!-- HEADING -->
                <h1 style="letter-spacing: 1px;">Sign Up</h1>

                <!-- SOCIAL MEDIA BUTTONS -->
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
               
                <!-- <div class="social-btns-container" style="margin-block: 5%;">                  -->
                    <!-- <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-fb.svg">
                    </div> -->
                    <!-- <div class=" g-signin2" data-onsuccess="onSignIn"> -->
                        <!-- <img src="LOGIN_SIGNUP/btn-google.svg"> -->
                    <!-- </div> -->
                <!-- </div> -->

                <!-- <p class="user_acc_txt">or use your account</p> -->

                <!-- USER NAME -->
                <div class="input-box" name="input-box">
                    <input type="name" value="<?php echo htmlspecialchars($name) ?>" name="name-input" class="name-input form__input" id="sign-up-name-input" required>
                    <label>User Name <strong style=" color:red;">*</strong></label>
                </div>
                <!-- error message -->
                <div class="name_error error_msg" style=" color:red; "></div>

                <!-- EMAIL -->
                <div class="input-box" name="input-box">
                    <input type="text" value="<?php echo htmlspecialchars($email) ?>" name="email-input" class="email-input form__input" id="sign-up-email-input" required>
                    <label>Email <strong style=" color:red;">*</strong></label>
                </div>
                <!-- error message -->
                <div class="email_error error_msg" style=" color:red; "></div>

                <p class="instruction">
                    Must contain atleast 8 characters, an uppercase, a lowercase, a number and a special character.
                </p>

                <!-- PASSWORD -->
                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($password) ?>" name="password-input" class="password-input form__input" id="sign-up-password-input" required>
                    <label>Password <strong style=" color:red;"> *</strong></label>
                </div>
                <!-- error message -->
                <div class="password_error error_msg" style=" color:red; font: size 1px;"></div>

                <!-- CONFIRM PASSWORD -->
                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($cpassword) ?>" name="conf-password-input" class="conf-password-input form__input" id="conf-password-input" required>
                    <label>Confirm Password <strong style="color:red;">*</strong></label>
                </div>
                <!-- error message -->
                <div class="cpassword_error error_msg" style="color:red;"></div>

                <!-- SHOW PASSWORD BUTTON -->
                <div class="show_password" style="font-size: 14px;">
                    &nbsp<input type="checkbox" onclick="showPassword()"> &nbsp <small>Show Password</small>
                </div>

                <!-- PROFILE IMG-->
                <div class="profile_image_upload" name="input-box" style="text-align: left;">
                    <label style="font-size: 16px;">Add a profile picture <small>(less than 1 Mb)</small></label>
                    <input type="file" name="profile_pic" accept=".png, .jpeg, .jpg" class="form-control" id="profile-image-input">
                </div>
                <!-- error message -->
                <div class="profile_image_error" style=" color:red; "><?php echo $errors['profile_pic'] ?></div>

                <!-- SIGN UP BUTTON -->
                <div class="btn-container">
                    <input title="Sign Up" type="button" name="submit" value="Sign Up" class="signup-submit-btn">
                </div>

                <!-- SIGNUP FOR MOBILE MODE -->
                <small class=" hidden_btn_mobile" onclick="toggleLoginSignupForm(0)"><u>Login</u></small>
                </div>

                <div class="form_description_container">
                    <div class="xmark" onclick="loginSignUpClose()">
                        <svg class="cross" aria-hidden="true" width="20" height="20" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path fill="black" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                        </svg>
                    </div>
                    <!--FORM DESCRIPTION SECTION -->
                    <div class="form_description">
                        <h1>PEDASSIST</h1>
                        <h3>Sign Up to complete your journey of becoming a perfect parent &nbsp : )</h3>
                        <div class="btn-container">
                            <div><small>Already have an account?</small></div>
                            <button title="Move to login form" class="btn-login" onclick="toggleLoginSignupForm(0)">Login</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>