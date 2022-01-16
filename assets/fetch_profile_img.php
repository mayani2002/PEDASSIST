<?php
    $profile_img = "uploads/default_profile.png";
    if (isset($_COOKIE["email"])) {
        // Connect with the database.
        $conn = mysqli_connect('localhost', 'mayani', '2002', 'pedassist');
        $email = $_COOKIE["email"];

        if (!$conn) {
            // If the connection to database was unsuccessful, show a connection error.
            echo 'Connection error:' . mysqli_connect_error();
        } else {

            // Query to update the LESSON_NO field in database.
            $fetch_query = "SELECT PROFILE_IMG FROM login_credentials WHERE EMAIL ='$email'";

            // Store the result after fetching it from the database
            $res = mysqli_query($conn, $fetch_query);

            if (!$res) {
                // If the query did not execute properly, the following error message will be shown.
                echo 'There was some error running the query: ' . mysqli_error($conn);
            }
            else {
                // echo mysqli_fetch_assoc($res);
                $img = mysqli_fetch_assoc($res);
                if(!empty($img)){
                    $pic= $img['PROFILE_IMG'];
                    $profile_img = "uploads/".$pic;
                }


                
                // Close the connection with database once the task is over
                $conn -> close();
            }
        }
    } 
?>