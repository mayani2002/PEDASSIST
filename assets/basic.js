var profile_btn = document.querySelector('.profile_btn');
var profileButtonIcon = document.querySelector('.profile_btn_icon');
var profile_dropdown = document.querySelector('.profile_dropdown');
var hiddenLogInButton = document.querySelector('.hidden_login_btn');

// Variable to store the reference of profile image container
let profileImageInProfileDropdown = document.querySelector(".profile_image_in_profile_dropdown");

// Setting the variable for number of badges on the badge_page
let noOfBadgesInProfileDropdown = document.querySelector(".num_of_badges_in_profile_dropdown");

var logout = document.querySelector('.logout');
var cookie_state;
// let email_svg = document.getSVGDocument().getElementById("email_svg");
// logout.addEventListener('click', deleteCookie());

// Variable to store the reference of the edit profile form
var editProfileForm = document.querySelector(".edit_profile_form");

editProfileForm.addEventListener("submit", (e) => {
    e.preventDefault();
})

hiddenLogInButton.addEventListener('click', function() {
    document.querySelector(".login_popup").classList.add("show_popup");
});

profileButtonIcon.addEventListener('click', function(e) {
    profile_btn.classList.toggle("pressed");
    console.log("Profile Button Icon Clicked");
    profile_dropdown.classList.toggle("show_profile");
    console.log("read_cookie" + readCookie('name'));

    window.onclick = function(event) {
        // The following conditions checks where the user has clicked exclcuding the Profile Button itself.
        if (event.target.matches(".profile_btn_icon") || event.target.matches(".profile_icon_svg") || event.target.matches(".profile_dropdown")) {
            console.log("You clicked the icon or button or dropdown!");
        } else {
            console.log("You clicked outside!");
            // The following code with close the profile drop down if anywhere on the screen is clicked
            var tempProfileBtn = document.getElementsByClassName("profile_btn");
            var tempProfileDropDown = document.getElementsByClassName("profile_dropdown");

            for (let i = 0; i < tempProfileDropDown.length; i++) {
                var tempDropDown = tempProfileDropDown[i];
                var tempBtn = tempProfileBtn[i]
                if (tempDropDown.classList.contains("show_profile") && tempBtn.classList.contains("pressed")) {
                    tempDropDown.classList.remove("show_profile");
                    tempBtn.classList.remove("pressed");
                }
            }
        }
    }
});


let navbtn = document.querySelector(".nav_btn_icon");
let sidenavbar = document.querySelector(".sidenavbar");

// assigning the value of mode_stored_in_local_storage ( which is Stored in local Storage of the user) to mode_stored variable
let mode_stored = localStorage.getItem("mode_stored_in_local_storage");

// connecting the variable dark_mode and light_mode to the button dark_mode and light_mode respectively.
const dark_mode = document.getElementById("dark_mode");
const light_mode = document.getElementById("light_mode");
const dark_mode_header = document.getElementById("dark_mode_header");
const light_mode_header = document.getElementById("light_mode_header");


// function to enable dark mode by adding the 'dark_theme' class to all the tags in the body, 
// simultaneously replacing the dark_mode button to light_mode button and 
// assigning 'dark' value to variable 'mode_stored_in_local_storage' stored in Local Storage of the user.
function enableDarkMode() {
    document.body.classList.add('dark_theme');
    document.getElementById('dark_mode').style.display = "none";
    document.getElementById('light_mode').style.display = "flex";
    document.getElementById('dark_mode_header').style.display = "none";
    document.getElementById('light_mode_header').style.display = "flex";
    localStorage.setItem('mode_stored_in_local_storage', 'dark');
}

// function to enable light mode by removing the 'dark_theme' class to all the tags in the body, 
// simultaneously replacing the light_mode button to dark_mode button and 
// assigning 'light' value to variable 'mode_stored_in_local_storage' stored in Local Storage of the user.
function enableLightMode() {
    document.body.classList.remove('dark_theme');
    document.getElementById('dark_mode').style.display = "flex";
    document.getElementById('light_mode').style.display = "none";
    document.getElementById('dark_mode_header').style.display = "flex";
    document.getElementById('light_mode_header').style.display = "none";
    localStorage.setItem('mode_stored_in_local_storage', 'light');
    // email_svg.setAttribute("fill", "black");
}

// change thw theme according to the mode set in the local storage (by user)
mode_stored = localStorage.getItem("mode_stored_in_local_storage");
if (mode_stored == 'dark') {
    enableDarkMode();
} else {
    enableLightMode();
}

// adding Event Listeners on light_mode and dark_mode button.
light_mode.addEventListener("click", enableLightMode);
dark_mode.addEventListener("click", enableDarkMode);


// adding Event Listeners on light_mode and dark_mode button of mobile screen.
light_mode_header.addEventListener("click", enableLightMode);
dark_mode_header.addEventListener("click", enableDarkMode);

// For opening and closing of the side navigation bar
navbtn.onclick = function(e) {
    sidenavbar.classList.toggle("active");
    window.onclick = function(event) {
        if (event.target.matches(".nav_btn_icon") || event.target.matches(".sidenavbar") || event.target.matches(".nav_btn") || event.target.matches(".menu_btn_burger")) {

        } else {
            sidenavbar.classList.remove("active");
        }
    }
}

// function to hide login button or profile button depending on cookie
function hideLoginButton(cookie_info) {
    cookie_state = cookie_info;
    if (cookie_state == 0) {
        document.querySelector(".hidden_login_btn").style.display = "flex";
        document.querySelector(".profile_btn").style.display = "none";
    } else if (cookie_state == 1) {
        document.querySelector(".hidden_login_btn").style.display = "none";
        document.querySelector(".profile_btn").style.display = "flex";
    }
}

document.querySelectorAll(".img_frame").forEach(imgFrame => {
    imgFrame.addEventListener('mouseover', () => {
        console.log(imgFrame.dataset["framenumber"]);
        if (imgFrame.dataset["framenumber"] == 1) {
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(2px)";
            imgFrame.nextElementSibling.nextElementSibling.style.filter = "blur(2px)";
        } else if (imgFrame.dataset["framenumber"] == 2) {
            imgFrame.previousElementSibling.style.filter = "blur(2px)";
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(2px)";
        } else if (imgFrame.dataset["framenumber"] == 3) {
            imgFrame.previousElementSibling.style.filter = "blur(2px)";
            imgFrame.previousElementSibling.previousElementSibling.style.filter = "blur(2px)";
            imgFrame.style.filter = "blur(0px)";
        }
    })
});

document.querySelectorAll(".img_frame").forEach(imgFrame => {
    imgFrame.addEventListener('mouseout', () => {
        if (imgFrame.dataset["framenumber"] == 1) {
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.nextElementSibling.style.filter = "blur(0px)";
        } else if (imgFrame.dataset["framenumber"] == 2) {
            imgFrame.previousElementSibling.style.filter = "blur(0px)";
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(0px)";
        } else if (imgFrame.dataset["framenumber"] == 3) {
            imgFrame.previousElementSibling.style.filter = "blur(0px)";
            imgFrame.previousElementSibling.previousElementSibling.style.filter = "blur(0px)";
            imgFrame.style.filter = "blur(0px)";
        }
    })
})

// show badges on each lesson completion
function showAllBadges(currentLessonNumberFromDb) {
    var badges_container = document.getElementById("badges_container");
    badges_container.style.display = "flex";
    document.getElementById("badge").style.backgroundImage = "url(SVG/badge_" + (currentLessonNumberFromDb) + ".svg)";
    console.log(currentLessonNumberFromDb);
    console.log(badges_container);
    console.log(document.getElementById("badge"));
    setTimeout(function() {
        confetti.start();
    }, 600);
    setTimeout(function() {
        confetti.stop();
    }, 5000);
    setTimeout(() => { badges_container.style.display = "none"; }, 7500);
}

function getCookie(name) {
    var dc = document.cookie;
    console.log("document.cookie = " + document.cookie);
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    console.log('dc.indexOf("; " + prefix) = ' + begin);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    } else {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
}

function readCookie(name) {
    var cookiename = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(cookiename) == 0) {
            console.log(c.substring(cookiename.length, c.length));
            return c.substring(cookiename.length, c.length);
        }
    }
    return 0;
}

function createCookie(email, name) {
    const d = new Date();
    console.log(new Date());
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
    console.log("d.setTime = " + d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000)));
    let expires = "expires=" + d.toUTCString();
    console.log(expires);
    document.cookie = "email=" + email + "; " + expires + "; path=/";
    document.cookie = "name=" + name + ";  " + expires + "; path=/";
}

function signOut() {

    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
        console.log('User signed out.');
    });
}

function deleteCookie() {
    document.cookie = "name" + '=;  expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    document.cookie = "email" + '=;  expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    location.reload();
}

function fetchCurrentLessonNumber() {
    let response;

    // Creating a new XMLHttpRequest()
    const xhr = new XMLHttpRequest();

    // Opening a GET request
    xhr.open("GET", "assets/fetch_lesson_number.php");

    // Defining the type of content(data) that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Sending the actual data in the form: "key1=value1&key2=value2&key3=value3......so on"
    xhr.send();

    // Requesting a response from server
    xhr.onload = function() {
        response = this.responseText;
        currentLessonNumrFromDb = parseInt(response);
        setCurrentLessonNumberFromDb(currentLessonNumrFromDb);
    }
}

function fetchProfileImageNameFromDb() {
    console.log("I am in fetchProfileImageNameFromDb");

    let profileImageNameFromDb;

    // Creating a new XMLHttpRequest()
    const xhr = new XMLHttpRequest();

    // Opening a GET request
    xhr.open("GET", "assets/fetch_profile_image_name.php");

    // Sending the actual data in the form: "key1=value1&key2=value2&key3=value3......so on"
    xhr.send();

    // Requesting a response from server
    xhr.onload = function() {
        profileImageNameFromDb = this.responseText;

        if (parseInt(profileImageNameFromDb) == 0 || parseInt(profileImageNameFromDb) == 1 || parseInt(profileImageNameFromDb) == 2 || profileImageNameFromDb == "No Image Selected") {

        } else {
            console.log("I am in error!");
            console.log(profileImageInProfileDropdown);
            profileImageInProfileDropdown.style.backgroundImage = "url(assets/user_profile_image_uploads/" + profileImageNameFromDb + ")";
            document.querySelector(".update_profile_image").style.backgroundImage = "url(assets/user_profile_image_uploads/" + profileImageNameFromDb + ")";
            console.log("url(assets/user_profile_image_uploads/" + profileImageNameFromDb + ")");
        }
    }
}

function setCurrentLessonNumberFromDb(lessonNumberFromDb) {
    if (lessonNumberFromDb == 0)
        noOfBadgesInProfileDropdown.innerHTML = parseInt(lessonNumberFromDb);
    else 
        noOfBadgesInProfileDropdown.innerHTML = parseInt(lessonNumberFromDb) - 1;
}

window.onload = function() {
    console.log("I am in window.onload!");
    fetchCurrentLessonNumber();
    fetchProfileImageNameFromDb();
}
