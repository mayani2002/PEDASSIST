// A variable to store current lesson number from database
let currentLessonNumrFromDb;

// Variables to store the reference of lesson number 2, 3 & 4
const mcqIndicator = document.querySelectorAll(".indicator");
const mcqBtns = document.querySelectorAll(".mcq_btn");

// The following function generates a XML request to fetch the current lesson number from the database
function fetchCurrentLessonNumber() {
    let response;

    // Creating a new XMLHttpRequest()
    const xhr = new XMLHttpRequest();


    // Requesting a response from server
    xhr.onload = function() {
        response = this.responseText;
        currentLessonNumrFromDb = parseInt(response);
        displayLockAndTick(currentLessonNumrFromDb);
    }


    // Opening a GET request
    xhr.open("GET", "assets/fetch_lesson_number.php");

    // Defining the type of content(data) that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Sending the actual data in the form: "key1=value1&key2=value2&key3=value3......so on"
    xhr.send();

}

function displayLockAndTick(currentLessonNumberFromDb) {
    // console.log(currentLessonNumberFromDb);
    // console.log(mcqBtns);

    mcqBtns.forEach(mcqBtn => {

        if (parseInt(mcqBtn.dataset["number"]) < currentLessonNumberFromDb) {
            console.log(mcqBtn.dataset["number"]);
            mcqBtn.querySelector(".indicator").classList.remove("lock");
            mcqBtn.querySelector(".indicator").classList.add("mcq_done");
            mcqBtn.addEventListener("click", function() {
                document.location.href = "questions.php?lesson=" + mcqBtn.dataset["number"];
            })
            console.log(mcqBtn);
        } else if (parseInt(mcqBtn.dataset["number"]) > currentLessonNumberFromDb) {
            mcqBtn.querySelector(".indicator").classList.add("lock");
            mcqBtn.addEventListener("click", function() {
                alert("Please complete previous MCQs.");
            })
        } else {
            mcqBtn.addEventListener("click", function() {
                document.location.href = "questions.php?lesson=" + mcqBtn.dataset["number"];
            })
        }
    })
}

// Fetching the lesson number as soon as the window loads
window.onload = function() {
    fetchCurrentLessonNumber();
}

// function checkCurrentLessonNumber(lessonNumber) {

// }