# ProjetQuizz

ProjetQuizz est une application web de type quiz développée en HTML, CSS, JavaScript et PHP, avec un back-end MySQL. Elle permet de créer, répondre et gérer des quizz via une interface dynamique.

## 📁 Structure du projet

ProjetQuizz/
│
├── assets/ # Fichiers CSS, JS, images
├── php/ # Scripts PHP (back-end)
├── sql/ # Script SQL de création de la base de données
├── index.html # Page d'accueil
├── README.md # (ce fichier)

markdown
Copier
Modifier

## 🛠️ Prérequis

- Serveur local comme **XAMPP**, **WAMP** ou **MAMP**
- **PHP** ≥ 7.0
- **MySQL** ≥ 5.7
- Navigateur moderne (Chrome, Firefox, etc.)

## 🚀 Installation

1. **Cloner le projet** :

   ```bash
   git clone https://github.com/Maxime-jn/ProjetQuizz.git
Placer le dossier dans le répertoire de votre serveur local :

Par exemple avec XAMPP :

bash
Copier
Modifier
mv ProjetQuizz/ C:/xampp/htdocs/
Importer la base de données :

Démarrer Apache et MySQL depuis XAMPP.

Accéder à http://localhost/phpmyadmin.

Créer une nouvelle base de données appelée projetquizz.

Importer le fichier sql/projetquizz.sql.

Configurer la connexion à la base de données :

Dans le fichier php/config.php (ou celui utilisé pour la connexion), modifier les informations :

php
Copier
Modifier
$host = 'localhost';
$db = 'projetquizz';
$user = 'root';
$pass = ''; // ou votre mot de passe MySQL
Lancer l'application :

Accéder via le navigateur à :

arduino
Copier
Modifier
http://localhost/ProjetQuizz/
📷 Fonctionnalités
Répondre à des quizz

Ajouter ou modifier des questions

Gestion dynamique en JavaScript

Interaction asynchrone avec PHP via fetch

📌 Auteurs
Maxime Jean

