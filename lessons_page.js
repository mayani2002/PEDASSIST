// A variable to store current lesson number from database
let currentLessonNumrFromDb;

// Variables to store the reference of lesson number 2, 3 & 4
const lessonLockOverlay = document.querySelectorAll(".lesson_lock_overlay");

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
        displayLock(currentLessonNumrFromDb);
    }
}

function displayLock(currentLessonNumberFromDb) {
    lessonLockOverlay.forEach(lockOverlay => {
        if (parseInt(lockOverlay.dataset["number"]) <= currentLessonNumberFromDb) {
            // console.log(lockOverlay);
            lockOverlay.style.display = "none";
        }
    })
}

// Fetching the lesson number as soon as the window loads
window.onload = function() {
    fetchCurrentLessonNumber();
}

// function checkCurrentLessonNumber(lessonNumber) {

// }
