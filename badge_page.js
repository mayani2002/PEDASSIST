// A variable to store current lesson number from database
let currentLessonNumrFromDb;

// Variable to store the reference of profile image container
let profileImageContainer = document.querySelector(".profile_image_container");

// Variable to store the reference of all badge containers
const badgeContainer = document.querySelectorAll(".badge_container");

// Variable to store the reference of badge pop up close button
const badgePopUpCloseButton = document.querySelector(".badge_pop_up_close_button");

// Variable to store the reference of badge pop up overlay
const badgePopUpOverlay = document.querySelector(".badge_pop_up_overlay");

// Variable to store the reference of badge image in badge pop up overlay
let badgeImage = document.querySelector(".badge");

// Variable to store the reference of badge username
let badgeUsername = document.querySelector(".badge_username");

// Variable to store the reference of badge message
let badgeMessage = document.querySelector(".badge_message");

// Setting the variable for number of badges on the badge_page
let noOfBadges = document.querySelector(".no_of_badges");

// The following function generates a XML request to fetch the current lesson number from the database
function fetchCurrentLessonNumberForBadgePage() {
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

        checkForDefaultProfileImage();
    }
}

function displayBadges(currentLessonNumberFromDb) {
    badgeContainer.forEach(badge => {
        if (parseInt(badge.dataset["bdg_number"]) < currentLessonNumberFromDb) {
            badge.style.backgroundImage = "url(\'SVG/badge_" + badge.dataset["bdg_number"] + ".svg\' )";
        }
    })
}

function badgePopUp(badgeContainerNumber, username) {
    let stylesOfBadgeContainer = window.getComputedStyle(badgeContainerNumber);
    
    if (username == '') {
        alert("Please login or sign up to earn and view this badge!");
    } else if (stylesOfBadgeContainer.backgroundImage.includes("badge_bg_empty")) {
        alert("Please complete lesson number 0" + parseInt(badgeContainerNumber.dataset["bdg_number"]) + " to earn and view this badge!");
    } else {
        // Setting the username on badge pop up
        badgeUsername.innerHTML = username;

        // Setting the badge on the bodge pop up
        if (parseInt(badgeContainerNumber.dataset["bdg_number"]) == 1) {
            badgeImage.src = "images/badge_" + badgeContainerNumber.dataset["bdg_number"] + ".png";
            badgeMessage.innerHTML = 'This badge is awarded to you for successfully completing the lesson<br><b>"BRAIN ARCHITECTURE"</b>';
        } else if (parseInt(badgeContainerNumber.dataset["bdg_number"]) == 2) { 
            badgeImage.src = "images/badge_" + badgeContainerNumber.dataset["bdg_number"] + ".png";
            badgeMessage.innerHTML = 'This badge is awarded to you for successfully completing the lesson<br><b>"SERVE & RETURN"</b>';
        } else if (parseInt(badgeContainerNumber.dataset["bdg_number"]) == 3) { 
            badgeImage.src = "images/badge_" + badgeContainerNumber.dataset["bdg_number"] + ".png";
            badgeMessage.innerHTML = 'This badge is awarded to you for successfully completing the lesson<br><b>"TOXIC STRESS"</b>';
        } else if (parseInt(badgeContainerNumber.dataset["bdg_number"]) == 4) {
            badgeImage.src = "images/badge_" + badgeContainerNumber.dataset["bdg_number"] + ".png";
            badgeMessage.innerHTML = 'This badge is awarded to you for successfully completing the lesson<br><b>"CHILD NEGLECT"</b>';
        }

        // Displaying the badge pop up overlay
        badgePopUpOverlay.style.visibility = "visible";
        badgePopUpOverlay.style.opacity = "1";
    }
}

// Adding an event listener for edit profile close button
badgePopUpCloseButton.addEventListener("click", () => {
    document.getElementsByTagName("body")[0].classList.remove("hide_scroll");
    badgePopUpOverlay.style.visibility = "hidden";
    badgePopUpOverlay.style.opacity = "0";
});

function setCurrentLessonNumberFromDb(lessonNumberFromDb) {
    if (lessonNumberFromDb == 0){
        noOfBadges.innerHTML = parseInt(lessonNumberFromDb);
        // noOfBadgesInProfileDropdown.innerHTML = parseInt(lessonNumberFromDb);
    } else {
        noOfBadges.innerHTML = parseInt(lessonNumberFromDb) - 1;
        // noOfBadgesInProfileDropdown.innerHTML = parseInt(lessonNumberFromDb) - 1;
    }
}

// Fetching the lesson number, profile image name as soon as the window loads
window.onload = function() {
    console.log("I am in badge page.js window.onload!");
    fetchCurrentLessonNumberForBadgePage();
    fetchProfileImageNameFromDb();
}