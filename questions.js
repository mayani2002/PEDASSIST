let current_question = {};
let accepting_values = true;
let question_counter = 0;

function showSingleChoiceQuestions(index) {
    console.log('SingleChoice');
    const question = document.getElementById("single_correct_question");
    console.log(question);
    const single_choice_container = document.getElementById("single_correct_options_container");
    console.log(single_choice_container);
    let question_tag = '<question>' + questions[index].question + '</question>';
    console.log(question_tag);
    let options_tag = '<div class="option">'
                           + '<div class="option_one">'    
                               + '<h1>1</h1>'
                           + '</div>'
                           + '<div class="option_value">'
                               + '<h2>' + questions[index].options[0] + '</h2>'
                           + '</div>'
                       + '</div>'
                       + '<div class="option">'
                           + '<div class="option_two">'    
                               + '<h1>2</h1>'
                           + '</div>'
                           + '<div class="option_value">'
                               + '<h2>' + questions[index].options[1] + '</h2>'
                           + '</div>'
                       + '</div>'
                       + '<div class="option">'
                           + '<div class="option_three">'    
                               + '<h1>3</h1>'
                           + '</div>'
                           + '<div class="option_value">'
                               + '<h2>' + questions[index].options[2] + '</h2>'
                           + '</div>'
                       + '</div>'
                       + '<div class="option">'
                           + '<div class="option_four">'    
                               + '<h1>4</h1>'
                           + '</div>'
                           + '<div class="option_value">'
                               + '<h2>' + questions[index].options[3] + '</h2>'
                           + '</div>'
                       + '</div>'
    question.innerHTML += question_tag;
    single_choice_container.innerHTML += options_tag;
    console.log('Single Choice 1');
}


window.onload = (event) => {
    showSingleChoiceQuestions(4);
};
