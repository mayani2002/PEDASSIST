<?php


$last_lesson_no = 1;

$name = $_POST['name'];
$email = $_POST['email'];
// Connect to the database
$conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
} else {
    if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"] != "") {
        $sql = "INSERT INTO login_credentials(EMAIL,USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('$email', '$name', '$last_lesson_no', '$db_file_name')";
    } else {
        $sql = "INSERT INTO login_credentials(EMAIL, USER_NAME, LESSON_NO) VALUES('$email', '$name', '$last_lesson_no')";
    }

    if (mysqli_query($conn, $sql)) {

        // Set session variables
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;

        //Page: set_cookie.php
        //$_SERVER['HTTP_HOST'] = 'http://www.example.com ';
        // localhost create problem on IE so this line
        // to get the top level domain  
        $myDomain = preg_replace("^[^.]*.([^.]*).(.*)$", '1.2', $_SERVER['HTTP_HOST']);
        $setDomain = ($_SERVER['HTTP_HOST']) != "localhost" ? ".$myDomain" : false;

        // $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
        setcookie('email', $email, time() + (60 * 60 * 24 * 30), '/', $setDomain, false, false);
        setcookie('name', $name, time() + (60 * 60 * 24 * 30), '/', $setDomain, false, false);
        // setcookie('email', $email, time() + (60 * 60 * 24 * 30));
        // setcookie('name', $user_name, time() + (60 * 60 * 24 * 30)); 
        echo 1;
        // header('location:/pedassist/assessment.php');
        // die();
    } else {
        echo 0;
    }

    //free result from memory
    $conn->close();
}
