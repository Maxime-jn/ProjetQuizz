document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const userId = localStorage.getItem('user_id');
    const token = localStorage.getItem('token');

    if (!userId || !token) {
        alert("Vous devez être connecté pour accéder à cette fonctionnalité.");
        window.location.href = 'formConnexion.php';
        return;
    }

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        const name = document.getElementById('name').value.trim();
        const participants = document.getElementById('participants')?.value || 0;
        const typeConcour = document.querySelector('input[name="typeConcour"]:checked')?.value;

        if (!name || participants <= 0) {
            alert("Veuillez remplir tous les champs obligatoires.");
            return;
        }
        if (!typeConcour) {
            alert("Veuillez choisir un type de concours.");
            return;
        }

        const params = new URLSearchParams({ name, participants, userId, typeConcour });

        try {
            const response = await fetch('php/GlobalFunction/creeConcours.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params.toString(),
            });
            const result = await response.json();

            if (result.success && result.idConcours) {
                alert(result.message);
                // Auto-join est déjà fait côté serveur -> redirection directe
                window.location.href = 'hubConcours.php?idConcours=' + result.idConcours;
            } else {
                alert(result.message || 'Erreur lors de la création.');
            }
        } catch (error) {
            console.error(error);
            alert('Erreur de communication avec le serveur.');
        }
    });
});
