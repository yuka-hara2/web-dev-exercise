document.addEventListener("DOMContentLoaded", function () {
  // Questions
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

  const questionEl = document.getElementById("question");
  const choicesEl = document.getElementById("choices");
  const nextBtn = document.getElementById("nextBtn");
  const resultEl = document.getElementById("result");

  // Try Animation!(ex. Text Zooming)
  let scale = 1;
  let grow = true;

  // Show Quiz
  function loadQuiz() {
    // Hide next button
    nextBtn.classList.add("hidden");
    // Clear Choices
    choicesEl.innerHTML = "";

    const currentData = quizData[currentQuiz];
    questionEl.textContent = currentData.question;

    currentData.choices.forEach(choice => {
      const button = document.createElement("button");
      button.textContent = choice;
      button.addEventListener("click", selectAnswer);
      choicesEl.appendChild(button);
    });
  }

  function selectAnswer(e) {
    const selected = e.target.textContent;
    const correct = quizData[currentQuiz].answer;

    if (selected === correct) {
      e.target.style.backgroundColor = "lightgreen";
      score++;
    } else {
      e.target.style.backgroundColor = "salmon";
    }

    // Prevent other buttons from being pressed
    Array.from(choicesEl.children).forEach(btn => btn.disabled = true);

    // Show Next Button
    nextBtn.classList.remove("hidden");
  }

  // Text Zooming for Result
  function animate() {
    if (grow) {
      scale += 0.01;
      if (scale > 1.5) grow = false;
    } else {
      scale -= 0.01;
      if (scale < 1) grow = true;
    }

    resultEl.style.transform = `scale(${scale})`;

    requestAnimationFrame(animate);
  }

  function showResult() {
    document.getElementById("quiz").classList.add("hidden");
    resultEl.classList.remove("hidden");
    resultEl.textContent = `Your score is ${score} / ${quizData.length} !`;
    animate();
  }

  // Go to Next Quiz
  nextBtn.addEventListener("click", () => {
    currentQuiz++;
    if (currentQuiz < quizData.length) {
      loadQuiz();
    } else {
      showResult();
    }
  });

  // Load the first quiz
  loadQuiz();
});
