<?php


function login_without_password($login_email)
{
    // Connect to the database
    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

    if (!$conn) {
        echo 'Connection error:' . mysqli_connect_error();
    } else {

        $sql = "SELECT * FROM login_credentials where EMAIL = '$login_email' ";
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            echo 'query error;' . mysqli_error($conn);
        } else if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);

            // Set session variables
            $_SESSION['email'] = $row['EMAIL'];
            $_SESSION["name"] = $row['USER_NAME'];

            //Page: set_cookie.php
            //$_SERVER['HTTP_HOST'] = 'http://www.example.com ';
            // localhost create problem on IE so this line
            // to get the top level domain  
            $myDomain = preg_replace("^[^.]*.([^.]*).(.*)$", '1.2', $_SERVER['HTTP_HOST']);
            $setDomain = ($_SERVER['HTTP_HOST']) != "localhost" ? ".$myDomain" : false;
            setcookie('email',  $row['EMAIL'], time() + (60 * 60 * 24 * 30), '/', $setDomain, false, false);
            setcookie('name', $row['USER_NAME'], time() + (60 * 60 * 24 * 30), '/', $setDomain, false, false);
            header('location:index.php');
            die();
            echo 1;
        } else {
            echo "0"." email :". $login_email ;
        }

        //free result from memory
        $conn->close();
    }
}
