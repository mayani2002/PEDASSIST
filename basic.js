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
let dark_mode = document.getElementById("dark_mode");
let light_mode = document.getElementById("light_mode");

dark_mode.onclick = function() {
    document.body.classList.toggle("dark_theme");
    if (document.body.classList.contains("dark_theme")) {
        document.getElementById("dark_mode").style.display = "none";
        document.getElementById("light_mode").style.display = "flex";
        // document.getElementById("light_mode").style.display = "flex";
        light_mode.onclick = function() {
        document.body.classList.toggle("dark_theme");
        document.getElementById("dark_mode").style.display = "flex";
                document.getElementById("light_mode").style.display = "none";
            }
        }
}
btn.onclick = function() {
    sidenavbar.classList.toggle("active");
}