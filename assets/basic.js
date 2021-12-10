// feather.replace();

var profile_btn = document.querySelector('.profile_btn');
var profile_dropdown = document.querySelector('.profile_dropdown');
var cookie_state;

profile_btn.addEventListener('click', function(e) {
    if(e.target.matches(".profile_btn") || e.target.matches(".profile_btn_icon")) {
        profile_btn.classList.add("pressed");
        console.log("Profile Icon Clicked");
        profile_dropdown.classList.add("show_profile");
        console.log(profile_dropdown.classList);

        window.onclick = function(event) {
            // The following conditions checks where the user has clicked exclcuding the Profile Button itself.
            if (!event.target.matches(".profile_btn")) {

                // The following code with close the profile drop down if anywhere on the screen is clicked
                var tempProfileBtn = document.getElementsByClassName("profile_btn");
                var tempProfileDropDown = document.getElementsByClassName("profile_dropdown");

                for (let i = 0; i < tempProfileDropDown.length; i++) {
                    var tempDropDown = tempProfileDropDown[i];
                    var tempBtn = tempProfileBtn[i]
                    if (tempDropDown.classList.contains("show_profile") && tempBtn.classList.contains("pressed")) {
                        tempDropDown.classList.remove("show_profile");
                        tempBtn.classList.remove("pressed")
                    }
                }
            }
        }
    }
})

function dropdown() {
    profile_btn.classList.add("pressed");
    console.log("Profile Icon Clicked");
    profile_dropdown.classList.add("show_profile");
    console.log(profile_dropdown.classList);

    window.onclick = function(event) {
        // The following conditions checks where the user has clicked exclcuding the Profile Button itself.
        if (!event.target.matches(".profile_btn")) {

            // The following code with close the profile drop down if anywhere on the screen is clicked
            var tempProfileBtn = document.getElementsByClassName("profile_btn");
            var tempProfileDropDown = document.getElementsByClassName("profile_dropdown");

            for (let i = 0; i < tempProfileDropDown.length; i++) {
                var tempDropDown = tempProfileDropDown[i];
                var tempBtn = tempProfileBtn[i]
                if (tempDropDown.classList.contains("show_profile") && tempBtn.classList.contains("pressed")) {
                    tempDropDown.classList.remove("show_profile");
                    tempBtn.classList.remove("pressed")
                }
            }
        }
    }
}

let navbtn = document.querySelector(".nav_icon");
let sidenavbar = document.querySelector(".sidenavbar");

// assigning the value of mode_stored_in_local_storage ( which is Stored in local Storage of the user) to mode_stored variable
let mode_stored = localStorage.getItem("mode_stored_in_local_storage");

// connecting the variable dark_mode and light_mode to the button dark_mode and light_mode respectively.
const dark_mode = document.getElementById("dark_mode");
const light_mode = document.getElementById("light_mode");


// function to enable dark mode by adding the 'dark_theme' class to all the tags in the body, 
// simultaneously replacing the dark_mode button to light_mode button and 
// assigning 'dark' value to variable 'mode_stored_in_local_storage' stored in Local Storage of the user.
const enableDarkMode = () => {
    document.body.classList.add('dark_theme');
    document.getElementById("dark_mode").style.display = "none";
    document.getElementById("light_mode").style.display = "flex";
    localStorage.setItem('mode_stored_in_local_storage', 'dark');
}

// function to enable light mode by removing the 'dark_theme' class to all the tags in the body, 
// simultaneously replacing the light_mode button to dark_mode button and 
// assigning 'light' value to variable 'mode_stored_in_local_storage' stored in Local Storage of the user.
const enableLightMode = () => {
    document.body.classList.remove('dark_theme');
    document.getElementById("dark_mode").style.display = "flex";
    document.getElementById("light_mode").style.display = "none";
    localStorage.setItem('mode_stored_in_local_storage', 'light');
}


mode_stored = localStorage.getItem("mode_stored_in_local_storage");
if (mode_stored == 'dark') {
    enableDarkMode();
}

// adding Event Listeners on light_mode and dark_mode button.
light_mode.addEventListener("click", enableLightMode);
dark_mode.addEventListener("click", enableDarkMode);

// For opening and closing of the side navigation bar
navbtn.onclick = function() {
    sidenavbar.classList.toggle("active");

    window.onclick = function(event) {
        if (!(event.target.matches(".navbtn") || event.target.matches(".sidenavbar") || event.target.matches(".btn"))) {
            sidenavbar.classList.remove("active");
        }
    }
}

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

function displayLoginSignupForm(cookie_info) {
    // console.log(cookie_state);
    if (cookie_info == 0) {
        setTimeout(function() {
            document.querySelector(".login_popup").style.display = "flex";
        }, 1000);
    } else if (cookie_state == 1) {
        document.querySelector(".signup_popup").style.display = "none";
        document.querySelector(".login_popup").style.display = "none";
    }
}

function toggleLoginSignupForm(in_login) {
    if (in_login) {
        document.querySelector(".login_popup").style.display = "none";
        document.querySelector(".signup_popup").style.display = "flex";
    } else {
        document.querySelector(".login_popup").style.display = "flex";
        document.querySelector(".signup_popup").style.display = "none";
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
    console.log("mouseover");
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