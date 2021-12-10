<?php 

    $email=$password="";
    $errors = array( 'email'=>'', 'password'=>'');


    if(isset($_POST['submit'])){
        // connect to the database
        $conn= mysqli_connect('localhost', 'mayani', '2002','pedassist' );
    
        // validating the email by adding filter
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $errors['email']="Enter a valid email address !";
        }
        // if the email is valid, variable will be assigned the value of email
        else{
            $email=$_POST['email'];
        }
        
        
        // validating the password by adding filter
        if(!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',$_POST['password'])) {
            $errors['password']="Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters";
        }
        // if the password is valid,a variable will be assigned the value of password
        else {
            $password=$_POST['password'];
        }

        if(!$conn) {
            echo 'Connection error:' . mysqli_connect_error();
        }
        else if(!array_filter($errors)) {

            $sql = "SELECT * FROM login_credentials where EMAIL = '$email' and PASSWORD = '$password' ";
            $res = mysqli_query($conn,$sql);

            if(!$res ){
                echo 'query error;' . mysqli_error($conn);
            }
            else if(mysqli_num_rows($res)>0){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['email'] = $row['EMAIL'];
                setcookie('email', $row['EMAIL'],time()+(60*60*24*30));
                setcookie('name', $row['USER_NAME'],time()+(60*60*24*30));
                $cookie = 1;
                header('location:index.php');
                die();
            } 
            else{
                echo "Please Enter Valid Login Details.";
            }
        }

        //free result from memory
        $conn->close();
        
    }
    if(!defined('allow')){
        die('Access Denied..........');
    }

?>

<div class="login_popup">

    <!-- LOGIN FORM -->
    
    <form name="form_login" action="login.php" method="POST">

        <div class="main-container-login" id="main-container-login">

            <!-- CREDENTIAL SECTION -->
            <div class="credentials">

                <!-- HEADING -->
                <h1 style="letter-spacing: 1px;">Login</h1>
                
                <!-- SOCIAL MEDIA LOGIN  -->
                <div class="social-btns-container">
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-fb.svg">
                    </div>
                    
                    <div class="social-btn-bg">
                        <img src="LOGIN_SIGNUP/btn-google.svg">
                    </div>
                </div>

                <p style="font-size: 14px;text-align: center;">or use your account</p>

                <!-- EMAIL INPUT -->
                <div class="input-box" name="input-box">
                    <input type="text" value="<?php echo htmlspecialchars($email) ?>" name="email" class="email-input" id="login-email-input" required>
                    <label>Email</label>
                </div>
                <div style=" color:red; "><?php echo $errors['email'] ?></div>

                <!-- PASSWORD -->
                <div class="input-box" name="input-box">
                    <input type="password" value="<?php echo htmlspecialchars($password) ?>" name="password" class="password-input" id="login-password-input" required>
                    <label>Password</label>
                </div>
                <div style=" color:red; font: size 1px;"><?php echo $errors['password'] ?></div>
               
                <!-- SHOW PASSWORD BUTTON -->
                <div class="show_password">
                &nbsp<input type="checkbox" onclick="showPassword()"> &nbsp <small>Show Password</small>
                </div>

                <!-- FORGOT PASSWORD -->
                <p class="forgot-password">Forgot your password?</p>
                
                <!-- LOGIN BUTTON -->
                <div class="btn-container">
                    <input name="submit" type="submit" value="Login" class="btn-login" onclick="displayLoginSignupForm('<?php echo $cookie;?>')">
                </div>
               
            </div>

            <!--FORM DESCRIPTION SECTION -->
            <div class="form_description">
                <div class="xmark" >
                    <img src="SVG/xmark-solid.svg" alt="" onclick="xmark()">
                </div>

                <h1>PEDASSIST</h1>
                <h3>You need to login to complete the course and track your progress &nbsp : &nbsp )</h3>
                <div class="btn-container">
                    <div >
                        <small >  Haven't made an account? &nbsp &nbsp</small>
                    </div>
                    <div class="btn-login" onclick="toggleLoginSignupForm(1)">SignUp</div>
                </div>

            </div>
        </div>
    </form>
</div>