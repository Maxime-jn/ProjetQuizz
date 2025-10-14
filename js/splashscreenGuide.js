document.addEventListener("DOMContentLoaded", function () {
  const splashAccepted = localStorage.getItem("SplashGuideAccepted");

  if (!splashAccepted) {
    const splash = document.createElement("div");
    splash.id = "splashscreen";
    splash.innerHTML = `
  <div class="splash-content">
      <h3>Règles du jeu</h3>
      <ol>
        <li><b>Objectif :</b> Résoudre le casse-tête choisi.</li>
        <li><b>Déroulement :</b> Chaque casse-tête comporte plusieurs carrés de différentes couleurs.<br>
        Le but est de faire disparaître tous les carrés en les regroupant en ligne ou en colonne.<br>
        Cliquez sur un carré pour le déplacer dans une case vide adjacente.<br>
        Quand au moins 3 carrés de la même couleur sont alignés, ils disparaissent et vous marquez des points.</li>
        <li><b>Fin de partie :</b> Quand vous avez fait disparaître tous les carrés ou que vous n'avez plus de coup à jouer, la partie s'arrête.<br>
        Vous pouvez alors recommencer ou changer de casse-tête.</li>
      </ol>
      <div class="splash-actions">
        <button id="closeSplash">C'est parti !</button>
      </div>
    </div>
  `;
  document.body.appendChild(splash);

    document.getElementById("closeSplash").addEventListener("click", function () {
      splash.style.display = "none";
      localStorage.setItem("SplashGuideAccepted", "true");
    });
  }
});
