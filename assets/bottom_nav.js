let bottom_nav_btns = document.querySelectorAll(".bottom_btn");
let bottom_nav_btn_labels = document.querySelectorAll(".nav_text");

if (document.URL.includes("assessment.php") || document.URL.includes("questions.php")) {
    bottom_nav_btns[2].style.background = "linear-gradient(236.55deg, var(--bottom-btn-gradient-color-two) 12.72%, var(--bottom-btn-gradient-color-one) 73.27%)";
    bottom_nav_btns[2].style.boxShadow = "0px 3px 10px #000000";
    bottom_nav_btn_labels[2].style.display = "block";
} else if (document.URL.includes("lesson")) {
    bottom_nav_btns[1].style.background = "linear-gradient(236.55deg, var(--bottom-btn-gradient-color-two) 12.72%, var(--bottom-btn-gradient-color-one) 73.27%)";
    bottom_nav_btns[1].style.boxShadow = "0px 3px 10px #000000";
    bottom_nav_btn_labels[1].style.display = "block";
} else if (document.URL.includes("badge_page.php")) {
    bottom_nav_btns[3].style.background = "linear-gradient(236.55deg, var(--bottom-btn-gradient-color-two) 12.72%, var(--bottom-btn-gradient-color-one) 73.27%)";
    bottom_nav_btns[3].style.boxShadow = "0px 3px 10px #000000";
    bottom_nav_btn_labels[3].style.display = "block";
} else if (document.URL.includes("index.php") || document.URL.includes("pedassist.in")) {
    bottom_nav_btns[0].style.background = "linear-gradient(236.55deg, var(--bottom-btn-gradient-color-two) 12.72%, var(--bottom-btn-gradient-color-one) 73.27%)";
    bottom_nav_btns[0].style.boxShadow = "0px 3px 10px #000000";
    bottom_nav_btn_labels[0].style.display = "block";
} 