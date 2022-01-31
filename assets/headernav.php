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
                    <!-- <img src="SVG/hamburger.svg" alt="" class="btn"> -->
                    <!-- <input type="checkbox" class="nav_btn_checkbox" name="" id=""> -->
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
                <a href="index.php#about_us">
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
                    <!-- <i data-feather="sun" class="light_mode_btn" id="light_mode_btn"></i> -->
                    <img src="SVG/sun.svg" alt="" class="light_mode_btn">
                    <span class="links_name">LIGHTMODE</span>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- TITLE BAR -->
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
    <div class="user_details">
        <div class="username">
            <p>
                <?php print_r($_COOKIE['name']) ?>
            </p>
        </div>
        <div class="user_email">
            <p>
                <?php echo $_COOKIE['email'] ?>
            </p>
        </div>
    </div>
    <!-- <div class="show_badges" onclick="showAllBadges()">
        <h2>View All Badges</h2>
    </div> -->
    <!-- <div class="edit_profile" onclick="editProfile()">
        <div value="logout" name="logout"> Edit Profile</div>
    </div> -->
    <div class="logout" onclick="deleteCookie()">
        <div value="logout" name="logout">Logout</div>
    </div>
    <!-- <div class="contact_us" onclick="contactUs()">
        <div value="logout" name="logout"> Contact Us</div>
    </div>
    <div class="rate_us" onclick="rateUs()">
        <div value="logout" name="logout"> Rate Us</div>
    </div> -->
</div>