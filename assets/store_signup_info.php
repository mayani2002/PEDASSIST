<?php
    // Creating temporary variables for storing the email id, username and password
    // $email = $name = $password = $cpassword = "";

    // Creating variable for storing the beginning lesson number
    $last_lesson_no = 1;

    $user_name = $_POST['name-input'];
    $email = $_POST['email-input'];
    $password = $_POST['password-input'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

    if (!$conn) {
        echo 'Connection error:' . mysqli_connect_error();
    }
    // if connection is established with database,
    // $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
    else {
        $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('{$email}', '{$password}', '{$user_name}', '{$last_lesson_no}', 'No Image Selected')";

        if(isset($_FILES['profile_pic'])) {

            // Storing the name of the image file in a variable to get its extension
            $image_name = $_FILES["profile_pic"]["name"];
            $image_explode = explode('.', $image_name);
            $image_extension = end($image_explode);

            // Storing the temporary name of the image file in a variable
            $temporary_image_name = $_FILES["profile_pic"]["tmp_name"];

            // Creating a new name for the image file
            // 1st four characters in the new name consists of a 4 digit random number followed by a hyphen (-)
            // Next three characters are random uppercase alphabets from user's name followed by a hyphen (-)
            // Last four characters consists of a 4 digit random number

            // Getting the three random alphabets from user's name
            $trimmed_user_name = str_replace(' ', '', $user_name);
            $alphabets_combination_for_new_image_name = substr(strtoupper($trimmed_user_name), rand(0, strlen($trimmed_user_name) - 1), 1) . substr(strtoupper($trimmed_user_name), rand(0, strlen($user_name) - 1), 1) . substr(strtoupper($user_name), rand(0, strlen($user_name) - 1), 1); 
            
            // Setting the new name for image file according to the above given points
            $new_image_name = rand(1000, 9999) . "-" . $alphabets_combination_for_new_image_name . "-" . rand(1000, 9999) . "." . $image_extension;
            
            // Moving the uploaded file with new name to the folder with all profile images
            if (move_uploaded_file($temporary_image_name, "user_profile_image_uploads/" . $new_image_name)) {
                $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('{$email}', '{$password}', '{$user_name}', {$last_lesson_no}, '{$new_image_name}')";    
            }
        }

        // if (isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["tmp_name"] != "") {
        //     $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO, PROFILE_IMG) VALUES('$email', '$password', '$name', '$last_lesson_no', '$db_file_name')";
        // } else {
        //     $sql = "INSERT INTO login_credentials(EMAIL, PASSWORD, USER_NAME, LESSON_NO) VALUES('$email', '$password', '$user_name', '$last_lesson_no')";
        // }

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
?>