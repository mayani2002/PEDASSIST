<?php 
    // echo $_POST['current_lesson_number'];

    if(!defined('allow')) {
        die('Access Denied.......');
    }

    if(!isset($_COOKIE['email'])) {
        // If the cookie does not exist, $cookie will be set to 0.
        $cookie = 0;
    } else {
        $email = $_COOKIE['email'];
        // If the cookie exists, $cookie will be set to 1.
        $cookie = 1;
    }
    
    if($cookie == 1) {
        // Connect with the database.
        $conn = mysqli_connect('localhost', 'mayani', '2002','pedassist' );

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
            }
            else if (mysqli_num_rows($res) > 0) {
                // If the query executed properly, the data fetched will be stored in $row array.
                $row = mysqli_fetch_assoc($res);
                
                // Store the current lesson number so that the UI of the previous lessons can be modified accordingly.
                $current_lesson_number_from_db = $row['LESSON_NO'];
            }
        }
        
        // Close the connection with database once the task is over
        $conn -> close();
    }

    // if(isset($_POST['current_lesson_number'])) {
    //     // echo $_POST['current_lesson_number'];

    //     // Connect with the database.
    //     $conn = mysqli_connect('localhost', 'mayani', '2002', 'pedassist');

    //     // If a post request contains current_lesson_number, then it is temporarily stored in $current_lesson_number
    //     $current_lesson_number = $_POST["current_lesson_number"];

    //     // Query to update the LESSON_NO field in database.
    //     $update_query = "UPDATE SET LESSON_NO = '$current_lesson_number' FROM login_credentials where EMAIL ='$email'";
        
    //     // Store the result after fetching it from the database
    //     $res = mysqli_query($conn, $sql);

    //     if (!$res) {
    //         // If the query did not execute properly, the following error message will be shown.
    //         echo 'There was some error running the query: ' . mysqli_error($conn);
    //     }
    //     else {
    //         // Close the connection with database once the task is over
    //         $conn -> close();
    //     }
    // }

    // Start a session
    session_start();

    if(array_key_exists('logout', $_POST)) {
        logout();
    }

    function logout() {
        echo $_COOKIE['email'];

        setcookie('email', $_SESSION['email'],60);
        setcookie('name', $_SESSION['name'],60);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        header('location:index.php');
        die();
    }

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
                <!-- <i data-feather="home" class="btn"></i> -->
                <img src="SVG/home.svg" alt=""class="btn">
                <span class="links_name">HOME</span>
            </a>
            <span class="tooltip">HOME</span>
        </li>
        <li class="tutorial">
            <a href="tutorial.php">
                <!-- <i data-feather="book-open" class="btn"></i> -->
                <img src="SVG/tutorial.svg" alt=""class="btn">
                <span class="links_name">TUTORIALS</span>
            </a>
            <span class="tooltip">TUTORIALS</span>
        </li>
        <li class="assesment">
            <a href="assessment.php">
                <!-- <i data-feather="check-square" class="btn"></i> -->
                <img src="SVG/assesment.svg" alt=""class="btn">
                <span class="links_name">ASSESMENT</span>
            </a>
            <span class="tooltip">ASSESMENT</span>
        </li>
        <li class="aboutus" id="aboutus">
            <a href="#about_us">
                <!-- <i data-feather="users" class="btn"></i> -->
                <img src="SVG/about_us.svg" alt="" class="btn">
                <span class="links_name">ABOUT US</span>
            </a>
            <span class="tooltip">ABOUT US</span>
        </li>
        <li class="badges" id="badges">
            <a href="badge_page.php">
                <img src="SVG/badge_icon.svg" alt="" class="btn" style="margin-left: 7px;">
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
                    <!-- <i data-feather="moon" class="dark_mode_btn" id="dark_mode_btn"></i> -->
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
<header>
    <h3>PEDASSIST</h3>
    <div class="box">
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
            <h3>
                <?php echo $_COOKIE['name'] ?>
            </h3>
        </div>
        <div class="user_email">
            <h3>
                <?php echo $_COOKIE['email'] ?>
            </h3>
        </div>
    </div>
    <!-- <div class="show_badges" onclick="showAllBadges()">
        <h2>View All Badges</h2>
    </div> -->
    <form class="logout" method="POST">
        <input name="logout" type="submit" value="Logout">
    </form>
</div>

<!-- BADGES -->
<div class="badge1" id="badge1">
    <!-- <img src="BADGES/1.png" alt=""> -->
    <!-- <img src="BADGES/2.png" alt="">
    <img src="BADGES/3.png" alt="">
    <img src="BADGES/4.png" alt=""> -->
</div>
