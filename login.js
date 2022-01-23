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

// YAHAN SE.......................................................................................

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
    conf_password = "";

// check if the entered email is valid
const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};


function checkIfEmailExistsInDb() {
    console
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Requesting a response from a server
    xhr.onload = function() {
        return parseInt(this.responseText);
    }

    // Opening a post request
    xhr.open("POST", "assets/check_if_email_exists_in_db.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("email=" + e_mail);
}

// check if the entered password is valid
const validatePassword = (password) => {
    return String(password)
        .match(
            /^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/
        );
};

// function to store all the details to db 
function sendSignupInfo() {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Requesting a response from a server
    xhr.onload = function() {}

    // Opening a post request
    xhr.open("POST", "assets/store_signup_info.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("name=" + username + "&email=" + e_mail + "&password=" + password)
}

// adding submit event to the form 
function submitSignupForm() {

}

document.addEventListener("DOMContentLoaded", () => {

    // error dictionary
    var error = {};

    username_element = document.getElementById("sign-up-name-input");
    e_mail_element = document.getElementById("sign-up-email-input");
    password_element = document.getElementById("sign-up-password-input");
    conf_password_element = document.getElementById("conf-password-input");

    username = e_mail_element.value;

    e_mail_element.addEventListener('blur', e => {
        e_mail = e_mail_element.value;
        if (e_mail != "") {
            if (!validateEmail(e_mail)) {
                error['email'] = "Enter a valid email address !";
                setFormMessage(".email_error", error['email']);
            } else if (!checkIfEmailExistsInDb()) {
                error['email'] = "There is already an account with this email !";
                setFormMessage(".email_error", error['email']);
            } else {
                delete error['email'];
                clearFormMessage(".email_error");
            }
        }
    });

    password_element.addEventListener("blur", e => {
        password = password_element.value;
        if (password != "") {
            if (!validatePassword(password)) {
                console.log(error);
                error['password'] = "Invalid Password !";
                setFormMessage(".password_error", error['password']);
            } else if (password != conf_password && validatePassword(conf_password) && conf_password != "") {
                error['password'] = "Passwords do not match ! ";
                setFormMessage(".cpassword_error", error['password']);
                console.log(error);
            } else {
                delete error['password'];
                console.log(error);
                clearFormMessage(".password_error");
                console.log(error);
            }
        }
    });

    conf_password_element.addEventListener("blur", e => {
        conf_password = conf_password_element.value;
        if (conf_password != "") {
            if (!validatePassword(conf_password)) {
                error['conf_password'] = "Invalid Password !";
                setFormMessage(".cpassword_error", error['conf_password']);
                console.log(error);
            } else if (password != conf_password && validatePassword(password) && password != "") {
                error['conf_password'] = "Passwords do not match ! ";
                setFormMessage(".cpassword_error", error['conf_password']);
                console.log(error);
            } else {
                delete error['password'];
                console.log(error);
                clearFormMessage(".cpassword_error");
            }
        }
    });


    form_sign_up = document.querySelector('.form_sign_up');
    form_sign_up.addEventListener("submit", e => {
        e.preventDefault();
        console.log(error);
        // Perform your AJAX/Fetch login
        // sendSignupInfo();
        // setFormMessage(form_sign_up, "Invalid username/password combination");
    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "sign-up-name-input" && e.target.value.length > 0 && e.target.value.length < 10) {
                setFormMessage(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearFormMessage("#" + e.target.id);
            alert(e.target.id);
        });
    });


});























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
// }       alert("Your credentials do not match !" + password + "\t" + password_1);
// }