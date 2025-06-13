// Vérifie si l'utilisateur est connecté
function checkAuth() {
    const token = localStorage.getItem('token');
    const authButtons = document.getElementById('auth-buttons');
    const myConcours = document.getElementById('myConcours');

    if (token) {
        authButtons.innerHTML = '<a href="#" id="logout-button">Déconnexion</a>';
        myConcours.innerHTML = '<a href="mesConcours.php">Mes concours</a>';
        document.getElementById('logout-button').addEventListener('click', logout);
    } else {
        authButtons.innerHTML = '<a href="formConnexion.php">Connexion</a>';
    }
}

// Gère la soumission du formulaire de connexion
async function handleLogin(event) {
    event.preventDefault();
    const pseudo = document.getElementById('pseudo').value;

    const response = await fetch('php/GlobalFunction/connexion.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ pseudo })
    });

    const result = await response.json();

    if (result.success) {
        localStorage.setItem('token', result.token);
        localStorage.setItem('user_id', result.user_id);
        alert('Connexion réussie !');
        window.location.href = 'index.php';
    } else {
        alert(result.message);
    }
}

// Gère la déconnexion
async function logout() {
    const token = localStorage.getItem('token');

    const response = await fetch('php/GlobalFunction/logout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ token })
    });

    const result = await response.json();

    if (result.success) {
        localStorage.removeItem('token');
        localStorage.removeItem('user_id');
        alert('Déconnexion réussie !');
        window.location.href = 'index.php';
    } else {
        alert(result.message);
    }
}

// Vérifie l'état de connexion au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    checkAuth();

    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }
});