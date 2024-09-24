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
$controller->getBooks();
echo "</pre>";
/*------------Trova libro per id------------*/
echo "Trova libro per id";
$controller2 = new LibroController();
echo "<pre>";
$controller2->showIdBook(4);
echo "</pre>";
/*------------Trova Libro per genere------------*/
echo "Trova libri per genere";
$controller3 = new LibroController();
echo "<pre>";
$controller3->showGenreBook("Politico");
echo "</pre>";
/*------------Crea un nuovo libro------------*/
// echo "Crea un nuovo libro";
// $controller4 = new LibroController();
// echo "<pre>";
// $controller4->create("Zorro", 4, 1980, "Storico", 1783434523893);
// echo "</pre>";
/*------------ Aggiorna un libro------------*/
 // ThunderClient o Postman per verifica
/*------------Elimina un libro--------------*/