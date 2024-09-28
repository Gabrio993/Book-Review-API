<?php

use FastRoute\RouteCollector;

require_once "../vendor/autoload.php";
require_once "../config/Database.php";
require_once "../app/models/Libro.php";
require_once "../app/models/LibroDAO.php";
require_once "../app/controllers/LibroController.php";

function route()
{
    // Definiamo il dispatcher di FastRoute
    $dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

        // Definiamo le rotte per le operazione CRUD 
        $r->addRoute("GET", "/book-review-api/libri", ["LibroController", "getBooks"]);  // Elenca tutti i libri
        $r->addRoute('GET', '/book-review-api/libri/{id:\d+}', ['LibroController', "showIdBook"]); // Mostra un singolo libro (id)
        $r->addRoute('GET', '/book-review-api/libri/genre', ['LibroController', "showGenreBook"]); // Mostra libri in base al genere
        $r->addRoute('PUT', '/book-review-api/libri/{id:\d+}', ['LibroController', "update"]); // Aggiorna un libro passando l'id
        $r->addRoute('POST', '/book-review-api/libri', ['LibroController', "create"]);  // Crea un nuovo libro
        $r->addRoute('DELETE', '/book-review-api/libri/{id:\d+}', ['LibroController', "deleteIdBook"]); // Cancella un libro (id)

    });
}
