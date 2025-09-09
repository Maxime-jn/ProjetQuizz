<?php
require_once "php/GlobalFunction/functions.php";

$questions = getRandomQuestions(); // Assumes each question has 'questionText' and 'choices' with 'choiceText' & 'isCorrect'
?>
<!-- 

Auteurs :
Jean Maxime Robin
Leart Demiri
Timoléon Hede

Projet : 
BriseTete

Version : 
0.7 BETA

-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BriseTête</title>
    <link rel="stylesheet" href="css/base.css">
</head>

<body class="conteneurBackground">

    <header class="barreDeHeader">
        <div class="insideHeaderContainer">
            <div>
                <a href="index.php">
                    <h1>BriseTête</h1>
                </a>
            </div>

            <div id="myConcours"></div>
            <div id="auth-buttons"></div>
        </div>
    </header>

    <main id="mainQuiz">
        <h1 id="questionTitle">Question à choix multiple</h1>
        <div id="questionText"></div>
        <div id="buttonQuestionQuiz"></div>
        <div>
            <button id="buttonSoumettreQuiz">Soumettre</button>
            <div id="quizTimer" style="margin: 1em 0; font-weight: bold;">Temps restant : 2:00</div>
        </div>
        <div id="result" style="margin-top: 1em;"></div>
    </main>


    <footer class="pageFooter">
        <div class="footerTitre">BriseTête © 2025</div>

        <div class="footerLinks">
            <span>Réalisé par : I.DA.P4A</span>
            <ul>
                <li><a href="https://edu.ge.ch/site/cfpt">CFPT</a></li>
                <li><a href="https://www.ge.ch/conditions-generales">Conditions générales</a></li>
                <li><a href="https://edu.ge.ch/site/cfpt/secretariats-2">Contact</a></li>
            </ul>
        </div>
    </footer>

    <script>
    const quizData = <?php echo json_encode($questions, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>;

    let currentQuestionIndex = 0;
    let selectedAnswer = null;
    let score = 0;
    const totalTime = 120; // seconds
    let remainingTime = totalTime;
    let timerInterval;

    function formatTime(seconds) {
        const min = Math.floor(seconds / 60).toString().padStart(2, '0');
        const sec = (seconds % 60).toString().padStart(2, '0');
        return `${min}:${sec}`;
    }

    function updateTimer() {
        remainingTime--;
        document.getElementById("quizTimer").textContent = "Temps restant : " + formatTime(remainingTime);
        if (remainingTime <= 0) {
            clearInterval(timerInterval);
            score = 0;
            showFinalScore(true);
        }
    }

    function startTimer() {
        document.getElementById("quizTimer").textContent = "Temps restant : " + formatTime(remainingTime);
        timerInterval = setInterval(updateTimer, 1000);
    }

    function displayQuestion() {
        const question = quizData[currentQuestionIndex];
        document.getElementById("questionText").textContent = question.questionText;

        const buttonContainer = document.getElementById("buttonQuestionQuiz");
        buttonContainer.innerHTML = "";

        question.choices.forEach((choice) => {
            const btn = document.createElement("button");
            btn.textContent = choice.choiceText;
            btn.dataset.isCorrect = choice.isCorrect;
            btn.addEventListener("click", () => {
                selectedAnswer = btn;
                document.querySelectorAll("#buttonQuestionQuiz button").forEach(b => b.classList.remove(
                    "selected"));
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

        const isCorrect = selectedAnswer.dataset.isCorrect === "1" || selectedAnswer.dataset.isCorrect ===
            "true";
        document.getElementById("result").textContent = isCorrect ? "✅ Bonne réponse !" : "❌ Mauvaise réponse.";

        if (isCorrect) score++;

        currentQuestionIndex++;
        if (currentQuestionIndex < quizData.length) {
            selectedAnswer = null;
            setTimeout(() => {
                document.getElementById("result").textContent = "";
                displayQuestion();
            }, 1500);
        } else {
            clearInterval(timerInterval);
            setTimeout(() => {
                showFinalScore(false);
            }, 1500);
        }
    });

    function showFinalScore(timeout = false) {
        let finalScoreText = "";
        let finalScore = 0;

        if (timeout) {
            finalScoreText = "<p>⏰ Temps écoulé ! Votre score est 0.</p>";
        } else {
            const bonus = remainingTime / totalTime;
            finalScore = Math.round(score * (1 + bonus));
            finalScoreText = `<p>Votre score brut est <strong>${score}</strong> sur <strong>${quizData.length}</strong>.</p>
                              <p>⏱️ Bonus de rapidité : +${Math.round(bonus * 100)}%</p>
                              <p><strong>Score final : ${finalScore}</strong></p>`;
        }

        document.getElementById("mainQuiz").innerHTML = `
            <h2>🎉 Quiz terminé !</h2>
            ${finalScoreText}
            <button id="retryButton">🔁 Relancer le quiz</button>
        `;

        // Send score to server
        const userId = localStorage.getItem("user_id"); // Ensure this is set at login
        if (userId) {
            fetch("php/pages/save_score.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        userId: parseInt(userId),
                        scoreValue: timeout ? 0 : finalScore,
                        gameMode: "quizz"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (!data.success) console.warn("Score not saved:", data.message);
                })
                .catch(err => console.error("Error saving score:", err));
        }


        document.getElementById("retryButton").addEventListener("click", () => {
            // Reset state
            currentQuestionIndex = 0;
            selectedAnswer = null;
            score = 0;
            remainingTime = totalTime;
            clearInterval(timerInterval);

            document.getElementById("mainQuiz").innerHTML = `
                <h1 id="questionTitle">Question à choix multiple</h1>
                <div id="quizTimer" style="margin: 1em 0; font-weight: bold;">Temps restant : 2:00</div>
                <div id="questionText"></div>
                <div id="buttonQuestionQuiz"></div>
                <div>
                    <button id="buttonSoumettreQuiz">Soumettre</button>
                </div>
                <div id="result" style="margin-top: 1em;"></div>
            `;

            document.getElementById("buttonSoumettreQuiz").addEventListener("click", () => {
                if (!selectedAnswer) {
                    alert("Veuillez choisir une réponse.");
                    return;
                }

                const isCorrect = selectedAnswer.dataset.isCorrect === "1" || selectedAnswer.dataset
                    .isCorrect === "true";
                document.getElementById("result").textContent = isCorrect ? "✅ Bonne réponse !" :
                    "❌ Mauvaise réponse.";

                if (isCorrect) score++;

                currentQuestionIndex++;
                if (currentQuestionIndex < quizData.length) {
                    selectedAnswer = null;
                    setTimeout(() => {
                        document.getElementById("result").textContent = "";
                        displayQuestion();
                    }, 1500);
                } else {
                    clearInterval(timerInterval);
                    setTimeout(() => {
                        showFinalScore(false);
                    }, 1500);
                }
            });

            displayQuestion();
            startTimer();
        });
    }

    window.addEventListener("DOMContentLoaded", () => {
        displayQuestion();
        startTimer();
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const userId = localStorage.getItem('user_id');
        // Sélectionne tous les liens "Mes concours" du site
        document.querySelectorAll('a[href="mesConcours.php"]').forEach(link => {
            if (userId) link.href = 'mesConcours.php?user_id=' + encodeURIComponent(userId);
        });
    });
    </script>
    <script src="js/connexion.js"></script>
    <script src="js/toMyConcours.js"></script>
</body>

</html>