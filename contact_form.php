<?php define('allow', true); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Pedassist</title>

    <link rel="shortcut icon" type="image/png" href="images/pedassist_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>

    <link rel="stylesheet" href="contact_form.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php include('assets/headernav.php'); ?>

    <!-- BACKGROUND BLOB -->
    <img class="bg_blob" src="SVG/blob.svg" alt="">

    <!-- MAIN PAGE CONTENT -->
    <main>
        <div class="contact_form_container">
            <div class="contact_form_img"></div>

            <!-- CONTACT US FORM -->
            <form action="" id="contact_form">

                <!-- HEADING -->
                <h2 class="contact_form_title">GET IN TOUCH !</h2>

                <!-- NAME INPUT -->
                <input name="name" type="text" id="contact_form_name" placeholder="Your Name">
                <p class="contact_form_name_error" >wesdfghjk</p>

                <!-- EMAIL INPUT -->
                <input name="email" type="email" id="contact_form_email" placeholder="Email id">
                <p class="contact_form_email_error" ></p>

                <!-- PHONE NO. INPUT -->
                <input name="phone-number" type="phone" id="contact_form_pnone_no" placeholder="Phone No.">
                <p class="contact_form_phone_error" ></p>

                <!-- EMAIL MESSAGE INPUT -->
                <label for="email_message">message</label>
                <textarea name="email_message" id="contact_form_email_mgs" placeholder="How can we help you?" cols="30" rows="10"></textarea>

                <!-- SEND BUTTON -->
                <button name="send" class="contact_form_submit" id="contact_form_submit" type="submit">SEND</button>

            </form>

            <!-- SOCIAL MEDIA CONTACTS -->
            <div class="contact_form_social_media">
                <!-- PEDASSIST INSTAGRAM -->
                <div class="contact_form_insta">
                    <a href="">
                        <img src="CONTACT/insta.svg" alt="">
                    </a> 
                </div>
                <!-- PEDASSIST FACEBOOK -->
                <div class="contact_form_fb">
                    <a href="">
                        <img src="CONTACT/facebook.svg" alt="">
                    </a> 
                </div>
                <!-- PEDASSIST LINKEDIN -->
                <div class="contact_form_linkedin">
                    <a href="">
                        <img src="CONTACT/linkedin.svg" alt="">
                    </a> 
                </div>
                <!-- PEDASSIST YOUTUBE -->
                <div class="contact_form_youtube"> 
                    <a href="">
                        <img src="CONTACT/youtube.svg" alt="">
                    </a> 
                </div>
            </div>

        </div>
        
    </main>

    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="contact_form.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            console.log("cookie_info = " + cookie_info);
            hideLoginButton(cookie_info);

            // if(cookie_info){
            //     document.getElementById('contact_form_name').value = "<?php echo $_COOKIE["name"] ?>";
            //     document.getElementById('contact_form_email').value = "<?php echo $_COOKIE["email"] ?>";
            // }
            // displayLoginSignupFormWithDelay(cookie_info);
            // signUpOrLoginToContinue(cookie_info);
        }
        sendCookieInfo();
    </script>
</body>

</html>