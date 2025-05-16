// Gère la déconnexion
function logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('user_id');
    alert('Déconnexion réussie !');
    window.location.href = 'index.php';
}

// Ajoute un événement au bouton de déconnexion
document.addEventListener('DOMContentLoaded', () => {
    const logoutButton = document.getElementById('logout-button');
    if (logoutButton) {
        logoutButton.addEventListener('click', logout);
    }
});