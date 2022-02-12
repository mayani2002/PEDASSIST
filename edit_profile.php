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
            $fetch_query = "SELECT EMAIL, PASSWORD, USER_NAME, PROFILE_IMG FROM login_credentials WHERE EMAIL = '{$email}'";

            // Store the result after fetching it from the database
            $res = mysqli_query($conn, $fetch_query);

            if (!$res) {
                // If the query did not execute properly, the following error message will be shown.
                echo "1";
            } else if (mysqli_num_rows($res) > 0) {
                // Converting the result of the query into an associative array with column name as keys and the data in columns as values
                $profile_details = mysqli_fetch_assoc($res);
                
                // Variable to store name of the user
                $edit_profile_username = $profile_details["USER_NAME"];

                // Variable to store email id of the user
                $edit_profile_email = $profile_details["EMAIL"];
                
                // Variable to store password of the user
                $edit_profile_password = $profile_details["PASSWORD"];
                
                // Variable to store profile image name of the user
                if (!($profile_details["PROFILE_IMG"] == "No Image Selected")) {
                    $edit_profile_profile_image_name = $profile_details["PROFILE_IMG"];       
                }

                // Close the connection with database once the task is over
                $conn -> close();
            }
        }
    }
?>

<div class="edit_profile_bg">
    <div class="edit_profile_container">
        <div class="edit_profile_header">
            <svg width="300" height="145" viewBox="0 0 300 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 145V8C0 3.58172 3.58171 0 7.99999 0H292C296.418 0 300 3.58172 300 8V91.5L169.064 64.009L0 145Z" fill="url(#paint0_linear_1756_320)"/>
                <defs>
                    <linearGradient id="paint0_linear_1756_320" x1="300" y1="54.3262" x2="0.000541273" y2="54.9701" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#00799D"/>
                        <stop offset="1" stop-color="#08173F"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <form class="edit_profile_form" method="POST" enctype="multipart/form-data">
            <div class="edit_profile_close_button_container">
                <div class="edit_profile_close_button">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.6466 9.95266C12.1153 10.4214 12.1153 11.1807 11.6466 11.6494C11.4141 11.8838 11.1066 12 10.7992 12C10.4917 12 10.185 11.8828 9.95097 11.6485L5.99953 7.69909L2.04846 11.6475C1.81411 11.8838 1.50701 12 1.19991 12C0.892805 12 0.586079 11.8838 0.351535 11.6475C-0.117178 11.1788 -0.117178 10.4195 0.351535 9.95078L4.30373 5.99859L0.351535 2.04828C-0.117178 1.57956 -0.117178 0.820248 0.351535 0.351535C0.820248 -0.117178 1.57956 -0.117178 2.04828 0.351535L5.99953 4.3056L9.95172 0.35341C10.4204 -0.115303 11.1798 -0.115303 11.6485 0.35341C12.1172 0.822123 12.1172 1.58144 11.6485 2.05015L7.69627 6.00234L11.6466 9.95266Z" fill="white"/>
                    </svg>
                </div>
            </div>

            <!-- File Input For Profile Image -->
            <div class="update_profile_image">
                <div class="update_profile_image_hover_overlay">
                    <button class="choose_profile_image_button" onclick="document.getElementById('update_profile_image_input').click();">Choose Profile Image</button>
                    <input class="edit_profile_file" type="file" name="updated_profile_image" accept=".png, .jpeg, .jpg" id="update_profile_image_input">
                </div>
            </div>
            <!-- Error Message For Profile Image -->
            <div class="update_profile_image_error"></div>

            <!-- Input Box For Username Input -->
            <div class="update_input_box">
                <input type="text" name="updated_username" class="update_username_input" value="<?php echo $edit_profile_username; ?>"required>
                <label>Username</label>
            </div>
            <!-- Error Message For Username -->
            <div class="update_username_error"></div>

            <!-- Input Box For Email Input -->
            <div class="update_input_box">
                <input type="text" name="updated_email" class="update_email_input" value="<?php echo $edit_profile_email; ?>" required>
                <label>Email</label>
            </div>
            <!-- Error Message For Email -->
            <div class="update_email_error"></div>

            <!-- Password Instruction -->
            <div class="password_instruction">
                <p class="instruction">
                    Password must contain atleast 8 characters, an uppercase, a lowercase, a number and a special character.
                </p>
            </div>

            <!-- Input Box For Password Input -->
            <div class="update_input_box">
                <input type="password" name="updated_password" class="update_password_input" value="<?php echo $edit_profile_password; ?>" required>
                <label>Password</label>
            </div>
            <!-- Error Message For Password Input -->
            <div class="update_password_error"></div>

            <!-- Input Box For Confirm Password Input -->
            <div class="update_input_box">
                <input type="password" class="confirm_updated_password_input" required>
                <label>Confirm Password</label>
            </div>
            <!-- Error Message For Confirm Password Input -->
            <div class="confirm_updated_password_error"></div>

            <!-- Save Button Container -->
            <div class="save_button_container">
                <input type="button" value="Save" name="save" class="save_button">
            </div>
        </form>
    </div>
</div>
