// A variable to store current lesson number from database
let currentLessonNumrFromDb;

// Variables to store the reference of lesson number 2, 3 & 4
const badge_container = document.querySelectorAll(".badge_container");

// Setting the variable for number of badges on the badge_page
let noOfBadges = document.querySelector(".no_of_badges");

// The following function generates a XML request to fetch the current lesson number from the database
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
        displayBadges(currentLessonNumrFromDb);
    }
}

function displayBadges(currentLessonNumberFromDb) {
    console.log(currentLessonNumberFromDb);

    badge_container.forEach(badge => {

        if (parseInt(badge.dataset["bdg_number"]) < currentLessonNumberFromDb) {
            console.log(badge.dataset["bdg_number"]);
            badge.style.backgroundImage = "url(\'SVG/badge_" + badge.dataset["bdg_number"] + ".svg\' )";
            console.log(badge);
        }
    })
}

// Fetching the lesson number as soon as the window loads
window.onload = function() {
    fetchCurrentLessonNumber();
}

function setCurrentLessonNumberFromDb(lessonNumberFromDb) {
    if (lessonNumberFromDb == 0)
        noOfBadges.innerHTML = parseInt(lessonNumberFromDb);
    else 
        noOfBadges.innerHTML = parseInt(lessonNumberFromDb) - 1;
}