<?php define('allow', true); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="91726057228-j16ha0k20vi4mu4d58scpqe1csuq6eni.apps.googleusercontent.com">

    <title>PEDASSIST | ASSESSMENT</title>

    <link rel="shortcut icon" type="image/png" href="images/pedassist_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>

    <link rel="stylesheet" href="assessment.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="edit_profile.css">

</head>

<body>

    <?php include('assets/headernav.php'); ?>
    <?php include('edit_profile.php'); ?>


    <!-- MAIN PAGE CONTENT -->
    <main>
        <div class="page_description">

            <!-- PAGE TITLE -->
            <div class="page_name animate__animated animate__fadeInLeft">
                <div class="page_title">
                    <h1>TEST<br>TIME</h1>
                </div>
            </div>
            <div class="page_image animate__animated animate__fadeInRight"></div>

        </div>

        <!-- LESSON TRACK -->
        <div class="track">
            <div class="lesson_1 animate__animated animate__fadeInUp">
                <div class="mcq_btn mcq_btn_l" data-number="1">
                    <h2>LESSON ONE</h2>
                    <div class="indicator_lesson_1 indicator "></div>
                </div>
                <svg width="213" height="86" viewBox="0 0 213 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1C51.8857 93.8924 161.992 114.793 212 38.157" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>

            <div class="lesson_2 animate__animated animate__fadeInDown">
                <svg width="212" height="76" viewBox="0 0 212 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 75C51.589 -13.8856 163.552 -17.4848 211 36.5038" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
                <div class="mcq_btn mcq_btn_r" data-number="2">
                    <div class="indicator_lesson_2 indicator"></div>
                    <h2>LESSON TWO</h2>
                </div>
            </div>
            <div class="lesson_3 animate__animated animate__fadeInUp">
                <div class="mcq_btn mcq_btn_l" data-number="3">
                    <h2>LESSON THREE</h2>
                    <div class="indicator_lesson_3 indicator"> </div>
                </div>
                <svg width="213" height="86" viewBox="0 0 213 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1C51.8857 93.8924 161.992 114.793 212 38.157" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
            <div class="lesson_4 animate__animated animate__fadeInDown ">
                <svg width="212" height="76" viewBox="0 0 212 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 75C51.589 -13.8856 163.552 -17.4848 211 36.5038" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
                <div class="mcq_btn mcq_btn_r" data-number="4">
                    <div class="indicator_lesson_4 indicator"></div>
                    <h2>LESSON FOUR</h2>
                </div>
            </div>
            <div class="congrats animate__animated animate__fadeInUp">
                <!-- <div class="indicator_congrats"> </div> -->
                <a href="badge_page.php">
                    <img src="ASSESMENT/giftbox.png" alt="">
                </a>
            </div>
        </div>
    </main>

    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="assessment.js"></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
    <script type="text/javascript" src="edit_profile.js"></script>

    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            console.log("cookie_info = " + cookie_info);
            hideLoginButton(cookie_info);
            // displayLoginSignupFormWithDelay(cookie_info);
            // signUpOrLoginToContinue(cookie_info);
        }
        sendCookieInfo();
    </script>
</body>

</html>