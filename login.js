// error dictionary
var error = {};

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
        console.log(" answer :" + parseInt(this.responseText));
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

// function to store all the details to db
function sendSignupInfo() {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/store_signup_info.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send(
        "&user_name=" + username + "&email=" + e_mail + "&password=" + password
    );

    // Requesting a response from a server
    xhr.onload = function() {
        console.log("response : " + this.response);
        // createCookie(e_mail, username);
        if (readCookie("email") && readCookie("name")) {
            console.log("cookie created!!You signed in!!");
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
    // signup

    username_element = document.getElementById("sign-up-name-input");
    e_mail_element = document.getElementById("sign-up-email-input");
    password_element = document.getElementById("sign-up-password-input");
    conf_password_element = document.getElementById("conf-password-input");
    login_email_element = document.getElementById("login-email-input");
    login_password_element = document.getElementById("login-password-input");

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
                error["conf_password"] = "Passwords do not match ! ";
                setFormMessage(".cpassword_error", error["conf_password"]);
            } else {
                delete error["conf_password"];
                clearFormMessage(".cpassword_error");
            }
        }
    });

    form_sign_up = document.querySelector(".form_sign_up");
    form_sign_up.addEventListener("submit", (e) => {
        e.preventDefault();
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
            // submitSignupForm();
        }
        // setFormMessage(form_sign_up, "Invalid username/password combination");
    });

    // login

    login_email_element.addEventListener("blur", (e) => {
        if (login_email_element.value) {
            login_email = login_email_element.value;
            if (!validateEmail(login_email)) {
                error["login_email"] = "Enter a valid email address !";
                setFormMessage(".login_email_error", error["email"]);
            } else {
                checkIfEmailExistsInDbForLogin(login_email);
            }
        }
    });
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

    form_login = document.querySelector(".form_login");
    form_login.addEventListener("submit", (e) => {
        e.preventDefault();
        console.log(error);
        // Perform your AJAX/Fetch login
        if (
            isObjectEmpty(error) &&
            login_password != "" &&
            login_email != ""
        ) {
            sendLoginInfo(login_password, login_email);
        }
        // setFormMessage(form_sign_up, "Invalid username/password combination");
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
    // }
    // alert("Your credentials do not match !" + password + "\t" + password_1);



});