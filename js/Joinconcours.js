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
        const password = document.getElementById('password')?.value.trim() || '';
        const participants = document.getElementById('participants')?.value || 0;
        const isPublic = document.querySelector('input[name="public"]:checked')?.value || 0;

        if (!name || participants <= 0) {
            alert("Veuillez remplir tous les champs obligatoires.");
            return;
        }

        const params = new URLSearchParams({
            name,
            password,
            participants,
            isPublic,
        });

        try {
            const response = await fetch('php/GlobalFunction/creerConcours.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params.toString(),
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                window.location.href = 'index.php';
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error(error);
            alert('Erreur de communication avec le serveur.');
        }
    });
});