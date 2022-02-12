// Dictionary to store errors
var error = {};

// Variable to store the reference of edit profile button
var editProfileButton = document.querySelector(".edit_profile");

// Variable to store the reference of edit profile bg
// var editProfileBg = document.querySelector(".edit_profile_bg");

// Variable to store the reference of edit profile close button
var editProfileCloseButton = document.querySelector(".edit_profile_close_button");

// Variable to store the reference of edit profile form
var editProfileForm = document.querySelector(".edit_profile_form");

// Array to store the reference of all update input boxes
var updateInputBoxes = document.querySelectorAll(".update_input_box");

// Variable to store the reference of Update Profile Image Div
let updateProfileImage = document.querySelector(".update_profile_image");

// Variable to store reference of Change Profile Image / Add Profile Image button
let chooseProfileImageButton = document.querySelector(".choose_profile_image_button");

// Variable to store reference of Profile Image Input
let updateProfileImageInput = document.querySelector("#update_profile_image_input");

// Variable to store reference of username input
let updateUsernameInput = document.querySelector(".update_username_input");

// Variable to store reference of email input
let updateEmailInput = document.querySelector(".update_email_input");

// Variable to store reference of password instruction div
let passwordInstruction = document.querySelector(".password_instruction");

// Variable to store reference of password input
let updatePasswordInput = document.querySelector(".update_password_input");

// Variable to store reference of confirm password input
let confirmUpdatedPasswordInput = document.querySelector(".confirm_updated_password_input");

// Variable to store reference of save button
let saveButton = document.querySelector(".save_button");

// Variables to store current profile details of the user
var currentEmail = updateEmailInput.value;
var currentUsername = updateUsernameInput.value;
var currentPassword = updatePasswordInput.value;

// Function for checking whether the updated email exists in database
const checkIfUpdatedEmailExistsInDb = (updatedEmail) => {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/check_if_email_exists_in_db.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("email=" + updatedEmail);

    // Requesting a response from a server
    xhr.onload = function() {
        console.log("answer :" + parseInt(this.responseText));
        if (parseInt(this.responseText)) {
            error["Updated Email"] = "There is already an account with this email !";
            setFormMessage(".update_email_error", error["Updated Email"]);
        } else {
            delete error["Updated Email"];
            clearFormMessage(".update_email_error");
        }
    };
};

// Function to send the updated profile details in database
function sendUpdatedProfileDetails() {
    // Getting the updated profile details from the edit profile form
    let updatedEditProfileFormData = new FormData(editProfileForm);

    // Creating a new XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Opening a POST request
    xhr.open("POST", "assets/update_profile_details.php");

    // Sending the form data
    xhr.send(updatedEditProfileFormData);

    // Requesting a response from the server
    xhr.onload = function() {
        console.log("Response: " + this.responseText);
        location.reload();
    }
}

// A function for checking whether there's a profile image or a default profile image
function checkForDefaultProfileImage() {
    // Getting the style of the update profile image div
    let stylesOfUpdateProfileImage = window.getComputedStyle(updateProfileImage);

    console.log(stylesOfUpdateProfileImage.backgroundImage);
    
    // Checking whether the profile image 
    if (stylesOfUpdateProfileImage.backgroundImage.includes("default_profile_image")) {
        chooseProfileImageButton.innerHTML = "Add Profile Image";
    } else {
        chooseProfileImageButton.innerHTML = "Change Profile Image";
    }
}

// Adding an event listener for edit profile button
editProfileButton.addEventListener("click", () => {
    document.getElementsByTagName("body")[0].classList.add("hide_scroll");
    editProfileBg.style.visibility = "visible";
    editProfileBg.style.opacity = "1";
});

// Adding an event listener for edit profile close button
editProfileCloseButton.addEventListener("click", () => {
    document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
    editProfileBg.style.visibility = "hidden";
    editProfileBg.style.opacity = "0";
});

// Adding an event listener for update profile image input
updateProfileImageInput.addEventListener("change", () => {
    // Checking whether the user has changed the profile image or not
    if (updateProfileImageInput.files.length != 0) {
        // Variable to store the contents of the file uploaded from user's computer temporarily using a FileReader's object
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            updateProfileImage.style.backgroundImage = "url(" + reader.result + ")";
            checkForDefaultProfileImage();
        })
        
        // Reading the file uploaded as data URL
        reader.readAsDataURL(updateProfileImageInput.files[0]);
        
        // Variable to store the file size of updated profile image
        let updatedFileSize = (updateProfileImageInput.files[0].size / 1048576).toFixed(2);

        // Checking the file size of updated profile image
        if (updatedFileSize > 1) {
            // Displaying the error if file size exceeds 1mb
            error["Updated Profile Image Size"] = "Size of the new file selected exceeds 1mb!";
            setFormMessage(".update_profile_image_error", error["Updated Profile Image Size"]);
        } else {
            if (error["Updated Profile Image Size"] != null) {
                // Deleting the error message from error dictionary if the user selects a file which is of approrpriate size in any further turn
                delete error["Updated Profile Image Size"];
                clearFormMessage(".update_profile_image_error");
            }
        }
    } else {
        if (error["profile_image_size"] != null) {

            // Deleting the error message from error dictionary if the user deselects a 
            // file which he/she might have chosen accidentally
            delete error["profile_image_size"];
            clearFormMessage(".profile_image_error");
        }
    }
}, false);

// Adding an event listener for username input
updateUsernameInput.addEventListener("blur", (e) => {
    if (updateUsernameInput.value) {
        if (!validateNameEntered(updateUsernameInput.value)) {
            error["Updated Username"] = "Enter a valid name !";
            setFormMessage(".update_username_error", error["Updated Username"]);
        } else {
            delete error["Updated Username"];
            clearFormMessage(".update_username_error");
        }
    }
});

// Adding an event listener for email input
updateEmailInput.addEventListener("blur", (e) => {
    if (updateEmailInput.value) {
        if (updateEmailInput.value != currentEmail) {
            if (!validateEmail(updateEmailInput.value)) {
                error["Updated Email"] = "Invalid email entered !";
                setFormMessage(".update_email_error", error["Updated Email"]);
            } else {
                checkIfUpdatedEmailExistsInDb(updateEmailInput.value);
            }
        } else {
            if (error["Updated Email"] != null) {
                delete error["Updated Email"];
                clearFormMessage(".update_email_error");
            }
        }
    }
});

// Displaying the confirm password input when the user clicks on password input box
updatePasswordInput.addEventListener("focus", () => {
    passwordInstruction.style.display = "block";
    updateInputBoxes[3].style.display = "block";
})

// Adding an event listener for password input
updatePasswordInput.addEventListener("blur", () => {
    if (updatePasswordInput.value) {
        if (updatePasswordInput.value != currentPassword) {
            if (!validatePassword(updatePasswordInput.value)) {
                error["Updated Password"] = "Invalid Password !";
                setFormMessage(".update_password_error", error["Updated Password"]);
            } else {
                delete error["Updated Password"];
                clearFormMessage(".update_password_error");
            }
        } else {
            passwordInstruction.style.display = "none";
            updateInputBoxes[3].style.display = "none";
            delete error["Updated Password"];
            clearFormMessage(".update_password_error");
        }
    }
});

// Adding an event listener for confirm password input
confirmUpdatedPasswordInput.addEventListener("blur", () => {
    if (confirmUpdatedPasswordInput.value) {
        if (!validatePassword(confirmUpdatedPasswordInput.value)) {
            error["Confirm Updated Password Input"] = "Invalid Password !";
        } else if (
            updatePasswordInput.value != null && 
            updatePasswordInput.value != confirmUpdatedPasswordInput.value
        ) {
            error["Confirm Updated Password Input"] = "Passwords do not match !";
            setFormMessage(".confirm_updated_password_error", error["Confirm Updated Password Input"]);
        } else {
            delete error["Confirm Updated Password Input"];
            clearFormMessage(".confirm_updated_password_error");
        }
    }
});

// Adding an event listener for the save button
saveButton.addEventListener("click", () => {
    console.log(error);
    
    // Sending the AJAX request to update the profile details
    if (
        isObjectEmpty(error) &&
        updateEmailInput.value != "" &&
        updateUsernameInput.value != "" &&
        updatePasswordInput.value != ""
    ) {
        sendUpdatedProfileDetails();
    } else {
        console.log("Please check the edit profile form!");
    }
});
