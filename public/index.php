<?php

require_once "../vendor/autoload.php"; // Inclusione dell'autoloader di Composer
require_once "../app/models/Autore.php"; // Inclusione del model 
require_once "../app/controllers/Autore_controller.php"; // Inclusione del controller 
require_once "../config/Database.php"; // Inclusione della connessione al db


// Testing

/*------------Ottieni tutti gli utenti------------*/
echo "Ottenimento di tutti gli autori";
$controller = new AutoreController();
echo "<pre>";
$controller->getAllAuthors();
echo "</pre>";
/*------------Trova utente per id------------*/
echo "Ottenimento autore in base all'ID inserito";
$controller2 = new AutoreController();
echo "<pre>";

$controller2->getAuthorsById(5);
echo "</pre>";

