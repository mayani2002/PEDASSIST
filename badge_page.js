// Setting the variable for fetching current lesson number from database
let currentLessonNumberFromDb;

// Setting the variable for number of badges on the badge_page
let noOfBadges = document.querySelector(".no_of_badges");

// The following function generates a XML request to fetch the current lesson number from the database
function fetchCurrentLessonNumber() {
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
        let response = this.responseText;
        currentLessonNumberFromDb = parseInt(response);
        setCurrentLessonNumberFromDb(currentLessonNumberFromDb);
    }
}

// Fetching the current lesson number present in database
window.onload = function() {
    fetchCurrentLessonNumber();
}

function setCurrentLessonNumberFromDb(lessonNumberFromDb) {
    noOfBadges.innerHTML = parseInt(lessonNumberFromDb) - 1;
}