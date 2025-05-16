<?php
require_once "php/GlobalFunction/functions.php";

$questions = getRandomQuestions(); // Assumes each question has 'questionText' and 'choices' with 'choiceText' & 'isCorrect'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête - Question</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/quizz.css">
    <style>
        #buttonQuestionQuiz button.selected {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <div><a href="index.php">
            <h1>BriseTête</h1>
        </a></div>
        <div id="auth-buttons"></div>
    </header>

    <main id="mainQuiz">
        <h1 id="questionTitle">Question à choix multiple</h1>
        <div id="questionText"></div>
        <div id="buttonQuestionQuiz"></div>
        <div>
            <button id="buttonSoumettreQuiz">Soumettre</button>
        </div>
        <div id="result" style="margin-top: 1em;"></div>
    </main>

    <footer>BriseTête © 2025</footer>

    <!-- Load the question data -->
    <script>
        const quizData = <?php echo json_encode($questions, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>;
    </script>

    <!-- JS Logic -->
    <script>
        let currentQuestionIndex = 0;
        let selectedAnswer = null;

        function displayQuestion() {
            const question = quizData[currentQuestionIndex];
            document.getElementById("questionText").textContent = question.questionText;

            const buttonContainer = document.getElementById("buttonQuestionQuiz");
            buttonContainer.innerHTML = "";

            question.choices.forEach((choice, index) => {
                const btn = document.createElement("button");
                btn.textContent = choice.choiceText;
                btn.dataset.isCorrect = choice.isCorrect;
                btn.addEventListener("click", () => {
                    selectedAnswer = btn;
                    document.querySelectorAll("#buttonQuestionQuiz button").forEach(b => b.classList.remove("selected"));
                    btn.classList.add("selected");
                });
                buttonContainer.appendChild(btn);
            });
        }

        document.getElementById("buttonSoumettreQuiz").addEventListener("click", () => {
            if (!selectedAnswer) {
                alert("Veuillez choisir une réponse.");
                return;
            }

            const isCorrect = selectedAnswer.dataset.isCorrect === "1" || selectedAnswer.dataset.isCorrect === "true";
            document.getElementById("result").textContent = isCorrect ? "✅ Bonne réponse !" : "❌ Mauvaise réponse.";

            currentQuestionIndex++;
            if (currentQuestionIndex < quizData.length) {
                selectedAnswer = null;
                setTimeout(() => {
                    document.getElementById("result").textContent = "";
                    displayQuestion();
                }, 1500);
            } else {
                setTimeout(() => {
                    document.getElementById("mainQuiz").innerHTML = "<h2>🎉 Quiz terminé !</h2>";
                }, 1500);
            }
        });

        window.addEventListener("DOMContentLoaded", displayQuestion);
    </script>
    <script src="js/connexion.js"></script>
</body>
</html>
