
# ProjetQuizz

ProjetQuizz est une application web de type quiz développée en HTML, CSS, JavaScript et PHP, avec un back-end MySQL. Elle permet de créer, répondre et gérer des quizz via une interface dynamique.

## 📁 Structure du projet

```
ProjetQuizz/
│
├── css/                  # Fichiers CSS
├── githubFiles/          # Fichier readme + gitignore
├── image/                #fichier images
├── jeux/                 # dossier avec la logique des jeux
├── js/                   # Scripts JS (front-end)
├── php/                  # Scripts PHP (back-end)
├── sql/                  # Script SQL de création de la base de données
├── index.php             # Page d'accueil
├── ... les autres pages php/

```

## 🛠️ Prérequis

- Serveur local comme **XAMPP**, **WAMP** ou **MAMP** ou un WSL/Linux
- **PHP** ≥ 7.0
- **MySQL** ≥ 5.7
- Navigateur moderne (Chrome, Firefox, etc.)

## 🚀 Installation

1. **Cloner le projet** :

   ```bash
   git clone https://github.com/Maxime-jn/ProjetQuizz.git
   ```

2. **Placer le dossier dans le répertoire de votre serveur local** :


3. **Importer la base de données** :

   - Démarrer Apache et MySQL depuis XAMPP.
   - Accéder à [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Créer une nouvelle base de données appelée `projetquizz`.
   - Importer le fichier `sql/QuizGame.sql`.

4. **Configurer la connexion à la base de données** :

   Dans le fichier `php/config.php` (ou celui utilisé pour la connexion), modifier les informations :

   ```php
   $host = 'localhost';
   $db = 'projetquizz';
   $user = 'root';
   $pass = ''; // ou votre mot de passe MySQL
   ```

5. **Lancer l'application** :

   Accéder via le navigateur à :

   ```
   http://localhost/ProjetQuizz/
   ```

---

## 📷 Fonctionnalités

- Répondre à des quizz
- Résoudres des casse-tête
- Créer des concours
- Rejoindres des concours

## 📌 Auteurs

- [Maxime Jean](https://github.com/Maxime-jn)
- [Timoleon Hede](https://github.com/Timo74123)
- [Leart Demiri](https://github.com/Leartdemiri)

---

## ❓ Support

Pour tout problème ou suggestion, n'hésitez pas à créer une **issue** sur [le dépôt GitHub](https://github.com/Maxime-jn/ProjetQuizz/issues).
