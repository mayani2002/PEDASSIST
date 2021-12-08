feather.replace();

var profile_btn = document.querySelector('.profile_btn')
var profile_dropdown = document.querySelector('.profile_dropdown');

function dropdown() {
    profile_btn.classList.toggle("pressed");
    console.log("Profile Icon Clicked");
    profile_dropdown.classList.toggle("show_profile");
}

let btn = document.querySelector("#btn");
let sidenavbar = document.querySelector("#sidenavbar");

// assigning the value of mode_stored_in_local_storage ( which is Stored in local Storage of the user) to mode_stored variable
let mode_stored = localStorage.getItem("mode_stored_in_local_storage");

// connecting the variable dark_mode and light_mode to the button dark_mode and light_mode respectively.
const dark_mode = document.getElementById("dark_mode");
const light_mode = document.getElementById("light_mode");


// Function to enable dark mode by adding the 'dark_theme' class to all the tags in the body, 
// simultaneously replacing the dark_mode button to light_mode button and 
// assigning 'dark' value to variable 'mode_stored_in_local_storage' stored in Local Storage of the user.
const enableDarkMode = () => {
// function to enable dark mode by adding the 'dark_theme' class to all the tags in the body, 
// simultaneously replacing the dark_mode button to light_mode button and 
// assigning 'dark' value to variable 'mode_stored_in_local_storage' stored in Local Storage of the user.
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
btn.onclick = function() {
    sidenavbar.classList.toggle("active");
}
