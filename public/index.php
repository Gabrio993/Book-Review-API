<?php

require_once "../vendor/autoload.php"; // Inclusione dell'autoloader di Composer
require_once "../app/models/CasaEditrice.php"; // Inclusione del model 
require_once "../app/models/CasaEditriceDAO.php";
require_once "../app/controllers/CasaEditriceController.php"; // Inclusione del controller 
require_once "../config/Database.php"; // Inclusione della connessione al db


// Testing

/*------------Ottieni tutti gli utenti------------*/
echo "Ottenimento di tutti gli autori";
$controller = new CasaEditriceController();
echo "<pre>";
$controller->getAllCaseEditrici();
echo "</pre>";

/*------------Trova Autore per id------------*/
echo "Ottenimento autore in base all'ID inserito";
$controller2 = new CasaEditriceController();
echo "<pre>";
$controller2->getCasaEditriceById(5);
echo "</pre>";

/*------------Inserimento nuovo autore------------*/
echo "Aggiungo un nuovo autore ";
$controller3 = new CasaEditriceController();
echo "<pre>";
$controller3->createCasaEditrice('Salani',"1998","London");
echo "</pre>";
