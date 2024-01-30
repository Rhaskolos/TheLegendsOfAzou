<?php

namespace model;
use Exception;

require_once '../autoload.php';
require_once 'PlayerCRUD.php';
require_once 'PlayerDAO.php';

// test methode create!

//$player = new PlayerDAO();
//$player->setLogin("testUser");
//$player->setPassword("8a5b8b4611dee46b3daf3531fabb2a73a93a2be376eaa240dc115dd5818bd24a533eeee9a46aaa27c8064516e489e60b75533506e774e1979228428c910af275");
//$player->setEmail("test@example.com");
//try {
    //$result = PlayerCRUD::create($player);
//} catch (\Exception $e) {
//}
//echo "Création réussie ? " . ($result ? "Oui" : "Non") . "\n";

// test methode login!

//$login = "testUser";
//$password = "8a5b8b4611dee46b3daf3531fabb2a73a93a2be376eaa240dc115dd5818bd24a533eeee9a46aaa27c8064516e489e60b75533506e774e1979228428c910af275";
//
//try {
//    $result = PlayerCRUD::login($login, $password);
//    echo "Connexion réussie ? " . ($result ? "Oui" : "Non") . "\n";
//} catch (Exception $e) {
//    echo "Erreur lors de la connexion : " . $e->getMessage() . "\n";
//}

// test methode read!

//$playerId = 1;
//
//try {
//    $player = PlayerCRUD::read($playerId);
//    echo "Informations du joueur : \n";
//    echo "ID: " . $player->getId() . "\n";
//    echo "Login: " . $player->getLogin() . "\n";
//    echo "Email: " . $player->getEmail() . "\n";
//
//} catch (Exception $e) {
//    echo "Erreur lors de la lecture des informations du joueur : " . $e->getMessage() . "\n";
//}

// test methode update!
$playerId = 1;

try {

    $player = PlayerCRUD::read($playerId);


    $player->setLogin("testLogin");
    $player->setEmail("testemail@example.com");

    // Appeler la méthode update
    $result = PlayerCRUD::update($player);
    echo "Mise à jour réussie ? " . ($result ? "Oui" : "Non") . "\n";
} catch (Exception $e) {
    echo "Erreur lors de la mise à jour du joueur : " . $e->getMessage() . "\n";
}