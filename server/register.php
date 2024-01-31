<?php

require_once 'autoload.php';
use model\PlayerDAO;
use model\PlayerCRUD;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // Vérification des données
    if (!$login || !$password || !$email) {
        exit('Données invalides ou manquantes.');
    }

    // Création de l'objet PlayerDAO
    $player = new PlayerDAO();
    $player->setLogin($login);
    $player->setPassword($password);
    $player->setEmail($email);

    try {
        if (PlayerCRUD::create($player)) {
            echo "Inscription réussie!";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } catch (Exception $e) {
        error_log($e->getMessage()); // Log de l'erreur
        echo "Erreur serveur, veuillez réessayer plus tard.";
    }
}