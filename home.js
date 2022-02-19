// 
var tutorial_btn = document.querySelector('.TUTORIALS');
var assisment_btn = document.querySelector('.ASSESSMENT');
var rules_btn = document.querySelector('.ABOUT');
var content_tutorial = document.querySelector('.content_tutorial');
var content_assisment = document.querySelector('.content_assisment');
var content_rules = document.querySelector('.content_rules');
// change FACTS (;
var left_txt = document.querySelector(".right_align");
var center_txt = document.querySelector(".center_align");
var right_txt = document.querySelector(".left_align");
var Quote1 = "Children who experience more positive interactions in their early years go on to be healthier and more successful in school and in life. Unfortunately, the opposite is true as well. Poverty, exposure to family violence and lack of access to quality early learning experiences can negatively impact a child’ s early brain development, and subsequently, their long - term success.";
var Quote2 = "At birth, the average baby’s brain is about a quarter of the size of the average adult brain. Incredibly, it doubles in size in the first year. It keeps growing to about 80% of adult size by age 3 and 90% – nearly full grown – by age 5.";
var Quote3 = "This “serve and return” process is fundamental to the wiring of the brain. Parents and caregivers who give attention, respond and interact with their child are literally building the child’s brain. That’s why it’s so important to talk,sing, read and play with young children from the day they’ re born.";
const right_button = document.querySelector('.right_button');
const left_button = document.querySelector('.left_button');
const media_aditya = document.querySelector('.media_aditya');
const media_mayani = document.querySelector('.media_mayani');
const media_tanmay = document.querySelector('.media_tanmay');

function right_button_click() {
    let temp = Quote3;
    Quote3 = Quote2;
    Quote2 = temp;
    let center_fact = '<blockquote class="container">' + Quote2 + '</blockquote>';
    let right_fact = '<blockquote class="container">' + Quote3 + '</blockquote>';
    right_txt.innerHTML = right_fact;
    center_txt.innerHTML = center_fact;
}

function left_button_click() {
    let temp = Quote1;
    Quote1 = Quote2;
    Quote2 = temp;
    let center_fact = '<blockquote class="container">' + Quote2 + '</blockquote>';
    let left_fact = '<blockquote class="container">' + Quote1 + '</blockquote>';
    left_txt.innerHTML = left_fact;
    center_txt.innerHTML = center_fact;
}

function display_tutorial() {
    content_tutorial.style.display = "block";
    content_assisment.style.display = "none";
    content_rules.style.display = "none";

    tutorial_btn.classList.remove("dont_display");
    assisment_btn.classList.remove("display");
    rules_btn.classList.remove("display");
}

function display_assisment() {
    content_tutorial.style.display = "none";
    content_assisment.style.display = "block";
    content_rules.style.display = "none";

    tutorial_btn.classList.add("dont_display");
    assisment_btn.classList.add("display");
    rules_btn.classList.remove("display");
}

function display_rules() {
    content_tutorial.style.display = "none";
    content_assisment.style.display = "none";
    content_rules.style.display = "block";

    tutorial_btn.classList.add("dont_display");
    assisment_btn.classList.remove("display");
    rules_btn.classList.add("display");

}

document.querySelectorAll(".img_frame").forEach(imgFrame => {
    imgFrame.addEventListener('mouseover', () => {
        // console.log(imgFrame.dataset["framenumber"]);
        if (imgFrame.dataset["framenumber"] == 1) {
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(2px)";
            imgFrame.nextElementSibling.style.filter = "blur(2px)";
            media_aditya.style.visibility = "visible";
            media_aditya.style.opacity = "1";
        } else if (imgFrame.dataset["framenumber"] == 2) {
            imgFrame.previousElementSibling.style.filter = "blur(2px)";
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(2px)";
            media_mayani.style.visibility = "visible";
            media_mayani.style.opacity = "1";
        } else if (imgFrame.dataset["framenumber"] == 3) {
            imgFrame.previousElementSibling.style.filter = "blur(2px)";
            imgFrame.previousElementSibling.previousElementSibling.style.filter = "blur(2px)";
            imgFrame.style.filter = "blur(0px)";
            media_tanmay.style.visibility = "visible";
            media_tanmay.style.opacity = "1";
        }
    })
});

document.querySelectorAll(".img_frame").forEach(imgFrame => {
    imgFrame.addEventListener('mouseout', () => {
        if (imgFrame.dataset["framenumber"] == 1) {
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.nextElementSibling.style.filter = "blur(0px)";
            media_aditya.style.visibility = "hidden";
            media_aditya.style.opacity = "0";
        } else if (imgFrame.dataset["framenumber"] == 2) {
            imgFrame.previousElementSibling.style.filter = "blur(0px)";
            imgFrame.style.filter = "blur(0px)";
            imgFrame.nextElementSibling.style.filter = "blur(0px)";
            media_mayani.style.visibility = "hidden";
            media_mayani.style.opacity = "0";

        } else if (imgFrame.dataset["framenumber"] == 3) {
            imgFrame.previousElementSibling.style.filter = "blur(0px)";
            imgFrame.previousElementSibling.previousElementSibling.style.filter = "blur(0px)";
            imgFrame.style.filter = "blur(0px)";
            media_tanmay.style.visibility = "hidden";
            media_tanmay.style.opacity = "0";
        }
    })
})


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

function showSocialMedia(classname) {
    document.querySelectorAll(classname).forEach(function(socialMedia) {
        socialMedia.style.display = "flex";
    });
}

function hideSocialMedia(classname) {
    document.querySelectorAll(classname).forEach(function(socialMedia) {
        socialMedia.style.display = "none";
    });
}

window.onload = function() {
    // console.log("I am in home.js window.onload!");
    fetchProfileImageNameFromDb();
}