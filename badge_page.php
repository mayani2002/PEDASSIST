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
    <title>Badges</title>

    <link href='https://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet'>

    <link rel="stylesheet" href="badge_page.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/headernav.css">
    <link rel="stylesheet" href="assets/bottom_nav.css">
</head>

<body>
    <?php include('assets/headernav.php'); ?>

    <!-- MAIN PAGE CONTENT -->

    <main>

        <!-- <div class="wave">
            <svg class="wave_one" width="35.8vw" height="630" viewBox="0 0 487 630" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.9" d="M435.731 4178.23L372.15 4136.09C309.013 4093.95 181.184 4009.67 190.632 3925.38C200.08 3841.1 344.583 3756.82 417.612 3672.54C490.197 3588.26 490.197 3503.98 435.731 3419.7C381.264 3335.42 272.332 3251.14 245.099 3166.86C217.865 3082.58 112.293 2921.91 290.45 2914.01C468.607 2906.11 290.117 2745.45 326.798 2661.17C363.48 2576.89 453.516 2492.61 453.849 2408.33C453.516 2324.05 363.48 2239.77 281.447 2155.49C200.081 2071.2 126.718 1986.92 90.8143 1902.64C54.4664 1818.36 54.4664 1734.08 136.166 1649.8C217.865 1565.52 381.264 1481.24 426.616 1396.96C472.412 1312.68 399.049 1228.39 381.264 1144.11C363.48 1059.83 399.049 975.552 435.731 891.271C472.412 806.99 507.982 722.709 472.079 638.428C435.731 554.147 365.862 503.052 320.511 418.771C274.714 334.49 293.611 250.209 311.396 165.928C329.181 81.6472 309.013 -35.8193 281.447 -120.1C254.547 -204.381 181.184 -288.662 154.284 -372.943C126.718 -457.224 145.614 -541.505 172.514 -625.786C200.081 -710.067 235.65 -794.348 245.099 -878.629C254.547 -962.91 235.65 -1047.19 272.332 -1131.47C309.013 -1215.75 399.049 -1300.03 399.383 -1384.31C399.049 -1468.6 309.013 -1552.88 299.565 -1637.16C290.117 -1721.44 363.48 -1805.72 399.383 -1847.86L435.731 -1890H0V-1847.86C0 -1805.72 0 -1721.44 0 -1637.16C0 -1552.88 0 -1468.6 0 -1384.31C0 -1300.03 0 -1215.75 0 -1131.47C0 -1047.19 0 -962.91 0 -878.629C0 -794.348 0 -710.067 0 -625.786C0 -541.505 0 -457.224 0 -372.943C0 -288.662 0 -204.381 0 -120.1C0 -35.8193 0 48.4616 0 132.743C0 217.023 0 301.304 0 385.585C0 469.866 0 554.147 0 638.428C0 722.709 0 806.99 0 891.271C0 975.552 0 1059.83 0 1144.11C0 1228.39 0 1312.68 0 1396.96C0 1481.24 0 1565.52 0 1649.8C0 1734.08 0 1818.36 0 1902.64C0 1986.92 0 2071.2 0 2155.49C0 2239.77 0 2324.05 0 2408.33C0 2492.61 0 2576.89 0 2661.17C0 2745.45 0 2829.73 0 2914.01C0 2998.29 0 3082.58 0 3166.86C0 3251.14 0 3335.42 0 3419.7C0 3503.98 0 3588.26 0 3672.54C0 3756.82 0 3841.1 0 3925.38C0 4009.67 0 4093.95 0 4136.09V4178.23H435.731Z" fill="url(#paint0_linear_719_360)"/>
                <defs>
                    <linearGradient id="paint0_linear_719_360" x1="-7.6348" y1="4172.96" x2="479.365" y2="4172.96" gradientUnits="userSpaceOnUse">
                        <stop offset="0.484375" stop-color="#0F5A6A"/>
                        <stop offset="0.859375" stop-color="#00D0FF"/>
                    </linearGradient>
                </defs>
            </svg>
            <svg class="wave_two" width="32.94vw" height="630" viewBox="0 0 448 630" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M358.4 4136.17L334.313 4061.91C288.771 3953.42 242.264 3948.15 235.133 3863.89C227.635 3779.62 253.806 3714.84 306.103 3630.58C358.034 3546.31 424.491 3396.74 306.103 3333.01C166.337 3268.23 211.132 3168.17 158.835 3083.9C106.903 2999.63 59.4286 2956.45 89.6 2872.18C119.771 2787.91 193.829 2703.65 194.103 2619.38C193.829 2535.11 119.771 2450.85 97.0972 2366.58C74.9714 2282.32 104.229 2198.05 104.503 2113.78C104.229 2029.52 74.9714 1945.25 67.2 1860.99C59.4286 1776.72 74.9714 1692.45 82.1029 1608.19C89.6 1523.92 89.6 1439.65 141.897 1355.39C193.829 1271.12 298.971 1186.86 328.503 1102.59C358.4 1018.32 313.6 934.057 276.297 849.786C238.629 765.527 209.371 681.256 209.097 596.986C209.371 512.726 238.629 428.455 276.297 344.195C313.6 259.925 397.303 197.26 360 113C322.332 28.7296 129.071 -63.646 136.203 -147.906C143.7 -232.176 313.6 -329.936 358.4 -414.206C403.2 -498.477 358.4 -582.737 343.497 -667.007C328.229 -751.267 343.771 -835.537 298.697 -919.808C254.171 -1004.07 149.029 -1088.34 156.8 -1172.6C164.571 -1256.87 283.429 -1341.14 283.703 -1425.4C283.429 -1509.67 164.571 -1593.94 171.703 -1678.2C179.2 -1762.47 313.6 -1846.73 380.8 -1888.87L448 -1931H0V-1888.87C0 -1846.73 0 -1762.47 0 -1678.2C0 -1593.94 0 -1509.67 0 -1425.4C0 -1341.14 0 -1256.87 0 -1172.6C0 -1088.34 0 -1004.07 0 -919.808C0 -835.537 0 -751.267 0 -667.007C0 -582.737 0 -498.477 0 -414.206C0 -329.936 0 -245.676 0 -161.406C0 -77.146 0 7.12437 0 91.3948C0 175.655 0 259.925 0 344.195C0 428.455 0 512.726 0 596.986C0 681.256 0 765.527 0 849.786C0 934.057 0 1018.32 0 1102.59C0 1186.86 0 1271.12 0 1355.39C0 1439.65 0 1523.92 0 1608.19C0 1692.45 0 1776.72 0 1860.99C0 1945.25 0 2029.52 0 2113.78C0 2198.05 0 2282.32 0 2366.58C0 2450.85 0 2535.11 0 2619.38C0 2703.65 0 2787.91 0 2872.18C0 2956.45 0 3040.71 0 3124.98C0 3209.24 0 3293.51 0 3377.78C0 3462.04 0 3546.31 0 3630.58C0 3714.84 0 3799.11 0 3883.38C0 3967.64 0 4051.91 0 4094.04V4136.17H358.4Z" fill="url(#paint0_linear_719_361)"/>
                <defs>
                    <linearGradient id="paint0_linear_719_361" x1="6.72341e-05" y1="4232.03" x2="448" y2="4232.03" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2BC7EA"/>
                        <stop offset="0.0001" stop-color="#2BC7EA"/>
                        <stop offset="1" stop-color="#3978B3"/>
                    </linearGradient>
                </defs>
            </svg>
            
        </div> -->

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
            <div class="badge_container" 
                onclick="badgePopUp(this, '<?php echo $username;?>')" data-bdg_number="1">
            </div>
            <div class="badge_container" 
                onclick="badgePopUp(this, '<?php echo $username;?>')" data-bdg_number="2">
            </div>
            <div class="badge_container" 
                onclick="badgePopUp(this, '<?php echo $username;?>')" data-bdg_number="3">
            </div>
            <div class="badge_container" 
                onclick="badgePopUp(this, '<?php echo $username;?>')" data-bdg_number="4">
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
                    <b>"BRAIN  ARCHITECTURE"</b>
                </p>
            </div>
        </div>

    </main>

    <!-- BOTTOM NAV -->
    <?php include('assets/bottom_nav.php'); ?>

    <script type="text/javascript" src="assets/basic.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="badge_page.js"></script>
    <script type="text/javascript" src="assets/bottom_nav.js"></script>
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