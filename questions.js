// Setting the variable for the question
const question = document.getElementById("question");

// Setting the variables for the multiple correct options
let multiCorrectOptions = document.querySelectorAll(".multi_correct_option");
let multiCorrectOptionsCheckBox = document.querySelectorAll(".check_box");
let multiCorrectOptionsValue = document.querySelectorAll(".multi_correct_option_value");

// Setting the variables for the draggable options
let draggableOptions = document.querySelectorAll(".draggable_option");
let draggableOptionsIndicator = document.querySelectorAll(".draggable_option_indicator");
let draggableOptionsValue = document.querySelectorAll(".draggable_option_value");

// Setting the variables for the single correct options
let singleCorrectOptions = document.querySelectorAll(".single_correct_option");
let singleCorrectOptionsRadio = document.querySelectorAll(".single_correct_option_radio");
let singleCorrectOptionsValue = document.querySelectorAll(".single_correct_option_value");

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

// Creating an array to store the question details.
let multiCorrectQuestions = [];
let draggableQuestions = [];
let singleCorrectQuestions = [];

// Fetching the questions stored in TEST/multi_correct.json file and storing it in an array.
// fetch("TEST/multi_correct.json").then(res => {
//     return res.json();
// }).then(loadedQuestions => {
//     multiCorrectQuestions = loadedQuestions;
//     startLessonThree();
// }).catch(error => {
//     console.log("We were not able to fetch questions from the API!");
// });

// Fetching the questions stored in TEST/multi_correct.json file and storing it in an array.
// fetch("TEST/draggable.json").then(res => {
//     return res.json();
// }).then(loadedQuestions => {
//     draggableQuestions = loadedQuestions;
//     startLessonTwo();
// }).catch(error => {
//     console.log("We were not able to fetch questions from the API!");
// });

// Fetching the questions stored in TEST/multi_correct.json file and storing it in an array
fetch("TEST/single_correct.json").then(res => {
    return res.json();
}).then(loadedQuestions => {
    singleCorrectQuestions = loadedQuestions;
    startLessonOne();
}).catch(error => {
    console.log("We were not able to fetch questions from the API!");
});

startLessonOne = () => {
    questionCounter = 0;
    availableQuestions = [...singleCorrectQuestions];
    getNewQuestion1();
}

startLessonTwo = () => {
    questionCounter = 0;
    availableQuestions = [...draggableQuestions];
    getNewQuestion2();
}

// Function to start the lesson one as soon as the questions are fetched from a local JSON file.
startLessonThree = () => {
    questionCounter = 0;
    availableQuestions = [...multiCorrectQuestions];
    getNewQuestion3();
}

getNewQuestion1 = () => {
    // If all the questions were attempted successfully, then the user is redirected to the next lesson.
    if (availableQuestions.length == 0) {
        return window.location.assign("index.html");
    }

    // Incrementing the question counter
    questionCounter++;

    // Generating a random number so that the corressponding random question can be
    // fetched from the array of available questions.
    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];

    // Setting the question on the page
    question.innerHTML = "<Question>" + currentQuestion.question + "</Question>";
   
    // Setting the options on the page
    singleCorrectOptionsValue.forEach(singleCorrectOptionValue =>{
        const number = singleCorrectOptionValue.dataset["number"];
        singleCorrectOptionValue.innerHTML = "<h2>" + currentQuestion.options[number - 1] + "</h2>";
    })

    // Removing the question that is already displayed from the array of available questions
    availableQuestions.splice(questionIndex, 1);
    console.log(availableQuestions);
}

getNewQuestion2 = () => {
    // If all the questions were attempted successfully, then the user is redirected to the next lesson.
    if (availableQuestions.length == 0) {
        return window.location.assign("index.html");
    }

    // Incrementing the question counter
    questionCounter++;

    // Generating a random number so that the corressponding random question can be
    // fetched from the array of available questions.
    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];

    // Setting the question on the page
    question.innerHTML = "<Question>" + currentQuestion.question + "</Question>";
   
    // Setting the options on the page
    draggableOptionsValue.forEach(draggableOptionValue =>{
        const number = draggableOptionValue.dataset["number"];
        draggableOptionValue.innerHTML = "<h2>" + currentQuestion.options[number - 1] + "</h2><i class='fas fa-grip-lines'></i>";
    })

    // Removing the question that is already displayed from the array of available questions
    availableQuestions.splice(questionIndex, 1);
    console.log(availableQuestions);

    addEventListeners();
}

// Function to get a new question from the question's array
getNewQuestion3 = () => {
    // If all the questions were attempted successfully, then the user is redirected to the next lesson.
    if (availableQuestions.length == 0) {
        return window.location.assign("index.html");
    }

    // Incrementing the question counter
    questionCounter++;
    
    // Generating a random number so that the corressponding random question can be
    // fetched from the array of available questions.
    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];

    // Setting the question on the page
    question.innerHTML = "<Question>" + currentQuestion.question + "</Question>";

    // Setting the options on the page
    multiCorrectOptionsValue.forEach(multiCorrectOptionValue =>{
        const number = multiCorrectOptionValue.dataset["number"];
        multiCorrectOptionValue.innerHTML = "<h2>" + currentQuestion.options[number - 1] + "</h2>";
    })

    // Removing the question that is already displayed from the array of available questions
    availableQuestions.splice(questionIndex, 1);
    console.log(availableQuestions);
}


// Defining the behaviour when a checkbox area inside any option is clicked
multiCorrectOptionsCheckBox.forEach(multiCorrectOptionCheckBox => {
    multiCorrectOptionCheckBox.addEventListener("click", e => {
        if(!document.getElementById("check_box_" + multiCorrectOptionCheckBox.dataset["number"]).checked) {
            document.getElementById("check_box_" + multiCorrectOptionCheckBox.dataset["number"]).checked = true;
        } else {
            document.getElementById("check_box_" + multiCorrectOptionCheckBox.dataset["number"]).checked = false;
        }
    })
})

// Defining the behaviour when any option is clicked
multiCorrectOptions.forEach(multiCorrectOption => {
    multiCorrectOption.addEventListener("click", e => {
        if(!document.getElementById("check_box_" + multiCorrectOption.dataset["number"]).checked) {
            document.querySelectorAll('.check_box')[multiCorrectOption.dataset["number"] - 1].checked = true;
            document.querySelectorAll('.multi_correct_option')[multiCorrectOption.dataset["number"] - 1].classList.toggle("selected");
        } else {
            document.querySelectorAll('.check_box')[multiCorrectOption.dataset["number"] - 1].checked = false;
            document.querySelectorAll('.multi_correct_option')[multiCorrectOption.dataset["number"] - 1].classList.toggle("selected");
        }
    })
})

// Defining the behaviour when a checkbox area inside any option is clicked
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

// Defining the behaviour when any option is clicked
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

function dragStart() {
    // console.log('Event: ', 'dragstart');
    dragStartIndex = +this.closest("div").getAttribute("data-number");
    console.log(dragStartIndex);
}

function dragOver(e) {
    // console.log('Event: ', 'dragover');
    this.classList.add("drag_over");
    e.preventDefault();
}

function dragEnter() {
    // console.log('Event: ', 'dragenter');
    this.classList.add("drag_over");
}

function dragLeave() {
    // console.log('Event: ', 'dragleave');
    this.classList.remove("drag_over");
}

function dragDrop() {
    // console.log('Event: ', 'drop');
    const dragEndIndex = +this.getAttribute("data-number");
    swapItems(dragStartIndex - 1, dragEndIndex - 1);
    this.classList.remove("drag_over");
}

function swapItems(fromIndex, toIndex) {
    temp = draggableOptionsValue[toIndex].innerHTML;
    draggableOptionsValue[toIndex].innerHTML = draggableOptionsValue[fromIndex].innerHTML;
    draggableOptionsValue[fromIndex].innerHTML = temp;
}

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
    singleCorrectOptionsValue.forEach(singleCorrectOptionValue => {
        if (singleCorrectOptionsRadio[singleCorrectOptionValue.dataset["number"] - 1].checked) {
            optionSelected = parseInt(singleCorrectOptionValue.dataset["number"]);
        }
    })

    if (optionSelected === currentQuestion.answers) {
        console.log("Your answer is right !");
        document.getElementsByClassName("right")[optionSelected - 1].style.display = "block";

        setTimeout(function() {
            document.getElementsByClassName("right")[optionSelected - 1].style.display = "none";
            singleCorrectOptions[optionSelected - 1].classList.remove("selected");
            getNewQuestion1();
        }, 1500)
    } else {
        console.log("Your answer is wrong !");
        document.getElementsByClassName("wrong")[optionSelected - 1].style.display = "block";
        setTimeout(function() {
            document.getElementsByClassName("wrong")[optionSelected - 1].style.display = "none";
            singleCorrectOptions[optionSelected - 1].classList.remove("selected");
        }, 500)
    }

    // let wrongCount = 0;
    // draggableOptionsValue.forEach(draggableOptionValue => {
    //     optionsSelected.push(draggableOptionValue.innerText);
    // });

    // draggableOptionsValue.forEach(draggableOptionValue => {
    //     if(optionsSelected[draggableOptionValue.dataset["number"] - 1] == currentQuestion.answers[draggableOptionValue.dataset["number"] - 1]) {
    //         console.log("Your answer is right!");
    //         console.log(optionsSelected[draggableOptionValue.dataset["number"] - 1]);
    //         console.log(currentQuestion.answers[draggableOptionValue.dataset["number"] - 1]);
    //         draggableOptionValue.classList.add("right");
    //         draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.add("right");
    //     } else {
    //         wrongCount++;
    //         console.log("Your answer is wrong!");
    //         console.log(optionsSelected[draggableOptionValue.dataset["number"] - 1]);
    //         console.log(currentQuestion.answers[draggableOptionValue.dataset["number"] - 1]);
    //         draggableOptionValue.classList.add("wrong");
    //         draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.add("wrong");
    //     }
    // })

    // if (wrongCount == 0) {
    //     setTimeout(function() {
    //         draggableOptionsValue.forEach(draggableOptionValue => {
    //             draggableOptionValue.classList.remove("right");
    //             draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.remove("right");
    //         })
    //         getNewQuestion2();
    //     }, 1500);
    // } else {
    //     setTimeout(function() {
    //         draggableOptionsValue.forEach(draggableOptionValue => {
    //             draggableOptionValue.classList.remove("right");
    //             draggableOptionValue.classList.remove("wrong");
    //             draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.remove("right");
    //             draggableOptionsIndicator[draggableOptionValue.dataset["number"] - 1].classList.remove("wrong");
    //         })
    //     }, 500);
    // }
    // Storing the options selected by the user in an array.
    // multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
    //     if(choiceCheckBox.checked) {
    //         optionsSelected.push(parseInt(choiceCheckBox.dataset["number"]));
    //     }
    // });

    // Checking whether the user selected options are right or wrong and changing the options check boxes accordingly.
    // if (optionsSelected.toString() == currentQuestion.answers.toString()) {
    //     // Display a green tick for the correct options selected by the user.
    //     multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
    //         if(choiceCheckBox.checked) {
    //             document.getElementsByClassName('right')[parseInt(choiceCheckBox.dataset["number"]) - 1].style.display = "block";
    //         }
    //     });

    //     // Logging out the optionsSelected & currentQuestion.answers array.
    //     console.log("Your Ans is Right!");
    //     console.log(optionsSelected);
    //     console.log(currentQuestion.answers);

    //     // Setting a delay of 1000s before the next question loads.
    //     setTimeout(function() {
    //         multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
    //             document.querySelectorAll('.right')[choiceCheckBox.dataset["number"] - 1].style.display = "none";
    //         })
    //         getNewQuestion3();
    //     }, 1000);

    // } else {
        // Display a red cross for the options selected by the user.
    //     multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
    //         if(choiceCheckBox.checked) {
    //             console.log("Wrong Option!");
    //             document.getElementsByClassName('wrong')[parseInt(choiceCheckBox.dataset["number"]) - 1].style.display = "block";
    //         }
    //     });
        
    //     // Logging out the optionsSelected & currentQuestion.answers array.
    //     console.log("Your Ans is Wrong!");
    //     console.log(optionsSelected);
    //     console.log(currentQuestion.answers);

    //     // Setting a delay of 0.5s after which user can re-attempt the question to get that right.
    //     setTimeout(function() {
    //         multiCorrectOptionsCheckBox.forEach(choiceCheckBox => {
    //             document.getElementsByClassName('wrong')[parseInt(choiceCheckBox.dataset["number"]) - 1].style.display = "none";
    //         });
    //     }, 500);
    // }

    // Truncating the optionsSelected array before the next question is displayed.
    optionsSelected.length = 0;
    
    // Deselecting the options before the next question is displayed.
    // multiCorrectOptions.forEach(multiCorrectOption => {
    //     document.querySelectorAll('.multi_correct_option')[multiCorrectOption.dataset["number"] - 1].classList.remove("selected");
    //     document.querySelectorAll('.check_box')[multiCorrectOption.dataset["number"] - 1].checked = false;
    // });
}

// window.onload = function() {
//     alert("Window Reloaded!");
// }