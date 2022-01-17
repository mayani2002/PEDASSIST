<?php 
    // Creating temporary variables for storing the email id, username and password
    $email = $name = $password = $cpassword = "";

    // Creating variable for storing the beginning lesson number
    $last_lesson_no = 1;

    // Creating variables to store the errors
    $errors = array('email'=>'', 'password'=>'', 'profile_pic'=>'', 'cpassword'=>'');


    if(isset($_POST['submit'])){
        // Connect to the database
        $conn= mysqli_connect('localhost', 'mayani', '2002','pedassist' );

        $name = $_POST['name-input'];

        // Validating the email by adding filter
        if(!filter_var($_POST['email-input'], FILTER_VALIDATE_EMAIL)){
            $errors['email']="Enter a valid email address !";
        }
        // If the email is valid, variable will be assigned the value of email
        else{
            $email=$_POST['email-input'];
        }

        if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"]!=""){
            
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
            list($width, $height)= getimagesize($fileTmpLoc);
            if($width<10 || $height < 10){
                $errors['profile_pic']="That image has no dimentions.";
            }
            else if($fileSize > 1048576){
                $errors['profile_pic']="File size greater than 1 MB.";
            }
            else if($fileErrorMsg ==1){
                $errors['profile_pic']="Some unknown error occured.";
            }

            $db_file_name = $name ."." .$fileExt;

            $targetDir = "uploads/".$db_file_name;
            // moving the file to a location in website folder 
            $moveResult = move_uploaded_file($fileTmpLoc, $targetDir);
            if($moveResult != true){
                $errors['profile_pic']="File upload failed.";
            }

            // resizing the existing file
            // include_once("../PEDASSIST_V1.1/assets/image_resize.php");
            // $target_file = $targetDir;
            // $resized_file = $targetDir;
            // $wmax = 200;
            // $hmax = 300;
            // img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

            
        }

        // Validating the password by adding filter
        if(!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$_POST['password-input'])){
            $errors['password']="Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters";
        }

        // If the password is valid,a variable will be assigned the value of password
        else{
            $password=$_POST['password-input'];
        }

        // Showing error in conform section if the password in the password section fullfills the criteria 
        // but password in conform password section does not matches it 
        if($_POST['password-input']!=$_POST['conf-password-input'] && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$_POST['password-input'])){
            $errors['cpassword'] = "Passwords do not match !";
        }

        if(!$conn){
            echo 'Connection error:' . mysqli_connect_error();
        }       
        // if there are no errors in the $error array and connection is established with database,
        // $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
        else if(!array_filter($errors)){

            $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('$email', '$password', '$name', '$last_lesson_no', '$db_file_name')";

            if(mysqli_query($conn, $sql)){
                setcookie('email', $email,time()+(60*60*24*30));
                setcookie('name', $name,time()+(60*60*24*30));
                $cookie = 1;     

                header('location:index.php');
                die();
                
            } 
            else{
                echo 'query error;' . mysqli_error($conn);
            }

            //free result from memory
            $conn->close();
        }
        
    }
    if(!defined('allow')){
        die('Access Denied..........');
    }
?>
<div class="signup_popup">
   <div class="background"></div>
    <!-- SIGNUP FORM -->
    <form name="form_sign_up" action="signup.php" method="POST"  enctype="multipart/form-data">
        <div class="main-container-sign-up" id="main-container-sign-up">

            <!-- CREDENTIAL SECTION -->
            <div class="credentials" style="padding-block: 2.5%;">

                 <!--  for mobile mode  CROSS MARK -->
                 <div class="xmark_mobile xmark" onclick="loginSignUpClose()">
                    <svg class="cross" aria-hidden="true" width="20" height="20" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="black" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                    </svg>
                </div>
                <!-- HEADING -->
                <h1 style="letter-spacing: 1px;">Sign Up</h1>

                <!-- SOCIAL MEDIA BUTTONS -->
                <!-- <div class="social-btns-container" style="margin-block: 5%;">                 
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-fb.svg">
                    </div>
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-google.svg">
                    </div>
                </div> -->

                <!-- <p class="user_acc_txt">or use your account</p> -->

                <!-- USER NAME -->
                <div class="input-box" name="input-box">
                    <input type="name" value="<?php echo htmlspecialchars($name) ?>" name="name-input" class="name-input" id="sign-up-name-input" required>
                    <label>User Name</label>
                </div>

                <!-- EMAIL -->

                <div class="input-box" name="input-box">
                    <input type="email" value="<?php echo htmlspecialchars($email) ?>" name="email-input" class="email-input" id="sign-up-email-input" required>
                    <label>Email</label>
                </div>
                <div style=" color:red; "><?php echo $errors['email'] ?></div>

                <!-- FILE -->
                <div class="input" name="input-box" style="text-align: left;">
                <label style="font-size: 16px;">Add a profile picture(Optional)</label>
                
                    <input input type="file" title = "Choose a video please" name="profile_pic" accept=".png,.jpeg,.svg,.gif,.jpg,.pdf" class="form-control" id="sign-up-file-input" >
                </div>
                <div style=" color:red; "><?php echo $errors['profile_pic'] ?></div>

                <!-- PASSWORD -->

                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($password) ?>" name="password-input" class="password-input" id="sign-up-password-input" required>
                    <label>Password</label>
                </div>
                <div style=" color:red; font: size 1px;"><?php echo $errors['password'] ?></div>

                <!-- CONFIRM PASSWORD -->
                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($cpassword) ?>" name="conf-password-input" class="conf-password-input" id="conf-password-input" required>
                    <label>Confirm Password</label>
                </div>
                <div style=" color:red;"><?php echo $errors['cpassword'] ?></div>

                <!-- SHOW PASSWORD BUTTON -->
                <div class="show_password" style="font-size: 14px;">
                &nbsp<input type="checkbox" onclick="showPassword()"> &nbsp <small>Show Password</small>
                </div>

                <!-- FORGOT PASSWORD -->
                <p class="forgot-password">Forgot your password?</p>

                <!-- LOGIN BUTTON -->
                <div class="btn-container">
                    <input type="submit" name="submit" value="Submit" class="btn-login"  onclick="displayLoginSignupForm('<?php echo $cookie;?>')"">
                </div>

                 <!-- SIGNUP FOR MOBILE MODE -->
                 <small class="hidden_btn_mobile" onclick="toggleLoginSignupForm(0)"> <u>Login</u></small>
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
                        <div class="btn-login" onclick="toggleLoginSignupForm(0)">Login</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>