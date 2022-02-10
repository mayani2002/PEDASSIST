<?php
// echo $_POST['current_lesson_number'];

if (!defined('allow')) {
    die('Access Denied.......');
}

// checking for all the pages
if (!isset($_COOKIE['email'])) {
    // If the cookie does not exist, $cookie will be set to 0.
    $cookie = 0;
} else {
    $email = $_COOKIE['email'];
    // If the cookie exists, $cookie will be set to 1.
    $cookie = 1;
}

if ($cookie == 1) {
    // Connect with the database.
    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

    if (!$conn) {
        // If the connection to database was unsuccessful, show a connection error.
        echo 'Connection error:' . mysqli_connect_error();
    } else {
        // If the connection was successful, fetch the user record using the email.
        $sql = "SELECT * FROM login_credentials where EMAIL ='$email'";

        // Store the result after fetching it from the database
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            // If the query did not execute properly, the following error message will be shown.
            echo 'There was some error running the query: ' . mysqli_error($conn);
        } else if (mysqli_num_rows($res) > 0) {
            // If the query executed properly, the data fetched will be stored in $row array.
            $row = mysqli_fetch_assoc($res);

            // Store the current lesson number so that the UI of the previous lessons can be modified accordingly.
            $current_lesson_number_from_db = $row['LESSON_NO'];
        }
    }

    // Close the connection with database once the task is over
    $conn->close();
}

if (isset($_POST['current_lesson_number'])) {
    // echo $_POST['current_lesson_number'];

    // Connect with the database.
    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

    if (!$conn) {
        // If the connection to database was unsuccessful, show a connection error.
        echo 'Connection error:' . mysqli_connect_error();
    } else {
        // If a post request contains current_lesson_number, then it is temporarily stored in $current_lesson_number
        $current_lesson_number = $_POST["current_lesson_number"];

        // Query to update the LESSON_NO field in database.
        $update_query = "UPDATE SET LESSON_NO = '$current_lesson_number' FROM login_credentials where EMAIL ='$email'";

        // Store the result after fetching it from the database
        $res = mysqli_query($conn, $update_query);

        if (!$res) {
            // If the query did not execute properly, the following error message will be shown.
            echo 'There was some error running the query: ' . mysqli_error($conn);
        } else {
            // Close the connection with database once the task is over
            $conn->close();
        }
    }
}

// Start a session
session_start();

// if (array_key_exists('logout', $_POST)) {
//     logout();
// }

// function logout()
// {
//     echo $_COOKIE['email'] . "  Hi its not working";
//     setcookie('email', $_SESSION['email'], 60, "/");
//     setcookie('name', $_SESSION['name'], 60, "/");
//     unset($_SESSION['email']);
//     unset($_SESSION['name']);
//     // header('location:index.php');
//     // die();
// }

?>

<?php include('login.php'); ?>
<?php include('signup.php'); ?>

<!-- SIDE NAVIGATION BAR -->
<nav class="sidenavbar" id="sidenavbar">
    <div class="nav_container_1">
        <ul>
            <li class="navbtn" id="btn">
                <div class="nav_icon">
                    <div class="nav_btn_icon">
                        <div class="menu_btn_burger"></div>
                    </div>
                    <span class="links_name">NAV</span>
                </div>
                <span class="tooltip">Navigation bar</span>
            </li>
            <li class="home">
                <a href="index.php">
                    <div class="side_nav_icon">
                        <img src="SVG/home.svg" alt="" class="btn">
                    </div>
                    <span class="links_name">HOME</span>
                </a>
                <span class="tooltip">HOME</span>
            </li>
            <li class="lessons">
                <a href="lessons_page.php">
                    <div class="side_nav_icon">
                        <img src="SVG/tutorial.svg" alt="" class="btn">
                    </div>
                    <span class="links_name">LESSONS</span>
                </a>
                <span class="tooltip">LESSONS</span>
            </li>
            <li class="assesment">
                <a href="assessment.php">
                    <div class="side_nav_icon">
                        <img src="SVG/assesment.svg" alt="" class="btn">
                    </div>
                    <span class="links_name">ASSESSMENT</span>
                </a>
                <span class="tooltip">ASSESSMENT</span>
            </li>
            <li class="aboutus" id="aboutus">
                <a href="#about_us">
                    <div class="side_nav_icon">
                        <img src="SVG/about_us.svg" alt="" class="btn">
                    </div>
                    <span class="links_name">ABOUT US</span>
                </a>
                <span class="tooltip">ABOUT US</span>
            </li>
            <li class="badges" id="badges">
                <a href="badge_page.php">
                    <div class="side_nav_icon">
                        <img src="SVG/badge_icon.svg" alt="" class="btn" style="margin-left: 5px;">
                    </div>
                    <span class="links_name">ALL BADGES</span>
                </a>
                <span class="tooltip">ALL BADGES</span>
            </li>
        </ul>
    </div>
    <div class="nav_container_2">
        <ul>
            <li>
                <div class="dark_mode" id="dark_mode">
                    <img src="SVG/moon.svg" alt="" class="dark_mode_btn">
                    <span class="links_name">DARKMODE</span>
                </div>
            </li>
            <li>
                <div class="light_mode" id="light_mode">
                    <img src="SVG/sun.svg" alt="" class="light_mode_btn">
                    <span class="links_name">LIGHTMODE</span>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- TITLE BAR -->
<header>
    <h3>PEDASSIST</h3>
    <div class="box">
        <div class="hidden_mode_change_btn">
            <div class="dark_mode" id="dark_mode_header" onclick="enableDarkMode()">
                <img src="SVG/moon.svg" alt="" class="dark_mode_btn mob_btn">
            </div>
            <div class="light_mode" id="light_mode_header" onclick="enableLightMode()">
                <img src="SVG/sun.svg" alt="" class="light_mode_btn mob_btn">
            </div>
        </div>
        <div class="hidden_login_btn">Login</div>
        <div class="profile_btn">
            <div class="profile_btn_icon">
                <img src="SVG/profile_icon.svg" class="profile_icon_svg">
            </div>
        </div>
    </div>
</header>

<!-- Profile Dropdown -->
<div class="profile_dropdown" id="profile_dropdown">
    <div class="profile_details">
        <div class="profile_image_in_profile_dropdown">
            <div class="profile_image_in_profile_dropdown_container"></div>
        </div>
        <div class="user_details">
            <div class="username_in_profile_dropdown">
                <h2>
                    <?php print_r($_COOKIE['name']) ?>
                </h2>
            </div>
            <div class="email_in_profile_dropdown">
                <!-- <img src="./SVG/email_outline.svg"> -->
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.99953 3.5H3H15C15.3701 3.5 15.6933 3.7011 15.8662 4H14.4H3.6H2.13236C2.3058 3.70006 2.63014 3.49965 2.99953 3.5ZM14.6774 4.91603L15.9133 4.09207C15.969 4.21664 16 4.3547 16 4.5V13.5C16 14.0523 15.5523 14.5 15 14.5H3C2.44771 14.5 2 14.0523 2 13.5V4.44671C2.00672 4.32045 2.03669 4.20063 2.08564 4.09135L3.32265 4.91603L8.72265 8.51603L9 8.70093L9.27735 8.51603L14.6774 4.91603ZM3.2773 5.48494L2.5 4.96687V5.901V13.5V14H3H15H15.5V13.5V5.901V4.96687L14.7227 5.48494L9 9.29912L3.2773 5.48494Z"/>
                </svg>
                <p><?php echo $_COOKIE['email'] ?></p>
            </div>
            <div class="uid_in_profile_dropdown">
                <div class="no_of_badges_in_profile_dropdown">    
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.00039 11.5714C10.0932 11.5714 12.6004 9.26888 12.6004 6.42856C12.6004 3.58824 10.0932 1.28571 7.00039 1.28571C3.9076 1.28571 1.40039 3.58824 1.40039 6.42856C1.40039 9.26888 3.9076 11.5714 7.00039 11.5714Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.55541 11.5714L4.2002 16.4907L7.18185 14.3292L10.1632 16.4907L8.80794 11.5714" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="num_of_badges_in_profile_dropdown"></p>
                </div>
                <p>UID: TA-1109</p>
            </div>
        </div>
    </div>

    <div class="profile_dropdown_buttons">
        <div class="edit_profile">
            <div class="hover_border_left"></div>
            <div class="button_details">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.25 2.5H7.75C4 2.5 2.5 4 2.5 7.75V12.25C2.5 16 4 17.5 7.75 17.5H12.25C16 17.5 17.5 16 17.5 12.25V10.75" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.9036 3.44087L7.0722 9.27306C6.85019 9.4951 6.62819 9.93178 6.58379 10.25L6.26558 12.4778C6.14717 13.2845 6.71699 13.847 7.52361 13.736L9.75107 13.4178C10.0619 13.3734 10.4985 13.1513 10.7279 12.9293L16.5593 7.09709C17.5657 6.09052 18.0393 4.92112 16.5593 3.44087C15.0792 1.96062 13.91 2.4343 12.9036 3.44087Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.5 5C13.0086 6.20951 14.4281 7.15587 16.25 7.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Edit Profile</p>
            </div>
            <div class="hover_border_right"></div>
        </div>
        <div class="rate_us">
            <div class="hover_border_left"></div>
            <div class="button_details">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.04199 11.5L9.38366 12.5416C9.55866 12.7166 9.95033 12.7999 10.2087 12.7999H11.8587C12.3753 12.7999 12.942 12.4083 13.0753 11.8916L14.117 8.73326C14.3337 8.12493 13.942 7.60828 13.292 7.60828H11.5587C11.3003 7.60828 11.0837 7.39162 11.1253 7.09162L11.342 5.70826C11.4253 5.31659 11.167 4.88324 10.7753 4.75824C10.4253 4.62491 9.99199 4.7999 9.82532 5.05823L8.05033 7.69993" stroke="white" stroke-width="0.75" stroke-miterlimit="10"/>
                    <path d="M5.83301 11.5V7.25828C5.83301 6.64995 6.09134 6.43329 6.69967 6.43329H7.13301C7.74134 6.43329 7.99968 6.64995 7.99968 7.25828V11.5C7.99968 12.1084 7.74134 12.325 7.13301 12.325H6.69967C6.09134 12.325 5.83301 12.1084 5.83301 11.5Z" stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 15.7166H14.3667C13.7 15.7166 13.0667 15.975 12.6 16.4416L11.175 17.85C10.525 18.4917 9.46667 18.4917 8.81667 17.85L7.39166 16.4416C6.925 15.975 6.28333 15.7166 5.625 15.7166H5C3.61667 15.7166 2.5 14.6083 2.5 13.2417V4.14996C2.5 2.7833 3.61667 1.67499 5 1.67499H15C16.3833 1.67499 17.5 2.7833 17.5 4.14996V13.2417C17.5 14.6 16.3833 15.7166 15 15.7166Z" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Rate Us</p>
            </div>
            <div class="hover_border_right"></div>
        </div>
        <div class="logout" onclick="deleteCookie()">
            <div class="hover_border_left"></div>
            <div class="button_details">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.5 6.49422C7.74603 3.65809 9.21429 2.5 12.4286 2.5H12.5317C16.0794 2.5 17.5 3.91019 17.5 7.43172V12.5683C17.5 16.0898 16.0794 17.5 12.5317 17.5H12.4286C9.2381 17.5 7.76984 16.3577 7.50794 13.5688" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.5 10H3.75" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 7.5L2.5 10L5 12.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Logout</p>
            </div>
            <div class="hover_border_right"></div>
        </div>
    </div>
</div>