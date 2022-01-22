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
        document.querySelectorAll(".xmark").forEach(xmark => {
            xmark.style.visibility = 'hidden';
        })
    } else if (cookie_info == 1) {
        document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
        document.querySelector(".signup_popup").classList.remove("show_popup");
        document.querySelector(".login_popup").classList.remove("show_popup");
    }
}

// close login or sign up form
function loginSignUpClose() {
    document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
    document.querySelector(".login_popup").classList.remove("show_popup")
    document.querySelector(".signup_popup").classList.remove("show_popup")
}

// show password on click 
function showPassword() {
    var passwords = document.querySelectorAll(".password-input");
    var cpassword = document.querySelector(".conf-password-input");
    passwords.forEach(password => {
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

// set the error message in the form
function setFormMessage(element, message) {
    error_element = document.querySelector(element);
    error_element.textContent = message;
}

var e_mail = "",
    password = "",
    conf_password = "";

// check if the entered email is valid
const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

// check if the entered password is valid
const validatePassword = (password) => {
    return String(password)
        .match(
            /^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/
        );
};

function sendSignupInfo() {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequst();

    // Requesting a response from a server
    xhr.onload = function() {}

    // Opening a post request
    xhr.open("POST", "assets/checkSignupDetail.php");

    // Defining the type of content that is to be sent
    xhr.serRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("name=" + username + "&email=" + e_mail + "&password=" + password)
}


function sign_up() {

    username = document.getElementById("sign-up-name-input").value;
    e_mail = document.getElementById("sign-up-email-input").value;
    password = document.getElementById("sign-up-password-input").value;
    conf_password = document.getElementById("conf-password-input").value;

    if (!validateEmail(e_mail)) {
        setFormMessage(".email_error", "Enter a valid email address !");
    }
    if (!validatePassword(password)) {
        setFormMessage(".password_error", "Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters")
    }
    if (!validatePassword(conf_password)) {
        setFormMessage(".cpassword_error", "Password should contains at least eight characters, at least one number, lower letters, uppercase letters and special characters")
    }
    if (password != conf_password && validatePassword(conf_password) && validatePassword(password))
        alert("Passwords do not match ! ");
    setFormMessage(".cpassword_error", "Passwords do not match ! ");
    // else {
    // alert("You have signed up successfully !");
    // document.getElementById("main-container-sign-up").style.display = "none";
    // }
}

// function login() {
//     var e_mail1 = "",
//         password_1 = "";
//     e_mail1 = document.getElementById("login-email-input").value;
//     password_1 = document.getElementById("login-password-input").value;
//     if (e_mail == e_mail1 && password == password_1) {
//         alert("You are logged in successfully !");
//         document.getElementById("main-container-sign-up").style.display = "none";
//         document.getElementById("main-container-login").style.display = "flex";
//     } else
//         alert("Your credentials do not match !" + password + "\t" + password_1);
// }
function submitSignupForm() {
    form_sign_up = document.querySelector('.form_sign_up');
    form_sign_up.addEventListener("submit", e => {
        e.preventDefault();

        // Perform your AJAX/Fetch login

        setFormMessage(form_sign_up, "Invalid username/password combination");
    });
}