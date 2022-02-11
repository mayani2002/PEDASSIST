<?php
    define('allow', true);
    if (isset($_COOKIE['email']))
        $username = $_COOKIE['name'];
    else
        $username = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="91726057228-j16ha0k20vi4mu4d58scpqe1csuq6eni.apps.googleusercontent.com">

    <title>Badges</title>
    <link rel="shortcut icon" type="image/png" href="images/pedassist_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>

    <link rel="stylesheet" href="badge_page.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">
    <link rel="stylesheet" href="edit_profile.css">
</head>

<body>
    <?php include('assets/headernav.php'); ?>
    <?php include('edit_profile.php'); ?>

    <!-- MAIN PAGE CONTENT -->
    <main>
        <div class="user_details_card">
            <div class="user_profile_image">
                <div class="profile_image_container"></div>
            </div>
            <div class="number_of_badges">
                <h1>Badges</h1>
                <div class="badge_icon">
                    <svg width="40" height="51" viewBox="0 0 40 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.3707 31.7826C27.939 31.7826 34.0744 25.6606 34.0744 18.1087C34.0744 10.5568 27.939 4.43481 20.3707 4.43481C12.8023 4.43481 6.66699 10.5568 6.66699 18.1087C6.66699 25.6606 12.8023 31.7826 20.3707 31.7826Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.7236 31.7826L11.8516 48.0435L20.3706 40.8986L28.8886 48.0435L25.0165 31.7826" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="no_of_badges"></p>
                </div>
            </div>
            <div class="user_details">
                <h2>
                    <?php
                    if (isset($_COOKIE['name'])) {
                        echo $_COOKIE['name'];
                    } else {
                        echo "username";
                    }
                    ?>
                </h2>
                <h2>
                    <?php
                    if (isset($_COOKIE['email'])) {
                        echo $_COOKIE['email'];
                    } else {
                        echo "example@gmail.com";
                    }
                    ?>
                </h2>
            </div>
        </div>
        <div class="badges_container">
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="1">
            </div>
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="2">
            </div>
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="3">
            </div>
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="4">
            </div>
        </div>

        <div class="badge_pop_up_overlay">
            <div class="badge_pop_up">
                <!-- <div class="badge"></div> -->
                <img class="badge" src="images/badge_1.png">
                <p class="badge_username">MAYANI<br>AGNIHOTRI</p>
                <p class="badge_message">
                    This badge is awarded for successfully
                    completing the lesson<br>
                    <b>"BRAIN ARCHITECTURE"</b>
                </p>
            </div>
        </div>

    </main>

    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="badge_page.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
    <script type="text/javascript" src="edit_profile.js"></script>
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