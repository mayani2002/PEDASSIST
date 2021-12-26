<?php define('allow',true); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDASSIST | TUTORIAL</title>
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>
    <script src="https://unpkg.com/feather-icons"></script>
    
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="tutorial.css">
    <link rel="stylesheet" href="login.css">
    <script type="text/javascript" src="login.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>

</head>

<body>
    <?php include('assets/headernav.php'); ?>

    <!-- MAIN PAGE CONTENT -->
    <main>
        <div class="page_description">
            <div class="page_bg"></div>
            <div class="page_name">
                <h1>TUTORIALS</h1>
            </div>
        </div>
        <div class="videos">
            <div class="videos_row_1"> 
                <div class="lesson_container">
                    <img src="LESSON/LESSON NUMBER 1.png" class="lesson" onclick="document.location.href='lesson1.php?sign_up=0'">    
                </div>
                <div class="lesson_container">
                    <img src="LESSON/LESSON NUMBER 2.png" class="lesson" onclick="document.location.href='lesson2.php?sign_up=0'">    
                </div>
                <div class="lesson_container">
                    <img src="LESSON/LESSON NUMBER 3.png" class="lesson" onclick="document.location.href='lesson3.php?sign_up=0'">
                </div>
            </div>
            <div class="videos_row_2">
                <div class="lesson_container">
                    <img src="LESSON/LESSON NUMBER 4.png" class="lesson" onclick="document.location.href='lesson4.php?sign_up=0'">    
                </div>
                <div class="lesson_container">
                    <img src="LESSON/LESSON NUMBER 1.png" class="lesson" onclick="document.location.href='lesson1.php?sign_up=0'">    
                </div>
                <div class="lesson_container">
                    <img src="LESSON/LESSON NUMBER 2.png" class="lesson" onclick="document.location.href='lesson2.php?sign_up=0'">
                </div>
            </div>
        </div>
        
    <!-- FOOTER -->
    <?php include('assets/footer.php'); ?>

    </main>

    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script>
        function sendCookieInfo(){
            var cookie_info = "<?php echo $cookie ?>";
            hideLoginButton(cookie_info);
            // displayLoginSignupFormWithDelay(cookie_info);
        }

        sendCookieInfo();
    </script>

</body>

</html>