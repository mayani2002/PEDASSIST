<?php
// Creating temporary variables for storing the email id, username and password
// $email = $name = $password = $cpassword = "";

// Creating variable for storing the beginning lesson number
$last_lesson_no = 1;

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to the database
$conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
// if connection is established with database,
// $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
else {
    if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"] != "") {
        $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('$email', '$password', '$name', '$last_lesson_no', '$f')";
    } else {
        $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO) VALUES('$email', '$password', '$user_name', '$last_lesson_no')";
    }

    if (mysqli_query($conn, $sql)) {

        // Set session variables
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $user_name;

        //Page: set_cookie.php
        //$_SERVER['HTTP_HOST'] = 'http://www.example.com ';
        // localhost create problem on IE so this line
        // to get the top level domain  
        $myDomain = preg_replace("^[^.]*.([^.]*).(.*)$", '1.2', $_SERVER['HTTP_HOST']);
        $setDomain = ($_SERVER['HTTP_HOST']) != "localhost" ? ".$myDomain" : false;
        setcookie('email', $email, time() + (60 * 60 * 24 * 30), '/', $setDomain, false, false);
        setcookie('name', $user_name, time() + (60 * 60 * 24 * 30), '/', $setDomain, false, false);
        // setcookie('email', $email, time() + (60 * 60 * 24 * 30));
        // setcookie('name', $user_name, time() + (60 * 60 * 24 * 30)); 
        
        // if (!isset($_COOKIE['email'])) {
            // If the cookie does not exist, $cookie will be set to 0.
            // echo 0;
        // } else {
            // $email = $_COOKIE['email'];
            // If the cookie exists, $cookie will be set to 1.
            echo 1;
        // }
        // header('location:/pedassist/assessment.php');
        // die();
    } else {
        echo 'query error;' . mysqli_error($conn);
    }

    //free result from memory
    $conn->close();
}
