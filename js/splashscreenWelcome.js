document.addEventListener("DOMContentLoaded", function () {
  const splashAccepted = localStorage.getItem("splashAccepted");

  if (!splashAccepted) {
    const splash = document.createElement("div");
    splash.id = "splashscreen";
    splash.innerHTML = `
      <div class="splash-content">
        <h2>Bienvenue sur BriseTête !</h2>
        <p>🧩 Choisissez un mode de jeu :</p>
        <ul>
          <li><strong>Seul</strong> – Entraînez-vous à résoudre des quiz et des casse-têtes.</li>
          <li><strong>Mode Concours</strong> – Affrontez d'autres joueurs en temps réel.</li>
        </ul>
        <p>🏆 Consultez les classements pour voir les meilleurs joueurs.</p>
        <button id="closeSplash">C'est parti !</button>
      </div>
    `;
    document.body.appendChild(splash);

    document.getElementById("closeSplash").addEventListener("click", function () {
      splash.style.display = "none";
      localStorage.setItem("splashAccepted", "true");
    });
  }
});
