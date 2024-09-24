<?php

require_once "../vendor/autoload.php"; // Inclusione dell'autoloader di Composer
require_once "../app/models/Autore.php"; // Inclusione del model 
require_once "../app/controllers/Autore_controller.php"; // Inclusione del controller 
require_once "../config/Database.php"; // Inclusione della connessione al db


// Testing

/*------------Ottieni tutti gli utenti------------*/
echo "Ottieni tutti gli Autori";
$controller = new AutoreController();
echo "<pre>";
$controller->getAllAuthors();
echo "</pre>";
/*------------Trova utente per id------------*/
echo "Trova autore per id";
$controller2 = new AutoreController();
echo "<pre>";
$controller2->getAuthorsById(2);
echo "</pre>";
/*------------Crea un nuovo Utente------------*/
// $controller2->createUser(6,"pippoPower","spippo@gmail.com","pippo98");
