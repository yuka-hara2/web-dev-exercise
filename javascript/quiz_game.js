document.addEventListener("DOMContentLoaded", function () {
  // 問題データ
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

  // クイズを表示
  function loadQuiz() {
    // 次へボタンを隠す
    nextBtn.classList.add("hidden");
    // 選択肢をクリア
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

  // 選択したとき
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

    // 次へボタンを表示
    nextBtn.classList.remove("hidden");
  }

  // 次の問題へ
  nextBtn.addEventListener("click", () => {
    currentQuiz++;
    if (currentQuiz < quizData.length) {
      loadQuiz();
    } else {
      showResult();
    }
  });

  // 結果を表示
  function showResult() {
    document.getElementById("quiz").classList.add("hidden");
    resultEl.classList.remove("hidden");
    resultEl.textContent = `あなたのスコアは ${score} / ${quizData.length} です！`;
  }

  // 最初の問題をロード
  loadQuiz();
});
