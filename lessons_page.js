// A variable to store current lesson number from database
let currentLessonNumberFromDb;

// Variables to store the reference of lesson number 2, 3 & 4
const lessonLockOverlay = document.querySelectorAll(".lesson_lock_overlay");

// Variable to store the reference of lesson bubbles of lessons 1, 2, 3 & 4
const lessonBubbles = document.querySelectorAll(".lesson_bubble");

// Variable to store the reference of lesson tracks of lessons 1, 2, 3 & 4
const lessonTracks = document.querySelectorAll(".lesson_track");

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
        currentLessonNumberFromDb = parseInt(response);
        displayLock(currentLessonNumberFromDb);
        updateLessonsIndicator(currentLessonNumberFromDb)
    }
}

function displayLock(currentLessonNumFromDb) {
    lessonLockOverlay.forEach(lockOverlay => {
        if (parseInt(lockOverlay.dataset["number"]) <= currentLessonNumFromDb) {
            // console.log(lockOverlay);
            lockOverlay.style.display = "none";
        }
    })
}

function updateLessonsIndicator(currentLessonNumFromDb) {
    lessonBubbles.forEach(lessonBubble => {
        if(parseInt(lessonBubble.dataset["number"]) <= currentLessonNumFromDb - 1) {
            lessonBubble.querySelector(".lesson_" + lessonBubble.dataset["number"] + "_bubble").style.background = "#00C271";
            // console.log(lessonBubble.querySelector(".lesson_" + lessonBubble.dataset["number"] + "_" + currentLessonNumFromDb + "_track"));
        }
    })

    lessonTracks.forEach(lessonTrack => {
        if(parseInt(lessonTrack.dataset["number"]) <= currentLessonNumFromDb - 1) {
            lessonTrack.querySelector(".lesson_" + lessonTrack.dataset["number"] + "_" + (parseInt(lessonTrack.dataset["number"]) + 1) + "_track").style.background = "#00C271";
        }
    })
}

// Fetching the lesson number as soon as the window loads
window.onload = function() {
    fetchCurrentLessonNumber();
}

// function checkCurrentLessonNumber(lessonNumber) {

// }