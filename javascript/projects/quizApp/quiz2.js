let quiz_container = document.querySelector("#quiz-container");
let question = document.querySelector("#question");
let options = document.querySelector("#options");

const quizData = [
  {
    question: "Which is the most widely spoken language in the world?",
    option: ["Spanish", "Mandarin", "English", "German"],
    correct: "Mandarin",
  },
  {
    question: "Which is the only continent in the world without a desert?",
    option: ["North America", "Asia", "Africa", "Europe"],
    correct: "Europe",
  },
  {
    question: "Who invented Computer?",
    option: ["Charles Babbage", "Henry Luce", "Henry Babbage", "Charles Luce"],
    correct: "Charles Babbage",
  },
];
// these are global variable
let index = 0;
let score = 0;
let wrongAnswer = [];
let quizLength = quizData.length;
function displayQuiz() {
  let quizLength = quizData.length;
  // -===========================================================
  let quiz_container = document.querySelector("#quiz-container");
  let question = document.querySelector("#question");
  let options = document.querySelector("#options");
  let table = document.querySelector("#table");
  let tbody = document.querySelector("tbody");
  let th = document.querySelector("#th");
  let length = document.querySelector("#length");
  // ======================================================================

  if (index < quizLength) {
    length.innerHTML = `${index + 1} of ${quizLength}`;
    let currentQuiz = quizData[index];
    // print question
    question.innerHTML = currentQuiz.question;
    th.innerHTML = currentQuiz.question;

    let count = 1;
    options.innerHTML = "";
    // print options

    currentQuiz.option.forEach(function (values) {
      let tr = document.createElement("tr");

      tbody.appendChild(tr);

      let td1 = document.createElement("td");
      tr.appendChild(td1);

      let input = document.createElement("input");
      input.type = "radio";
      input.value = values;
      input.classList.add("quizes");
      input.name = "quiz";
      input.id = values + "_" + count;

      td1.appendChild(input);

      let label = document.createElement("label");
      label.innerHTML = values;
      label.setAttribute("for", values + "_" + count);
      let td2 = document.createElement("td");
      tr.appendChild(td2);
      td2.appendChild(label);

      // label.for =values+"_"+count

      // input.after(label);

      count++;
    });

    let next = document.querySelector("#NEXT");
    let restart = document.querySelector("#restart");
    if (next) {
      next.remove();
    }

    if (restart) {
      restart.remove();
    }
    // print button
    let button = document.createElement("button");
    button.onclick = function () {
      checkAnwser();

      let allTr = document.getElementsByTagName("tr");
      if (allTr) {
        console.log(allTr);
        for (let removed = 1; removed <= 4; removed++) {
          console.log(allTr[removed]);
          console.log(removed);
          allTr[removed].remove();
        }
      }
    };
    button.id = "NEXT";
    button.innerHTML = "NEXT";

    options.after(button);
  } else {
    let button = document.querySelector("#NEXT");
    button.onclick = function () {
      result();
    };
    button.innerHTML = "submit";
  }
}

//  print current quiz by using funtion
displayQuiz();

//  check selected option
function checkAnwser() {
  let allOption = document.querySelectorAll(".quizes");

  // console.log(allOption);

  let length = allOption.length;

  let errors = document.querySelector("#errors");
  for (let i = 0; i < length; i++) {
    let error = true;

    if (allOption[i].checked == true) {
      selectedAnswer(allOption[i]);
      error = false;
      errors.innerHTML = "";
      break;
    }

    if (error == true) {
      errors.innerHTML = "Please Select any one";
      errors.style.color = "red";
    }
  }
  // allOption.forEach(function (inputOption) {

  // });
}

// selected checked value

function selectedAnswer(input) {
  let selectedValue = input.value;
  let currentQuiz = quizData[index];

  if (currentQuiz.correct == selectedValue) {
    score++;
  } else {
    wrongAnswer.push({
      question: currentQuiz.question,
      userSelect: selectedValue,
      correct: currentQuiz.correct,
    });
  }

  if (index < quizLength) {
    index++;
    displayQuiz();
  } else {
    result();
  }
}

function result() {
  let quiz_container = document.querySelector("#quiz-container");
  let question = document.querySelector("#question");
  let options = document.querySelector("#options");
  let button = document.querySelector("#NEXT");
  if (wrongAnswer.length > 0) {
    button.innerHTML = "SHOW WRONG ANSWER";
    button.id = "WRONG";
    button.onclick = function () {
      revealWrongAnswer();
    };
  } else {
    button.remove();
  }

  let restart = document.createElement("button");
  restart.onclick = function () {
    restarts();
  };
  restart.id = "restart";
  restart.innerHTML = "restart";

  question.after(restart);
  question.innerHTML = `YOUR SCORE IS : ${score} `;
  options.innerHTML = "";
}

function revealWrongAnswer() {
  let button = document.querySelector("#WRONG");
  if (button) {
    button.remove();
  }
  wrongAnswer.forEach(function (e) {
    options.innerHTML += `Question : ${e.question} <br> 
    Your Selected Option:<span style="color:red">${e.userSelect}</span>   <br> 
    Correct: <span style="color:green">
                      ${e.correct} 
                       </span>
                       <br> <hr>`;
  });
}

function restarts() {
  let question = document.querySelector("#question");
  let options = document.querySelector("#options");
  question.innerHTML = "";
  options.innerHTML = "";
  index = 0;
  wrongAnswer = [];
  score = 0;
  displayQuiz();
}
