"use strict";

document.addEventListener('DOMContentLoaded', function () {
    const userId = localStorage.getItem('user_id');
    // Sélectionne tous les liens "Mes concours" du site
    document.querySelectorAll('a[href="mesConcours.php"]').forEach(link => {
        if (userId) link.href = 'mesConcours.php?user_id=' + encodeURIComponent(userId);
    });
});

