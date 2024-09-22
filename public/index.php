<?php

require_once "../vendor/autoload.php"; // Inclusione dell'autoloader di Composer
require_once "../app/models/Utente.php"; // Inclusione del model 
require_once "../app/controllers/UtenteController.php"; // Inclusione del controller 
require_once "../config/Database.php"; // Inclusione della connessione al db


// Testing

/*------------Ottieni tutti gli utenti------------*/
echo "Ottieni tutti gli utenti";
$controller = new UtenteController();
echo "<pre>";
$controller->getAllUsers();
echo "</pre>";
/*------------Trova utente per id------------*/
echo "Trova utente per id";
$controller2 = new UtenteController();
echo "<pre>";
$controller2->getUserById(2);
echo "</pre>";
/*------------Crea un nuovo Utente------------*/
// $controller2->createUser(6,"pippoPower","spippo@gmail.com","pippo98");

