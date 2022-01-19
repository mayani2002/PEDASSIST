let bottom_nav_btns = document.querySelectorAll(".bottom_btn");
let bottom_nav_btn_labels = document.querySelectorAll(".nav_text");

if (document.URL.includes("assessment.php") || document.URL.includes("questions.php")) {
    bottom_nav_btns[2].style.background = "linear-gradient(236.55deg, #00fff4 12.72%, #1c76ff 73.27%)";
    bottom_nav_btns[2].style.boxShadow = "0px 0px 15px #444444";
    bottom_nav_btn_labels[2].style.display = "block";
} else if (document.URL.includes("lesson")) {
    bottom_nav_btns[1].style.background = "linear-gradient(236.55deg, #00fff4 12.72%, #1c76ff 73.27%)";
    bottom_nav_btns[1].style.boxShadow = "0px 0px 15px #444444";
    bottom_nav_btn_labels[1].style.display = "block";
} else if (document.URL.includes("badge_page.php")) {
    bottom_nav_btns[3].style.background = "linear-gradient(236.55deg, #00fff4 12.72%, #1c76ff 73.27%)";
    bottom_nav_btns[3].style.boxShadow = "0px 0px 15px #444444";
    bottom_nav_btn_labels[3].style.display = "block";
} else if (document.URL.includes("index.php") || document.URL.includes("pedassist.in")) {
    bottom_nav_btns[0].style.background = "linear-gradient(236.55deg, #00fff4 12.72%, #1c76ff 73.27%)";
    bottom_nav_btns[0].style.boxShadow = "0px 0px 15px #444444";
    bottom_nav_btn_labels[0].style.display = "block";
} 