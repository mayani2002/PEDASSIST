<?php
    // Connect with the database.
    $conn = mysqli_connect('localhost', 'mayani', '2002', 'pedassist');
    $email = $_COOKIE["email"];
    
    if (!$conn) {
        // If the connection to database was unsuccessful, show a connection error.
        echo 'Connection error:' . mysqli_connect_error();
    } else {

        // Query to update the LESSON_NO field in database.
        $fetch_query = "SELECT LESSON_NO FROM login_credentials WHERE EMAIL ='$email'";

        // Store the result after fetching it from the database
        $res = mysqli_query($conn, $fetch_query);

        if (!$res) {
            // If the query did not execute properly, the following error message will be shown.
            echo 'There was some error running the query: ' . mysqli_error($conn);
            echo "0";
        }
        else if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo $row["LESSON_NO"];
            // echo 3;
            // Close the connection with database once the task is over
            $conn -> close();

        }
    }
?>