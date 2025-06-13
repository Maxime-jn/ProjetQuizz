document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('joinConcoursForm');
    if (!form) return;
    form.addEventListener('submit', async function (event) {
        event.preventDefault();
        const concoursName = document.getElementById('name').value;
        const userId = localStorage.getItem('user_id');
        const token = localStorage.getItem('token');
        const messageDiv = document.getElementById('message-erreur');
        messageDiv.textContent = '';
        if (!userId || !token) {
            alert("Vous devez être connecté.");
            window.location.href = 'formConnexion.php';
            return;
        }
        if (!concoursName) {
            messageDiv.textContent = "Veuillez sélectionner un concours.";
            return;
        }
        try {
            const params = new URLSearchParams({
                userId,
                token,
                name: concoursName
            });
            const response = await fetch('php/GlobalFunction/joinConcours.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params.toString()
            });
            const result = await response.json();
            if (result.success && result.idConcours) {
                window.location.href = 'hubConcours.php?idConcours=' + result.idConcours;
            } else {
                messageDiv.textContent = result.message || "Erreur lors de la participation.";
            }
        } catch (e) {
            messageDiv.textContent = "Erreur lors de la connexion au serveur.";
        }
    });
});