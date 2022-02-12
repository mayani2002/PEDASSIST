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
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="1"></div>
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="2"></div>
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="3"></div>
            <div class="badge_container" onclick="badgePopUp(this, '<?php echo $username; ?>')" data-bdg_number="4"></div>
        </div>

        <div class="badge_pop_up_overlay">
            <div class="badge_pop_up">
                <div class="badge_pop_up_close_button_container">
                    <div class="badge_pop_up_close_button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6466 9.95266C12.1153 10.4214 12.1153 11.1807 11.6466 11.6494C11.4141 11.8838 11.1066 12 10.7992 12C10.4917 12 10.185 11.8828 9.95097 11.6485L5.99953 7.69909L2.04846 11.6475C1.81411 11.8838 1.50701 12 1.19991 12C0.892805 12 0.586079 11.8838 0.351535 11.6475C-0.117178 11.1788 -0.117178 10.4195 0.351535 9.95078L4.30373 5.99859L0.351535 2.04828C-0.117178 1.57956 -0.117178 0.820248 0.351535 0.351535C0.820248 -0.117178 1.57956 -0.117178 2.04828 0.351535L5.99953 4.3056L9.95172 0.35341C10.4204 -0.115303 11.1798 -0.115303 11.6485 0.35341C12.1172 0.822123 12.1172 1.58144 11.6485 2.05015L7.69627 6.00234L11.6466 9.95266Z" fill="black"/>
                        </svg>
                    </div>
                </div>
                <img class="badge" src="">
                <p class="badge_username">Your Name</p>
                <p class="badge_message"></p>
            </div>
        </div>

    </main>

    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
    <script type="text/javascript" src="edit_profile.js"></script>
    <script type="text/javascript" src="badge_page.js"></script>
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