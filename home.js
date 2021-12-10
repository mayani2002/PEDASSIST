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

var controller = new ScrollMagic.Controller();

var scene = new ScrollMagic.Scene({
        triggerElement: '.facts',
        triggerHook: 0,
        duration: 3000
    })
    .setClassToggle('img.peopleA', 'showA')
    .addTo(controller);

var controller2 = new ScrollMagic.Controller();

var scene2 = new ScrollMagic.Scene({
        triggerElement: '.button_container',
        triggerHook: 0
    })
    .setClassToggle('img.peopleB', 'showB')
    .addTo(controller);
const start = () => {
    setTimeout(function() {
        confetti.start();
    }, 600);
};

const stop = () => {
    setTimeout(function() {
        confetti.stop();
    }, 5000);
};


function showAllBadges(e) {
    var badge1 = document.getElementById("badge1");
    badge1.classList.toggle("badge1-toggle");
    start();
    stop();
    setTimeout(() => { badge1.style.display = "none"; }, 7000)
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});