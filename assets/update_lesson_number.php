<?php
    // Connect with the database.
    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');
    $email = $_COOKIE["email"];
    
    if (!$conn) {
        // If the connection to database was unsuccessful, show a connection error.
        echo 'Connection error:' . mysqli_connect_error();
    } else {
        if(isset($_POST['current_lesson_number'])) {
            // If a post request contains current_lesson_number, then it is temporarily stored in $current_lesson_number
            $current_lesson_number = $_POST["current_lesson_number"];

            // Query to update the LESSON_NO field in database.
            $update_query = "UPDATE login_credentials SET LESSON_NO = '$current_lesson_number' WHERE EMAIL ='$email'";

            // Store the result after fetching it from the database
            $res = mysqli_query($conn, $update_query);

            if (!$res) {
                // If the query did not execute properly, the following error message will be shown.
                echo 'There was some error running the query: ' . mysqli_error($conn);
            }
            else {
                echo "Query Ran Successfully";
                // Close the connection with database once the task is over
                $conn -> close();
            }
        }
    }
?>