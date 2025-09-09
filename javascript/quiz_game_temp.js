document.addEventListener("DOMContentLoaded", function () {
  const quizData = [
    {
      question: "What is the keyword to declare a variable in JavaScript?",
      choices: ["let", "int", "String", "function"],
      answer: "let"
    },
    {
      question: "What is an HTML heading tag?",
      choices: ["<p>", "<h1>", "<div>", "<title>"],
      answer: "<h1>"
    },
    {
      question: "What is the CSS property for changing text color?",
      choices: ["font-size", "background-color", "color", "text-align"],
      answer: "color"
    }
  ];

  let currentQuiz = 0;
  let score = 0;

  const question = document.getElementById("question");
  const choices = document.getElementById("choices");
  const nextBtn = document.getElementById("nextBtn");
  const result = document.getElementById("result");

  // Display quiz
  function loadQuiz() {
    // hide next button
    nextBtn.classList.add("hidden");
    // clear choices buttons
    choices.innerHTML = "";

    // rewrite question
    const currentData = quizData[currentQuiz];
    question.textContent = currentData.question;

　　const choicesArr = currentData.choices
    choicesArr.forEach(choice => {
      const button = document.createElement("button");
      button.textContent = choice;
      button.addEventListener("click", selectAnswer);
      choices.appendChild(button);
    });    
  }

  function selectAnswer(e) {
    const selectedAnswer = e.target.textContent;
    const correctAnswer = quizData[currentQuiz].answer;

    if (selectedAnswer === correctAnswer) {
      e.target.style.backgroundColor = "lightgreen";
      score++;
    } else {
      e.target.style.backgroundColor = "salmon";
    }

    // Prevent other buttons from being pressed
    const choiceBtns = Array.from(choices.children)
    choiceBtns.forEach(btn => btn.disabled = true);

    // Show next button
    nextBtn.classList.remove("hidden");
  }

  nextBtn.addEventListener("click", function (event) {
    currentQuiz++;
    if (currentQuiz < quizData.length) {
      loadQuiz();
    } else {
      showResult();
    }
  });

  function showResult() {
    document.getElementById("quiz").classList.add("hidden");
    result.classList.remove("hidden");
    result.textContent = `ពិន្ទុរបស់អ្នកគឺ ${score} / ${quizData.length} !`
  }

  // The first display
  loadQuiz();
});
