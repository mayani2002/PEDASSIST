<?php define('allow', true); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDASSIST | ASSESSMENT</title>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="assessment.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

    <?php include('assets/headernav.php'); ?>

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
                <div class="mcq_btn mcq_btn_l" onclick="document.location.href='questions.php?lesson=1'">
                    <h2>LESSON ONE</h2>
                    <div class="indicator_lesson_1"></div>
                </div>
                <svg width="213" height="86" viewBox="0 0 213 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1C51.8857 93.8924 161.992 114.793 212 38.157" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>

            <div class="lesson_2 animate__animated animate__fadeInDown">
                <svg width="212" height="76" viewBox="0 0 212 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 75C51.589 -13.8856 163.552 -17.4848 211 36.5038" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
                <div class="mcq_btn mcq_btn_r" onclick="document.location.href='questions.php?lesson=2'">
                    <div class="indicator_lesson_2"></div>
                    <h2>LESSON TWO</h2>
                </div>
            </div>
            <div class="lesson_3 animate__animated animate__fadeInUp">
                <div class="mcq_btn mcq_btn_l" onclick="document.location.href='questions.php?lesson=3'">
                    <h2>LESSON THREE</h2>
                    <div class="indicator_lesson_3"></div>
                </div>
                <svg width="213" height="86" viewBox="0 0 213 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1C51.8857 93.8924 161.992 114.793 212 38.157" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
            <div class="lesson_4 animate__animated animate__fadeInDown">
                <svg width="212" height="76" viewBox="0 0 212 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 75C51.589 -13.8856 163.552 -17.4848 211 36.5038" stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
                <div class="mcq_btn mcq_btn_r" onclick="document.location.href='questions.php?lesson=4'">
                    <div class="indicator_lesson_4"></div>
                    <h2>LESSON FOUR</h2>
                </div>
            </div>
            <div class="congrats animate__animated animate__fadeInUp">
                <div class="indicator_congrats"> </div>
                <img src="ASSESMENT/giftbox.png" alt="">
            </div>
        </div>
    </main>

    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script>
        function sendCookieInfo() {
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
            // displayLoginSignupFormWithDelay(cookie_info);
            // signUpOrLoginToContinue(cookie_info);
        }
        sendCookieInfo();
    </script>
</body>

</html>