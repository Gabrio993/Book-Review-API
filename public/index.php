<?php

require_once "../vendor/autoload.php"; // Inclusione dell'autoloader di Composer
require_once "../app/models/Libro.php"; // Inclusione del model 
require_once "../app/controllers/LibroController.php"; // Inclusione del controller 
require_once "../config/Database.php"; // Inclusione della connessione al db


// Testing

/*------------Ottieni tutti i libri------------*/
echo "Ottieni tutti i libri";
$controller = new LibroController();
echo "<pre>";
$controller->index();
echo "</pre>";
/*------------Trova libro per id------------*/
echo "Trova libro per id";
$controller2 = new LibroController();
echo "<pre>";
$controller2->showIdBook(10);
echo "</pre>";
/*------------Crea un nuovo Libro------------*/
