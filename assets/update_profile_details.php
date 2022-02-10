<?php
    include('fetch_profile_image_name.php');

    // Variable to store the current profile image name of the user
    $current_profile_image_name = $profile_image_name["PROFILE_IMG"];
    
    // Getting the current profile image name without extension
    $current_profile_image_name_explode = explode('.', $current_profile_image_name);

    // Variable to store the current email id of the user
    $current_email = $_COOKIE["email"];

    // Variables to store the updated profile details of the user
    $updated_username = $_POST['updated_username'];
    $updated_email = $_POST['updated_email'];
    $updated_password = $_POST['updated_password'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'mayani', '180122', 'pedassist');

    if (!$conn) {
        echo 'Connection error:' . mysqli_connect_error();
    }
    // if connection is established with database,
    // $_COOKIE['email'] variable will be stored in the local storage of the user for 30 days.
    else {
        $sql = "UPDATE login_credentials SET EMAIL = '{$updated_email}', PASSWORD = '{$updated_password}', USER_NAME = '{$updated_username}' WHERE EMAIL = '{$current_email}'";

        if(isset($_FILES['updated_profile_image'])) {
            // Condition for checking whether user has uploaded any profile image
            if($current_profile_image_name != "No Image Selected") {
                // Storing the name of the image file in a variable to get its extension
                $updated_image_name = $_FILES["updated_profile_image"]["name"];
                $updated_image_explode = explode('.', $updated_image_name);
                $updated_image_extension = end($updated_image_explode);

                // Storing the temporary name of the image file in a variable
                $updated_temporary_image_name = $_FILES["updated_profile_image"]["tmp_name"];

                // Setting the new name for image file according to the above given points
                $updated_new_image_name = $current_profile_image_name_explode[0] . "." . $updated_image_extension;
                
                // Moving the uploaded file with new name to the folder with all profile images
                if (unlink("user_profile_image_uploads/" . $current_profile_image_name)) {
                    if (move_uploaded_file($updated_temporary_image_name, "user_profile_image_uploads/" . $updated_new_image_name)) {
                        $sql = "UPDATE login_credentials SET EMAIL = '{$updated_email}', PASSWORD = '{$updated_password}', USER_NAME = '{$updated_username}', PROFILE_IMG = '{$updated_new_image_name}' WHERE EMAIL = '{$current_email}'";
                    }
                }
            } else {
                // Storing the name of the image file in a variable to get its extension
                $updated_image_name = $_FILES["updated_profile_image"]["name"];
                $updated_image_explode = explode('.', $updated_image_name);
                $updated_image_extension = end($updated_image_explode);

                // Storing the temporary name of the image file in a variable
                $updated_temporary_image_name = $_FILES["updated_profile_image"]["tmp_name"];

                // Creating a new name for the image file
                // 1st four characters in the new name consists of a 4 digit random number followed by a hyphen (-)
                // Next three characters are random uppercase alphabets from user's name followed by a hyphen (-)
                // Last four characters consists of a 4 digit random number

                // Getting the three random alphabets from user's name
                $trimmed_updated_user_name = str_replace(' ', '', $updated_username);
                $alphabets_combination_for_updated_new_image_name = substr(strtoupper($trimmed_updated_user_name), rand(0, strlen($trimmed_updated_user_name) - 1), 1) . substr(strtoupper($trimmed_updated_user_name), rand(0, strlen($updated_username) - 1), 1) . substr(strtoupper($updated_username), rand(0, strlen($updated_username) - 1), 1); 
                
                // Setting the new name for image file according to the above given points
                $updated_new_image_name = rand(1000, 9999) . "-" . $alphabets_combination_for_updated_new_image_name . "-" . rand(1000, 9999) . "." . $updated_image_extension;
                
                if (move_uploaded_file($updated_temporary_image_name, "user_profile_image_uploads/" . $updated_new_image_name)) {
                    // Setting the SQL query when user uploads a new image file
                    $sql = "UPDATE login_credentials SET EMAIL = '{$updated_email}', PASSWORD = '{$updated_password}', USER_NAME = '{$updated_username}', PROFILE_IMG = '{$updated_new_image_name}' WHERE EMAIL = '{$current_email}'";
                }
            }
        }

        if (mysqli_query($conn, $sql)) {
            setcookie('email', $updated_email, time() + (60 * 60 * 24 * 30), '/');
            setcookie('name', $updated_username, time() + (60 * 60 * 24 * 30), '/'); 

            echo $sql;
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }

        //free result from memory
        $conn->close();
    }
?>