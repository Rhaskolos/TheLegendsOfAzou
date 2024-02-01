<?php

session_start();

require_once 'autoload.php';

use model\PlayerCRUD;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    try {
        if (PlayerCRUD::login($login, $password)) {
            $_SESSION['player_login'] = $login;
            $_SESSION['is_logged_in'] = true;
            header('Location: ../client/menu.html');
            exit();
        } else {
            // Identifiants incorrects
            echo "Identifiant ou mot de passe incorrects! . Veuillez réessayer.";
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo "Erreur lors de la connexion. Veuillez réessayer plus tard.";
    }
} else {
    header('Location: login.html');
    exit();
}
