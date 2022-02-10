// A variable to store current lesson number from database
let currentLessonNumrFromDb;

// Variable to store the reference of profile image container
let profileImageContainer = document.querySelector(".profile_image_container");

// Variable to store the reference of all badge containers
const badgeContainer = document.querySelectorAll(".badge_container");

// Variable to store the reference of badge pop up overlay
const badgePopUpOverlay = document.querySelector(".badge_pop_up_overlay");

// Variable to store the reference of badge username
let badgeUsername = document.querySelector(".badge_username");

// Variable to store the reference of badge message
let badgeMessage = document.querySelector(".badge_message");

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

function fetchProfileImageNameFromDb() {
    let profileImageNameFromDb;

    // Creating a new XMLHttpRequest()
    const xhr = new XMLHttpRequest();

    // Opening a GET request
    xhr.open("GET", "assets/fetch_profile_image_name.php");

    // Sending the actual data in the form: "key1=value1&key2=value2&key3=value3......so on"
    xhr.send();

    // Requesting a response from server
    xhr.onload = function() {
        profileImageNameFromDb = this.responseText;

        if (parseInt(profileImageNameFromDb) == 0 || parseInt(profileImageNameFromDb) == 1 || parseInt(profileImageNameFromDb) == 2 || profileImageNameFromDb == "No Image Selected") {
            
        } else {
            profileImageContainer.style.backgroundImage = "url(assets/user_profile_image_uploads/" + profileImageNameFromDb + ")";
            profileImageInProfileDropdown.style.backgroundImage = "url(assets/user_profile_image_uploads/" + profileImageNameFromDb + ")";
            document.querySelector(".update_profile_image").style.backgroundImage = "url(assets/user_profile_image_uploads/" + profileImageNameFromDb + ")";
        }
    }
}

function displayBadges(currentLessonNumberFromDb) {
    // console.log(currentLessonNumberFromDb);

    badgeContainer.forEach(badge => {
        if (parseInt(badge.dataset["bdg_number"]) < currentLessonNumberFromDb) {
            console.log(badge.dataset["bdg_number"]);
            badge.style.backgroundImage = "url(\'SVG/badge_" + badge.dataset["bdg_number"] + ".svg\' )";
            console.log(badge);
        }
    })
}

function badgePopUp(badge, username) {
    console.log(badge);
    console.log(username);

    // if (username == '') {
    //     alert("Please login or sign up to earn and view this badge!");
    // }
    // else {
        
    // }

    badgePopUpOverlay.style.display = "flex";
}

// Fetching the lesson number as soon as the window loads
window.onload = function() {
    console.log("I am in badge page js onload!");
    fetchCurrentLessonNumber();
    fetchProfileImageNameFromDb();
}

function setCurrentLessonNumberFromDb(lessonNumberFromDb) {
    if (lessonNumberFromDb == 0){
        noOfBadges.innerHTML = parseInt(lessonNumberFromDb);
        noOfBadgesInProfileDropdown.innerHTML = parseInt(lessonNumberFromDb);
    } else {
        noOfBadges.innerHTML = parseInt(lessonNumberFromDb) - 1;
        noOfBadgesInProfileDropdown.innerHTML = parseInt(lessonNumberFromDb) - 1;
    }
}