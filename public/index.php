<?php

require_once "../vendor/autoload.php"; // Inclusione dell'autoloader di Composer
require_once "../app/models/AutoreDAO.php"; //Inclusione di AutoreDAO
require_once "../app/controllers/Autore_controller.php"; // Inclusione del controller 
require_once "../config/Database.php"; // Inclusione della connessione al db



/*------------Ottenimento di tutti gli autori------------*/
echo "Elenco di tutti gli autori";
$controller = new AutoreController();
echo "<pre>";
$controller->getAllAuthors();
echo "</pre>";

// /*------------Trovare un autore dato l'ID------------*/
echo "Autore trovato tramite l'ID";
$controller2 = new AutoreController();
echo "<pre>";
$controller2->getAuthorsById(1);
echo "</pre>";

/*------------Inserimento nuovo autore------------*/
// $controller3 = new AutoreController();
// $controller3->createAuthors(1, 'Giorgio', 'Scerbanenco', '1911-09-28');
// echo "</pre>";



/*------------Rimozione di un autore------------*/
// $controller4 = new AutoreController();
// echo "<pre>";
// $controller4-> deleteAuthors(6);
// echo "</pre>";

 
/*------------Aggiornamento di un autore------------*/
// $controller5 = new AutoreController();
// $controller5-> updateAuthors(1, 'Giorgio', 'Scerbanenco', '1911-09-28');
// echo "</pre>";



