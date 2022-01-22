<?php 
if (!defined('allow')) {
    die('Access Denied..........');
} 

// Creating temporary variables for storing the email id, username and password
// $email = $name = $password = $cpassword = "";

// Creating variable for storing the beginning lesson number
$last_lesson_no = 1;

// Creating variables to store the errors
$errors = array('name' => '', 'email' => '', 'password' => '', 'profile_pic' => '', 'cpassword' => '');

$name = $_POST['name'];
$email = $_POST['email'];
$passoword = $_POST['password'];

 // Connect to the database
 $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
// if there are no errors in the $error array and connection is established with database,
// $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
else if (!array_filter($errors)) {
    if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"] != "") {
        $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('$email', '$password', '$name', '$last_lesson_no', '$db_file_name')";
    } else {
        $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO) VALUES('$email', '$password', '$name', '$last_lesson_no')";
    }

    if (mysqli_query($conn, $sql)) {
        setcookie('email', $email, time() + (60 * 60 * 24 * 30));
        setcookie('name', $name, time() + (60 * 60 * 24 * 30));
        $cookie = 1;

        // header('location:index.php');
        die();
    } else {
        echo 'query error;' . mysqli_error($conn);
    }

    //free result from memory
    $conn->close();
} else {
    // header('location:index.php');
    // die();
}
?>