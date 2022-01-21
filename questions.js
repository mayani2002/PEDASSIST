// Setting the variables for the question type and description
let questionTypeName = document.querySelector(".question_type_name");
let questionTypeDescription = document.querySelector(".question_type_description");

// Setting the variable for the question
const questionText = document.getElementById("question");

// Setting the variable for question number bubble
let questionNumberBubbles = document.querySelectorAll(".question_number_bubble");
let questionProgressDots = document.querySelectorAll(".dot");

// Setting the variables for the single correct options
let singleCorrectOptionsContainer = document.querySelector(".single_correct_options_container");
let singleCorrectOptions = document.querySelectorAll(".single_correct_option");
let singleCorrectOptionsRadio = document.querySelectorAll(".single_correct_option_radio");
let singleCorrectOptionsValue = document.querySelectorAll(".single_correct_option_value");

// Setting the variables for the draggable options
let draggableOptionsContainer = document.querySelector(".draggable_options_container");
let draggableOptions = document.querySelectorAll(".draggable_option");
let draggableOptionsIndicator = document.querySelectorAll(".draggable_option_indicator");
let draggableOptionsValue = document.querySelectorAll(".draggable_option_value");

// Setting the variables for the multiple correct options
let multiCorrectOptionsContainer = document.querySelector(".multi_correct_options_container");
let multiCorrectOptions = document.querySelectorAll(".multi_correct_option");
let multiCorrectOptionsCheckBox = document.querySelectorAll(".check_box");
let multiCorrectOptionsValue = document.querySelectorAll(".multi_correct_option_value");

// Setting the variable for submit button
const submitBtn = document.getElementById("submit_btn");

// Declaring some variables to be used
let currentQuestion = {};
let acceptingAnswers = false;
let questionCounter = 0;
let availableQuestions = [];
let optionsSelected = [];
let optionSelected;
let dragStartIndex;
let temp;
let previousOptionRadio = null;
let previousOption = null;
let currentLessonNumber;
let questionNumber;
let currentLessonNumberFromDb;

// Creating an array to store the question details.
let multiCorrectQuestions = [];
let draggableQuestions = [];
let singleCorrectQuestions = [];
let questions = [];


// Function to receive the current question number
function receiveLessonNumber(lessonNo) {
    currentLessonNumber = parseInt(lessonNo);
}

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
    }
}

// Fetching the lesson number as soon as the window loads
window.onload = function() {
    fetchCurrentLessonNumber();
}

// Fetching the questions stored in TEST/multi_correct.json file and storing it in an array.
fetch("QUESTIONS/questions.json").then(res => {
    return res.json();
}).then(receivedQuestions => {
    questions = receivedQuestions;
    if (currentLessonNumber < currentLessonNumberFromDb || currentLessonNumberFromDb == 4) {

        console.log("currentLessonNumber" + currentLessonNumber);
        console.log("currentLessonNumberFromDb" + currentLessonNumberFromDb);

        questionNumberBubbles.forEach(questionNumberBubble => {
            questionNumberBubble.style.background = "#00C271";
        });


        questionProgressDots.forEach(questionProgressDot => {
            questionProgressDot.style.background = "#00C271";
        });
    } else {
        for (var i = 1; i <= 3; i++) {
            // console.log(currentLessonNumber);
            // console.log(currentLessonNumberFromDb);

            questionNumberBubbles[i - 1].style.background = "var(--question-" + i + "-color)";
        }

        questionProgressDots.forEach(questionProgressDot => {
            questionProgressDot.style.background = "var(--dot-fill-color)";
        });
    }
    startNewLesson();

}).catch(error => {
    console.log("We were not able to fetch questions from the API!");
});

// Function to start a new lesson
startNewLesson = () => {
    questionNumber = 0;
    availableQuestions = questions[currentLessonNumber - 1].slice();
    console.log(availableQuestions);
    console.log(questions);
    getNewQuestion();
}

// Function to start a previously completed lesson
// startPreviousLesson = () => {

// }

// Function to get a new question after submit button is clicked
getNewQuestion = () => {
    // Incrementing the question number
    questionNumber++;

    // Checking the type of question from the question's array and displaying the next question accordingly
    if (availableQuestions[questionNumber - 1].type == 1) {
        getNewSingleChoiceQuestion();
    } else if (availableQuestions[questionNumber - 1].type == 2) {
        getNewDragAndDropQuestion();
    } else if (availableQuestions[questionNumber - 1].type == 3) {
        getNewMultiCorrectQuestion();
    }
}

// Function to get a single choice question from the question's array
getNewSingleChoiceQuestion = () => {
    // Setting the question type name and description
    questionTypeName.innerHTML = "Single Correct";
    questionTypeDescription.innerHTML = "You are given four options of which only one is correct. Choose the option wisely!";

    // Displaying the single correct options container
    singleCorrectOptionsContainer.style.display = "flex";

    // Hiding the draggable options container
    draggableOptionsContainer.style.display = "none";
    draggableOptions.forEach(draggableOption => {
        draggableOption.style.display = "none";
    });

    // Hiding the multi correct options container
    multiCorrectOptionsContainer.style.display = "none";
    multiCorrectOptions.forEach(multiCorrectOption => {
        multiCorrectOption.style.display = "none";
    });

    // Getting the single correct question from the question's array
    currentQuestion = availableQuestions[questionNumber - 1];

    // Setting the question on the page
    questionText.innerHTML = "<Question>" + currentQuestion.question + "</Question>";

    // Setting the options on the page
    singleCorrectOptionsValue.forEach(singleCorrectOptionValue => {
        const number = singleCorrectOptionValue.dataset["number"];
        singleCorrectOptionValue.innerHTML = "<h2>" + currentQuestion.options[number - 1] + "</h2>";
    })

    // Removing the question that is already displayed from the array of available questions
    // availableQuestions.shift();
    console.log(availableQuestions);
}

// Function to get a new drag and drop question from the question's array
getNewDragAndDropQuestion = () => {
    // Setting the question type name and description
    questionTypeName.innerHTML = "Arrange in Order";
    questionTypeDescription.innerHTML = "There are four options which are jumbled up. You need to arrange them in the correct order.";

    // Hiding the single correct options container
    singleCorrectOptionsContainer.style.display = "none";

    // Displaying the draggable options container
    draggableOptionsContainer.style.display = "flex";
    draggableOptionsContainer.style.flexDirection = "column";
    draggableOptions.forEach(draggableOption => {
        draggableOption.style.display = "flex";
    });
    // document.getElementsByClassName("draggable_option")

    // Hiding the multi correct options container
    multiCorrectOptionsContainer.style.display = "none";
    multiCorrectOptions.forEach(multiCorrectOption => {
        multiCorrectOption.style.display = "none";
    });

    // Getting the single correct question from the question's array
    currentQuestion = availableQuestions[questionNumber - 1];

    // Setting the question on the page
    questionText.innerHTML = "<Question>" + currentQuestion.question + "</Question>";

    // Setting the options on the page
    draggableOptionsValue.forEach(draggableOptionValue => {
        const number = draggableOptionValue.dataset["number"];
        draggableOptionValue.innerHTML = "<h2>" + currentQuestion.options[number - 1] + "</h2><i class='fas fa-grip-lines'></i>";
    })

    // Removing the question that is already displayed from the array of available questions
    // availableQuestions.shift();
    console.log(availableQuestions);

    addEventListeners();
}

// Function to get a new multi correct question from the question's array
getNewMultiCorrectQuestion = () => {
    // Setting the question type name and description
    questionTypeName.innerHTML = "Multiple Correct";
    questionTypeDescription.innerHTML = "You are given four options of which one or more are correct. Choose the options wisely!";


    // Hiding the single correct options container
    singleCorrectOptionsContainer.style.display = "none";

    // Hiding the draggable options container
    draggableOptionsContainer.style.display = "none";
    draggableOptions.forEach(draggableOption => {
        draggableOption.style.display = "none";
    });

    // Displaying the multi correct options container
    multiCorrectOptionsContainer.style.display = "flex";
    multiCorrectOptions.forEach(multiCorrectOption => {
        multiCorrectOption.style.display = "flex";
    });

    // Getting the single correct question from the question's array
    currentQuestion = availableQuestions[questionNumber - 1];

    // Setting the question on the page
    questionText.innerHTML = "<Question>" + currentQuestion.question + "</Question>";

    // Setting the options on the page
    multiCorrectOptionsValue.forEach(multiCorrectOptionValue => {
        const number = multiCorrectOptionValue.dataset["number"];
        multiCorrectOptionValue.innerHTML = "<h2>" + currentQuestion.options[number - 1] + "</h2>";
    })

    // Removing the question that is already displayed from the array of available questions
    // availableQuestions.shift();
    console.log(availableQuestions);
}

// Defining the behaviour when a checkbox area inside any multi correct option is clicked
multiCorrectOptionsCheckBox.forEach(multiCorrectOptionCheckBox => {
    multiCorrectOptionCheckBox.addEventListener("click", e => {
        if (!document.getElementById("check_box_" + multiCorrectOptionCheckBox.dataset["number"]).checked) {
            document.getElementById("check_box_" + multiCorrectOptionCheckBox.dataset["number"]).checked = true;
        } else {
            document.getElementById("check_box_" + multiCorrectOptionCheckBox.dataset["number"]).checked = false;
        }
    })
})

// Defining the behaviour when any multi correct option is clicked
multiCorrectOptions.forEach(multiCorrectOption => {
    multiCorrectOption.addEventListener("click", e => {
        if (!document.getElementById("check_box_" + multiCorrectOption.dataset["number"]).checked) {
            document.querySelectorAll('.check_box')[multiCorrectOption.dataset["number"] - 1].checked = true;
            document.querySelectorAll('.multi_correct_option')[multiCorrectOption.dataset["number"] - 1].classList.toggle("selected");
        } else {
            document.querySelectorAll('.check_box')[multiCorrectOption.dataset["number"] - 1].checked = false;
            document.querySelectorAll('.multi_correct_option')[multiCorrectOption.dataset["number"] - 1].classList.toggle("selected");
        }
    })
})

// Defining the behaviour when a checkbox area inside any single correct option is clicked
singleCorrectOptionsRadio.forEach(singleCorrectOptionRadio => {
    singleCorrectOptionRadio.addEventListener("change", e => {
        if (previousOptionRadio) {
            singleCorrectOptions[previousOptionRadio.dataset["number"] - 1].classList.remove("selected");
        }
        if (singleCorrectOptionRadio !== previousOptionRadio) {
            previousOptionRadio = singleCorrectOptionRadio;
        }
        singleCorrectOptions[singleCorrectOptionRadio.dataset["number"] - 1].classList.add("selected");
    })
})

// Defining the behaviour when any single correct option is clicked
singleCorrectOptions.forEach(singleCorrectOption => {
    singleCorrectOption.addEventListener("click", e => {
        if (previousOption) {
            singleCorrectOptionsRadio[previousOption.dataset["number"] - 1].checked = false;
            previousOption.classList.remove("selected");
        }
        if (singleCorrectOption !== previousOption) {
            previousOption = singleCorrectOption;
        }
        singleCorrectOptionsRadio[previousOption.dataset["number"] - 1].checked = true;
        singleCorrectOption.classList.add("selected");
    })
})

// Function gets triggered when drag event starts on the option
function dragStart() {
    // console.log('Event: ', 'dragstart');
    dragStartIndex = +this.closest("div").getAttribute("data-number");
    console.log(dragStartIndex);
}

// Function gets triggered when an option is dragged over another option 
function dragOver(e) {
    // console.log('Event: ', 'dragover');
    this.classList.add("drag_over");
    e.preventDefault();
}

// Function gets triggered when an option enter the area of another option
function dragEnter() {
    // console.log('Event: ', 'dragenter');
    this.classList.add("drag_over");
}

// Function gets triggered when an option leaves the area of another option
function dragLeave() {
    // console.log('Event: ', 'dragleave');
    this.classList.remove("drag_over");
}

// Function gets triggered when an option is dropped in place of some other option
function dragDrop() {
    // console.log('Event: ', 'drop');
    const dragEndIndex = +this.getAttribute("data-number");
    swapItems(dragStartIndex - 1, dragEndIndex - 1);
    this.classList.remove("drag_over");
}

// Function to swap the options when an option is dropped over another option
function swapItems(fromIndex, toIndex) {
    temp = draggableOptionsValue[toIndex].innerHTML;
    draggableOptionsValue[toIndex].innerHTML = draggableOptionsValue[fromIndex].innerHTML;
    draggableOptionsValue[fromIndex].innerHTML = temp;
}

// Function to add above functions (or event listeners) to all the options
function addEventListeners() {
    draggableOptions.forEach(draggableOption => {
        draggableOption.addEventListener("dragstart", dragStart);
    });

    draggableOptionsValue.forEach(draggableOptionValue => {
        draggableOptionValue.addEventListener("dragover", dragOver);
        draggableOptionValue.addEventListener("drop", dragDrop);
        draggableOptionValue.addEventListener("dragenter", dragEnter);
        draggableOptionValue.addEventListener("dragleave", dragLeave);
    })
}

// Defining the behaviour when the submit button is clicked.
submitBtn.onclick = function(e) {
    if (availableQuestions[questionNumber - 1].type == 1) {
        // Getting the option selected by the user for single correct type question
        singleCorrectOptionsValue.forEach(singleCorrectOptionValue => {
            if (singleCorrectOptionsRadio[singleCorrectOptionValue.dataset["number"] - 1].checked) {
                optionSelected = parseInt(singleCorrectOptionValue.dataset["number"]);
            }
        })

        // Validating the option selected with the answer of the question.
        if (optionSelected === currentQuestion.answers) {
            console.log("Your answer is right !");
            document.getElementsByClassName("single_right")[optionSelected - 1].style.display = "block";
            questionNumberBubbles[questionNumber - 1].style.background = "#00C271";
            questionProgressDots.forEach(questionProgressDot => {
                if (questionProgressDot.dataset["number"] == questionNumber) {
                    questionProgressDot.style.background = "#00C271";
                }
            })

            // Setting a timeout of 1.5s after which a new question will be displayed.
            setTimeout(function() {
                document.getElementsByClassName("single_right")[optionSelected - 1].style.display = "none";
                singleCorrectOptions[optionSelected - 1].classList.remove("selected");
                getNewQuestion();
            }, 1500)
        } else {
            console.log("Your answer is wrong !");
            document.getElementsByClassName("single_wrong")[optionSelected - 1].style.display = "block";

            // Setting a timeout of 0.5s after which the user can re-attempt the question.
            setTimeout(function() {
                document.getElementsByClassName("single_wrong")[optionSelected - 1].style.display = "none";
                singleCorrectOptions[optionSelected - 1].classList.remove("selected");
            }, 500)
        }
    } else if (availableQuestions[questionNumber - 1].type == 2) {
        // Setting a variable to keep the track of incorrectly ordered options 
        let wrongCount = 0;

        // Getting the order in which user has arranged the options
        draggableOptionsValue.forEach(draggableOptionValue => {
            optionsSelected.push(draggableOptionValue.innerText);
        });

        // Validating the order user has selected with the correct order of questions
        draggableOptionsValue.forEach(draggableOptionValue => {
            if (optionsSelected[draggableOptionValue.dataset["number"] - 1] == currentQuestion.answers[draggableOptionValue.dataset["number"] - 1]) {
                console.log("Your answer is right!");
                console.log(optionsSelected[draggableOptionValue.dataset["number"] - 1]);
                console.log(currentQuestion.answers[draggableOptionValue.dataset["number"] - 1]);
                draggableOptionValue.classList.add("right");
                draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.add("right");
            } else {
                wrongCount++;
                console.log("Your answer is wrong!");
                console.log(optionsSelected[draggableOptionValue.dataset["number"] - 1]);
                console.log(currentQuestion.answers[draggableOptionValue.dataset["number"] - 1]);
                draggableOptionValue.classList.add("wrong");
                draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.add("wrong");
            }
        })

        if (wrongCount == 0) {
            questionNumberBubbles[questionNumber - 1].style.background = "#00C271";
            questionProgressDots.forEach(questionProgressDot => {
                if (questionProgressDot.dataset["number"] == questionNumber) {
                    questionProgressDot.style.background = "#00C271";
                }
            })

            // Setting a timeout of 1.5s after which next question will be displayed
            setTimeout(function() {
                draggableOptionsValue.forEach(draggableOptionValue => {
                    draggableOptionValue.classList.remove("right");
                    draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.remove("right");
                })
                getNewQuestion();
            }, 1500);
        } else {
            // Setting a timeout of 0.5s after which the user can re-attempt the question
            setTimeout(function() {
                draggableOptionsValue.forEach(draggableOptionValue => {
                    optionsSelected.length = 0;
                    draggableOptionValue.classList.remove("right");
                    draggableOptionValue.classList.remove("wrong");
                    draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.remove("right");
                    draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.remove("wrong");
                })
            }, 500);
        }
    } else if (availableQuestions[questionNumber - 1].type == 3) {
        optionsSelected.length = 0;

        // Storing the options selected by the user in an array.
        multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
            if (choiceCheckBox.checked) {
                optionsSelected.push(parseInt(choiceCheckBox.dataset["number"]));
            }
        });

        // Checking whether the user selected options are right or wrong and changing the options check boxes accordingly.
        if (optionsSelected.toString() == currentQuestion.answers.toString()) {
            // Display a green tick for the correct options selected by the user.
            multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
                if (choiceCheckBox.checked) {
                    document.getElementsByClassName('multi_right')[parseInt(choiceCheckBox.dataset["number"]) - 1].style.display = "block";
                }
            });

            // Logging out the optionsSelected & currentQuestion.answers array.
            console.log("Your Ans is Right!");
            console.log(optionsSelected);
            console.log(currentQuestion.answers);

            // Changing the color of bubbles and dots of the progress indicator
            questionNumberBubbles[questionNumber - 1].style.background = "#00C271";
            questionProgressDots.forEach(questionProgressDot => {
                if (questionProgressDot.dataset["number"] == questionNumber) {
                    questionProgressDot.style.background = "#00C271";
                }
            })

            console.log(currentLessonNumber);
            console.log(currentLessonNumberFromDb);

            // If the question number is still 2 and type of the question is three then a new question is fetched
            // otherwise 
            // 1. A mail is sent to the user with the badge
            // 2. Lesson number is updated in the database
            // 3. The badge that is sent is displayed on the screen with a confetti animation
            // 4. After 7.5s next lesson page is loaded
            if (questionNumber == 2) {
                console.log("I am question number 2!");
                setTimeout(function() {
                    // Removing the correct icon ticks from the options
                    multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
                        document.querySelectorAll('.multi_right')[choiceCheckBox.dataset["number"] - 1].style.display = "none";
                    });
                    
                    getNewQuestion();
                }, 1500);
            } else {
                if (currentLessonNumberFromDb <= 4 && currentLessonNumber > currentLessonNumberFromDb - 1) {
                    console.log(currentLessonNumber);
    
                    // Send badge earned by the user via mail
                    sendMailAfterLessonCompletion();
    
                    // Incrementing the lesson number so that the user can go to the next lesson
                    currentLessonNumberFromDb += 1;
    
                    // Sending the current lesson number to database using AJAX
                    sendCurrentLessonNumber();
                }
    
                // Displayes the badge for than lession on the screen
                showAllBadges(currentLessonNumber);
                
                // Setting a delay of 7.5s before the next question loads
                setTimeout(function() {
                    // Removing the correct icon ticks from the options
                    multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
                        document.querySelectorAll('.multi_right')[choiceCheckBox.dataset["number"] - 1].style.display = "none";
                    });

                    // Sending the user to next lesson page
                    if (currentLessonNumber < 4) {
                        return window.location.assign("lesson" + (currentLessonNumber + 1) + ".php?sign_up=0");
                    } else {
                        return window.location.assign("badge_page.php");
                    }
                }, 7500);
            }
        } else {
            // Display a red cross for the options selected by the user.
            multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
                if (choiceCheckBox.checked) {
                    console.log("Wrong Option!");
                    document.getElementsByClassName('multi_wrong')[parseInt(choiceCheckBox.dataset["number"]) - 1].style.display = "block";
                }
            });

            // Logging out the optionsSelected & currentQuestion.answers array.
            console.log("Your Ans is Wrong!");
            console.log(optionsSelected);
            console.log(currentQuestion.answers);
            console.log(currentLessonNumber);

            // Setting a delay of 0.5s after which user can re-attempt the question to get that right.
            setTimeout(function() {
                multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
                    document.getElementsByClassName('multi_wrong')[parseInt(choiceCheckBox.dataset["number"]) - 1].style.display = "none";
                });
            }, 500);
        }

        // Truncating the optionsSelected array before the next question is displayed.
        optionsSelected.length = 0;

        // Deselecting the options before the next question is displayed.
        multiCorrectOptions.forEach(multiCorrectOption => {
            document.querySelectorAll('.multi_correct_option')[multiCorrectOption.dataset["number"] - 1].classList.remove("selected");
            document.querySelectorAll('.check_box')[multiCorrectOption.dataset["number"] - 1].checked = false;
        });
    }
}


function sendCurrentLessonNumber() {
    // Creating a new XMLHttpRequest()
    const xhr = new XMLHttpRequest();

    // Requesting a response from server
    xhr.onload = function() {
        // var serverResponse = document.querySelector(".server_response");
        // serverResponse.innerHTML = this.responseText;
    }

    // Opening a POST request
    xhr.open("POST", "assets/update_lesson_number.php");

    // Defining the type of content(data) that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Sending the actual data in the form: "key1=value1&key2=value2&key3=value3......so on"
    xhr.send("current_lesson_number=" + currentLessonNumberFromDb);

    console.log("Request Sent Successfully!");
}


function sendMailAfterLessonCompletion() {
    // Creating a new XMLHttpRequest()
    const xhr = new XMLHttpRequest();

    // Requesting a response from server
    xhr.onload = function() {
        // var serverResponse = document.querySelector(".server_response");
        // serverResponse.innerHTML = this.responseText;
        // setTimeout(function() {
        //     console.log("Mail Sent!");
        // }, 5000);
        alert(this.responseText);
    }

    // Opening a POST request
    xhr.open("POST", "mailer.php");


    // Defining the type of content(data) that is to be sent
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Sending the actual data in the form: "key1=value1&key2=value2&key3=value3......so on"
    xhr.send("completedLesson=" + currentLessonNumberFromDb);

    console.log("Request Sent Successfully !");
}