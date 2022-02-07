// error dictionary
var error = {};

// Variable to store the reference of signup form
let form_sign_up = document.querySelector(".form_sign_up");

// Variable to store the reference of login form
let form_login = document.querySelector(".form_login");

// switch between login and sign up form
function toggleLoginSignupForm(in_login) {
    document.getElementsByTagName("body")[0].classList.add("hide_scroll");
    if (in_login) {
        document.querySelector(".login_popup").classList.remove("show_popup");
        document.querySelector(".signup_popup").classList.add("show_popup");
    } else {
        document.querySelector(".login_popup").classList.add("show_popup");
        document.querySelector(".signup_popup").classList.remove("show_popup");
    }
}

// display login form after every 10 sec
function displayLoginSignupFormWithDelay(cookie_info) {
    if (cookie_info == 0) {
        setTimeout(function() {
            document.getElementsByTagName("body")[0].classList.add("hide_scroll");
            document.querySelector(".login_popup").classList.add("show_popup");
        }, 10000);
    } else if (cookie_info == 1) {
        document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
        document.querySelector(".signup_popup").classList.remove("show_popup");
        document.querySelector(".login_popup").classList.remove("show_popup");
    }
}

// display login form
function signUpOrLoginToContinue(cookie_info) {
    if (cookie_info == 0) {
        document.getElementsByTagName("body")[0].classList.add("hide_scroll");
        document.querySelector(".signup_popup").classList.add("show_popup");
        document.querySelectorAll(".xmark").forEach((xmark) => {
            xmark.style.visibility = "hidden";
        });
    } else if (cookie_info == 1) {
        document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
        document.querySelector(".signup_popup").classList.remove("show_popup");
        document.querySelector(".login_popup").classList.remove("show_popup");
    }
}

// close login or sign up form
function loginSignUpClose() {
    document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
    document.querySelector(".login_popup").classList.remove("show_popup");
    document.querySelector(".signup_popup").classList.remove("show_popup");
    username_element.value = "";
    e_mail_element.value = "";
    password_element.value = "";
    conf_password_element.value = "";
}

// show password on click
function showPassword() {
    var passwords = document.querySelectorAll(".password-input");
    var cpassword = document.querySelector(".conf-password-input");
    passwords.forEach((password) => {
        if (password.type === "password") {
            password.type = "text";
            console.log("text");
        } else {
            password.type = "password";
            console.log("password");
        }
    });

    if (cpassword.type === "password") {
        cpassword.type = "text";
        console.log("ctext");
    } else {
        cpassword.type = "password";
        console.log("cpassword");
    }
}

// check if object is empty
function isObjectEmpty(obj) {
    return Object.keys(obj).length === 0;
}
// set the error message in the form
function setFormMessage(element, message) {
    error_element = document.querySelector(element);
    error_element.textContent = message;
}

// clear the pervious message
function clearFormMessage(element) {
    error_element = document.querySelector(element);
    error_element.textContent = "";
}


// declaring input variables
var username = "",
    e_mail = "",
    password = "",
    conf_password = "",
    login_email = "",
    login_password = "";

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    username = profile.getName();
    e_mail = profile.getEmail();
    signinBySocialMedia(e_mail, username);
}

const signinBySocialMedia = (email, name) => {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/signin_without_password.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("&email=" + email + "&name=" + name);

    // Requesting a response from a server
    xhr.onload = function() {
        if (readCookie("email") && readCookie("name")) {
            console.log("cookie created!!You signed in!!");
            location.reload();
        } else {
            console.log("cookie doesnot exist! signin failed");
        }
    };
}

// check if the entered name is valid
const validateNameEntered = (Name) => {
    return Name.match(
        /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u
    );
};

// check if the entered email is valid
const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const checkIfEmailExistsInDbForSignUp = (email) => {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/check_if_email_exists_in_db.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("email=" + email);

    // Requesting a response from a server
    xhr.onload = function() {
        console.log(" answer :" + parseInt(this.responseText));
        if (parseInt(this.responseText)) {
            error["email"] = "There is already an account with this email !";
            setFormMessage(".email_error", error["email"]);
        } else {
            delete error["email"];
            clearFormMessage(".email_error");
        }
    };
};

const checkIfEmailExistsInDbForLogin = (email) => {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/check_if_email_exists_in_db.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("email=" + email);

    // Requesting a response from a server
    xhr.onload = function() {
        console.log("answer :" + parseInt(this.responseText));
        if (parseInt(this.responseText)) {
            delete error["login_email"];
            clearFormMessage(".login_email_error");
        } else {
            error["login_email"] = "There is no account with this email !";
            setFormMessage(".login_email_error", error["login_email"]);
        }
    };
};

// check if the entered password is valid
const validatePassword = (password) => {
    return String(password).match(
        /^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/
    );
};

// Function to store all the details to db
function sendSignupInfo() {
    // Getting the form data entered by the user
    let signUpFormData = new FormData(form_sign_up);

    // Creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/store_signup_info.php");

    // Defining the type of content that is to be sent
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    // xhr.send(
    //     "&user_name=" + username + "&email=" + e_mail + "&password=" + password
    // );
    xhr.send(signUpFormData);

    // Requesting a response from a server
    xhr.onload = function() {
        console.log("response : " + this.response);
        // createCookie(e_mail, username);
        if (readCookie("email") && readCookie("name")) {
            console.log("Cookie created!!You signed in!!");
            location.reload();

        } else {
            console.log("cookie doesnot exist! signin failed");
        }
    };
}

// send login info 
function sendLoginInfo(login_password, login_email) {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/make_user_login.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send(
        "&login_password=" + login_password + "&login_email=" + login_email
    );

    // Requesting a response from a server
    xhr.onload = function() {
        console.log("response : " + this.response);
        // createCookie(e_mail, username);
        if (readCookie("email") && readCookie("name")) {
            console.log("cookie created!! You logged in!!");
            location.reload();
        } else {
            setFormMessage('.login_error', 'Invalid credentials !');
            console.log("cookie doesnot exist! login failed!!");
        }
    };
}
// }

// adding submit event to the form

document.addEventListener("DOMContentLoaded", () => {

    // Reference to the input elements and button on sign up page
    username_element = document.getElementById("sign-up-name-input");
    e_mail_element = document.getElementById("sign-up-email-input");
    password_element = document.getElementById("sign-up-password-input");
    conf_password_element = document.getElementById("conf-password-input");
    profile_image_input = document.getElementById("profile-image-input");
    signup_submit_btn = document.querySelector(".signup-submit-btn");

    // Reference to the input elements and button on login page
    login_email_element = document.getElementById("login-email-input");
    login_password_element = document.getElementById("login-password-input");
    login_submit_btn = document.querySelector(".login-submit-btn");

    // Name in sign up form
    username_element.addEventListener("blur", (e) => {
        if (username_element.value) {
            username = username_element.value;
            if (!validateNameEntered(username)) {
                error["name"] = "Enter a valid name !";
                setFormMessage(".name_error", error["name"]);
            } else {
                delete error["name"];
                clearFormMessage(".name_error");
            }
        }
    });

    // Email in signup form
    e_mail_element.addEventListener("blur", (e) => {
        if (e_mail_element.value) {
            e_mail = e_mail_element.value;
            if (!validateEmail(e_mail)) {
                error["email"] = "Enter a valid email address !";
                setFormMessage(".email_error", error["email"]);
            } else {
                checkIfEmailExistsInDbForSignUp(e_mail);
            }
        }
    });

    // Password in sign up form
    password_element.addEventListener("blur", (e) => {
        if (password_element.value) {
            password = password_element.value;

            if (!validatePassword(password)) {
                error["password"] = "Invalid Password !";
                setFormMessage(".password_error", error["password"]);
            } else if (
                password != conf_password &&
                validatePassword(conf_password) &&
                conf_password != ""
            ) {
                error["password"] = "Passwords do not match ! ";
                setFormMessage(".cpassword_error", error["password"]);
            } else {
                delete error["password"];
                clearFormMessage(".password_error");
            }
        }
    });

    // Confirm password in sign up form
    conf_password_element.addEventListener("blur", (e) => {
        if (conf_password_element.value) {
            conf_password = conf_password_element.value;
            if (!validatePassword(conf_password)) {
                error["conf_password"] = "Invalid Password !";
                setFormMessage(".cpassword_error", error["conf_password"]);
            } else if (
                password != conf_password &&
                validatePassword(password) &&
                password != ""
            ) {
                error["conf_password"] = "Passwords do not match !";
                setFormMessage(".cpassword_error", error["conf_password"]);
            } else {
                delete error["conf_password"];
                clearFormMessage(".cpassword_error");
            }
        }
    });

    // Profile image input in sign up form
    profile_image_input.addEventListener("change", () => {

        // Checking whether the user has uploaded any file 
        if (profile_image_input.files.length != 0) {
            let fileSize = (profile_image_input.files[0].size / 1048576).toFixed(2);

            // Checking the size of the file uploaded by the user
            if (fileSize > 1) {

                // Displaying the error if file size exceeds 1mb
                error["profile_image_size"] = "Size of the file selected exceeds 1mb !";
                setFormMessage(".profile_image_error", error["profile_image_size"]);
            } else {
                if (error["profile_image_size"] != null) {

                    // Deleting the error message from error dictionary if the user selects a 
                    // file which is of appropriate size in next turn
                    delete error["profile_image_size"];
                    clearFormMessage(".profile_image_error");
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

    // Preventing the default behaviour of signup form submission
    form_sign_up.addEventListener("submit", (e) => {
        e.preventDefault();
    });

    // Event listener for submit button on sign up page
    signup_submit_btn.addEventListener("click", () => {
        console.log(error);
        // Perform your AJAX/Fetch login
        if (
            isObjectEmpty(error) &&
            username != "" &&
            e_mail != "" &&
            password != "" &&
            conf_password != ""
        ) {
            sendSignupInfo();
        } else {
            alert("Please fill the sign up form as per the instructions given!");
        }
    });

    // Email for logging in
    login_email_element.addEventListener("blur", (e) => {
        if (login_email_element.value) {
            login_email = login_email_element.value;
            if (!validateEmail(login_email)) {
                console.log(login_email);
                error["login_email"] = "Enter a valid email address !";
                setFormMessage(".login_email_error", error["login_email"]);
            } else {
                checkIfEmailExistsInDbForLogin(login_email);
            }
        }
    });

    // Password for logging in
    login_password_element.addEventListener("blur", (e) => {
        if (login_password_element.value) {
            login_password = login_password_element.value;
            if (!validatePassword(login_password)) {
                error["login_password"] = "Invalid Password !";
                setFormMessage(".login_password_error", error["login_password"]);
            } else {
                delete error["login_password"];
                clearFormMessage(".login_password_error");
            }
        }
    });

    // Preventing the default behaviour of login form submission
    form_login.addEventListener("submit", (e) => {
        e.preventDefault();
    });

    // Event listener for submit button on login page
    login_submit_btn.addEventListener("click", () => {
        console.log(error);
        // Perform your AJAX/Fetch login
        if (
            isObjectEmpty(error) &&
            login_password != "" &&
            login_email != ""
        ) {
            sendLoginInfo(login_password, login_email);
        } else {
            alert("Please fill the login information correctly!");
        }
    });
});