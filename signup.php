<?php 
    // Creating temporary variables for storing the email id, username and password
    $email = $name = $password = $cpassword = "";

    // Creating variables for storing 
    $last_lesson_no = 1;
    $errors = array('email'=>'', 'password'=>'', 'cpassword'=>'');


    if(isset($_POST['submit'])){
        // connect to the database
        $conn= mysqli_connect('localhost', 'mayani', '2002','pedassist' );

        $name = $_POST['name-input'];

        // validating the email by adding filter
        if(!filter_var($_POST['email-input'], FILTER_VALIDATE_EMAIL)){
            $errors['email']="Enter a valid email address !";
        }
        // if the email is valid, variable will be assigned the value of email
        else{
            $email=$_POST['email-input'];
        }

        // validating the password by adding filter
        if(!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$_POST['password-input'])){
            $errors['password']="Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters";
        }
        // if the password is valid,a variable will be assigned the value of password
        else{
            $password=$_POST['password-input'];
        }

        // showing error in conform section if the password in the password section fullfills the criteria 
        // but password in conform password section does not matches it 
        if($_POST['password-input']!=$_POST['conf-password-input'] && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$_POST['password-input'])){
            $errors['cpassword']="Both the password are different , enter same passwords!!";
        }

        if(!$conn){
            echo 'Connection error:' . mysqli_connect_error();
        }       
        // if there are no errors in the $error array and connection is established with database,
        // $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
        else if(!array_filter($errors)){

            $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO) VALUES('$email', '$password', '$name')";

            if(mysqli_query($conn,$sql)){

                setcookie('email', $email,time()+(60*60*24*30));
                setcookie('name', $name,time()+(60*60*24*30));
                $cookie = 1;
                echo '<script type="text/javascript" src="questions.js"></script>';
                echo 
                "<script type='text/javascript'>
                    function sendLastLessonNumber() {
                        receieveLessonNumber({$lesson})
                    }
                </script>";
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
   
    <!-- SIGNUP FORM -->
    <form name="form_sign_up" action="signup.php" method="POST">
        <div class="main-container-sign-up" id="main-container-sign-up">

            <!-- CREDENTIAL SECTION -->
            <div class="credentials" style="padding-block: 2.5%;">

                <!-- HEADING -->
                <h1 style="letter-spacing: 1px;">Sign Up</h1>

                <!-- SOCIAL MEDIA BUTTONS -->
                <div class="social-btns-container" style="margin-block: 5%;">                 
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-fb.svg">
                    </div>
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-google.svg">
                    </div>
                </div>

                <p class="user_acc_txt">or use your account</p>

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

                <!-- PASSWORD -->

                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($password) ?>" name="password-input" class="password-input" id="sign-up-password-input" required>
                    <label>Password</label>
                </div>
                <div style=" color:red; font: size 1px;"><?php echo $errors['password'] ?></div>

                <!-- CONFORM PASSWORD -->

                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($cpassword) ?>" name="conf-password-input" class="conf-password-input" id="conf-password-input" required>
                    <label>Confirm Password</label>
                </div>
                <div style=" color:red;"><?php echo $errors['cpassword'] ?></div>

                <!-- SHOW PASSWORD BUTTON -->

                <div class="show_password">
                &nbsp<input type="checkbox" onclick="showPassword()"> &nbsp <small>Show Password</small>
                </div>

                <!-- FORGOT PASSWORD -->

                <p class="forgot-password">Forgot your password?</p>

                <!-- LOGIN BUTTON -->

                <div class="btn-container">
                    <input type="submit" name="submit" value="Submit" class="btn-login"  onclick="displayLoginSignupForm('<?php echo $cookie;?>')"">
                </div>
            </div>

        
                <!--FORM DESCRIPTION SECTION -->
                <div class="form_description">
                <div class="xmark" >
                    <img src="SVG/xmark-solid.svg" alt="" onclick="xmark()">
                </div>
                <h1>PEDASSIST</h1>
                <h3>Signup toto complete your journey of becoming a perfect parent &nbsp : &nbsp )</h3>
                <div class="btn-container">
                    <div >
                        <small >  Already have an account?</small>
                    </div>
                    <div class="btn-login" onclick="toggleLoginSignupForm(0)">Login</div>
                </div>

            </div>
        </div>
    </form>
</div>