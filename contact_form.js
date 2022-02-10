// declaring input variables
var contact_form_name,
    contact_form_email,
    contact_form_phone,
    contact_form_message;

let contact_form_name_input = document.getElementById("contact_form_name");
let contact_form_email_input = document.getElementById("contact_form_email");
let contact_form_phone_input = document.getElementById("contact_form_pnone_no");
let contact_form_message_input = document.getElementById("contact_form_email_mgs");
let contact_form = document.getElementById("contact_form");

// error dictionary
var contact_form_error = {};

function validatePhoneNumber(phone_number_input) {
    var phoneno = /^\d{10}$/;
    if (phone_number_input.value.match(phoneno)) {
        return true;
    } else {
        return false;
    }
}

const sendMailFromUser = (email, name, phone, message) => {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();

    // Opening a post request
    xhr.open("POST", "assets/.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("&email=" + email + "&name=" + name + "&phone=" + phone + "&message=" + message);

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

document.addEventListener("DOMContentLoaded", () => {


    if (readCookie("email") && readCookie("name")) {
        contact_form_name = contact_form_name_input.value;
        contact_form_email = contact_form_email_input.value;
        contact_form_name = getCookie("name");
        contact_form_email = getCookie("email");
    } else {
        // blur event for name input in contact form
        contact_form_name_input.addEventListener("blur", (e) => {
            if (contact_form_name_input.value) {
                contact_form_name = contact_form_name_input.value;
                if (!validateNameEntered(contact_form_name)) {
                    contact_form_error["name"] = "Enter a valid name !";
                    setFormMessage(".contact_form_name_error", error["name"]);
                }
            }
        });
        // blur event for email input in contact form
        contact_form_email_input.addEventListener("blur", (e) => {
            if (contact_form_email_input.value) {
                contact_form_email = contact_form_email_input.value;
                if (!validateEmail(contact_form_email)) {
                    contact_form_error["email"] = "Enter a valid email !";
                    setFormMessage(".contact_form_email_error", error["email"]);
                }
            }
        });
    }

    // blur event for Phone No. input in contact form
    contact_form_phone_input.addEventListener("blur", (e) => {
        if (contact_form_phone_input.value) {
            contact_form_phone = contact_form_phone_input.value;
            if (!validatePhoneNumber(contact_form_phone)) {
                contact_form_error["phone"] = "Enter a valid Phone No. !";
                setFormMessage(".contact_form_phone_error", error["phone"]);
            }
        }
    });

    // blur event for Message input in contact form
    contact_form_phone_input.addEventListener("blur", (e) => {
        if (contact_form_phone_input.value) {
            contact_form_phone = contact_form_phone_input.value;
        }
    });

    contact_form.addEventListener("submit", (e) => {

    });


});