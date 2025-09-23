<?php
session_start();
require_once '../base/database.php';

function wants_json() {
  return isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['pseudo'] ?? '');

  if (empty($username)) {
    if (wants_json()) {
      echo json_encode(['success' => false, 'message' => 'Veuillez entrer un pseudo.']);
      exit;
    }
    $_SESSION['error'] = "Veuillez entrer un pseudo.";
    header("Location: ../../formInscription.php"); exit;
  }

  $checkUser = database::run("SELECT idUser FROM User WHERE username = ?", [$username])->fetch();

  $token = bin2hex(random_bytes(16));

  if ($checkUser) {
    database::run("UPDATE User SET token = ? WHERE idUser = ?", [$token, $checkUser['idUser']]);
    $userId = $checkUser['idUser'];
  } else {
    database::run("INSERT INTO User (username, token) VALUES (?, ?)", [$username, $token]);
    $userId = database::db()->lastInsertId();
    // attention aux noms de colonnes : 'userId' existe bien dans Score ?
    database::run("INSERT INTO Score (userId, gameMode, scoreValue) VALUES (?, 'quizz', 0)", [$userId]);
    database::run("INSERT INTO Score (userId, gameMode, scoreValue) VALUES (?, 'casse-tete', 0)", [$userId]);
  }

  $_SESSION['user_id'] = $userId;
  $_SESSION['username'] = $username;
  $_SESSION['token'] = $token;

  if (wants_json()) {
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'user_id' => $userId, 'token' => $token]);
    exit;
  } else {
    header("Location: ../../index.php");
    exit;
  }
} else {
  if (wants_json()) {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit;
  }
  $_SESSION['error'] = "Méthode non autorisée.";
  header("Location: ../../formInscription.php");
  exit();
}