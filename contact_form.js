// declaring input variables
var contact_form_name = "",
    contact_form_email = "",
    contact_form_phone = "",
    contact_form_message = "";

let contact_form_name_input = document.getElementById("contact_form_name");
let contact_form_email_input = document.getElementById("contact_form_email");
let contact_form_phone_input = document.getElementById("contact_form_pnone_no");
let contact_form_message_input = document.getElementById("contact_form_email_mgs");
let contact_us_form = document.getElementById("contact_us_form");

// error dictionary
var contact_form_error = {};

function validatePhoneNumber(phone_number_input) {
    // var phoneno = ;
    console.log(phone_number_input)
    if (phone_number_input.match(/^\d{10}$/)) {
        return true;
    } else {
        return false;
    }
}

const sendMailFromUser = (email, name, phone, message) => {
    // creating a new XMLHttpReuest
    const xhr = new XMLHttpRequest();
    console.log("email," + email + " name," + name +
        " phone," + phone + " message" + message)

    // Opening a post request
    xhr.open("POST", "user_mailer.php");

    // Defining the type of content that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // sending the actual data in the form "key1=value1 & key2=value2 & kay3=value3.....so on"
    xhr.send("email=" + email + "&name=" + name + "&phone=" + phone + "&message=" + message);

    // Requesting a response from a server
    xhr.onload = function() {
        if (this.response == 1) {
            alert("Your message in sent! You will receive the reply on the email you provided!");
        } else {
            console.log(this.response);
            alert("error!!");
        }
    };
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

// check if the entered name is valid
// const validateNameEntered = (Name) => {
//     return Name.match(
//         /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u
//     );
// };
// check if the entered email is valid
// const validateEmail = (email) => {
//     return email.match(
//         /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
//     );
// };


document.addEventListener("DOMContentLoaded", () => {


    if (readCookie("email") && readCookie("name")) {
        contact_form_name = getCookie("name");
        contact_form_email = getCookie("email");
        contact_form_name_input.value = contact_form_name;
        contact_form_email_input.value = contact_form_email;
        contact_form_name_input.readOnly = true;
        contact_form_email_input.readOnly = true;
    } else {
        // blur event for name input in contact form
        contact_form_name_input.readOnly = false;
        contact_form_email_input.readOnly = false;
        contact_form_name_input.addEventListener("blur", (e) => {
            if (contact_form_name_input.value) {
                contact_form_name = contact_form_name_input.value;
                if (!validateNameEntered(contact_form_name)) {
                    contact_form_error["name"] = "Enter a valid name !";
                    setFormMessage(".contact_form_name_error", contact_form_error["name"]);
                } else {
                    clearFormMessage(".contact_form_name_error");
                    delete contact_form_error["name"];
                }
            }
        });
        // blur event for email input in contact form
        contact_form_email_input.addEventListener("blur", (e) => {
            if (contact_form_email_input.value) {
                contact_form_email = contact_form_email_input.value;
                if (!validateEmail(contact_form_email)) {
                    contact_form_error["email"] = "Enter a valid email !";
                    setFormMessage(".contact_form_email_error", contact_form_error["email"]);
                } else {
                    clearFormMessage(".contact_form_email_error");
                    delete contact_form_error["email"];
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
                setFormMessage(".contact_form_phone_error", contact_form_error["phone"]);
            } else {
                delete contact_form_error["phone"];
                clearFormMessage(".contact_form_phone_error");
            }
        }
    });

    // blur event for Message input in contact form
    contact_form_message_input.addEventListener("blur", (e) => {
        if (contact_form_message_input.value) {
            contact_form_message = contact_form_message_input.value;
        }
    });
    console.log(contact_us_form);

    contact_us_form.addEventListener("submit", (e) => {
        e.preventDefault();
        console.log("you clicked submit!!!");

        if (isObjectEmpty(contact_form_error) &&
            contact_form_name != "" &&
            contact_form_email != "" &&
            contact_form_phone != "" &&
            contact_form_message != "") {
            sendMailFromUser(contact_form_email, contact_form_name, contact_form_phone, contact_form_message)
        } else {
            alert("Please fill the information correctly!");
        }
    });


});