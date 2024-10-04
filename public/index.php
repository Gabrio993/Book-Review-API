<?php

require_once "../vendor/autoload.php"; // Composer autoloader
require_once "../app/models/CasaEditrice.php"; 
require_once "../app/models/CasaEditriceDAO.php";
require_once "../app/controllers/CasaEditriceController.php"; // Controller 
require_once "../config/Database.php"; // DB

/******* Testing *******/

/******* Ottieni tutte le case editrici *******/
echo "Ottenimento di tutte le case editrici";
$controller = new CasaEditriceController();
echo "<pre>";
$controller->getAllCaseEditrici();
echo "</pre>";

/******** Trova casa editrice per id ********/
echo "Ottenimento casa editrice in base all'ID inserito";
$controller2 = new CasaEditriceController();
echo "<pre>";
$controller2->getCasaEditriceById(5);
echo "</pre>";

/******** Inserimento nuova casa editrice ********/
echo "Aggiungo una nuova casa editrice ";
$controller3 = new CasaEditriceController();
echo "<pre>";
$controller3->createCasaEditrice('Salani',"1998","London");
echo "</pre>";