<?php
    if (isset($_COOKIE["email"])) {
        // Connect with the database.
        $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');
        $email = $_COOKIE["email"];

        if (!$conn) {
            // If the connection to database was unsuccessful, show a connection error.
            echo "0";
        } else {

            // Query to select the profile image name from the database.
            $fetch_query = "SELECT PROFILE_IMG FROM login_credentials WHERE EMAIL ='$email'";

            // Store the result after fetching it from the database
            $res = mysqli_query($conn, $fetch_query);

            if (!$res) {
                // If the query did not execute properly, the following error message will be shown.
                echo "1";
            }
            else if (mysqli_num_rows($res) > 0) {
                $profile_image_name = mysqli_fetch_assoc($res);

                // Close the connection with database once the task is over
                $conn -> close();
                echo $profile_image_name["PROFILE_IMG"];
            }
        }
    } else {
        echo "2";
    }
?>