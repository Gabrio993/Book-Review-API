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

    // Ottieni il metodo HTTP e l'URI della richiesta corrente
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    // Rimuovi eventuali query string (es. ?page=1)
    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);

    // Esegui il dispatch della rotta
    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            // Errore 404
            echo "404 - Not Found";
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            // Metodo HTTP non consentito
            echo "405 - Method Not Allowed";
            break;
        case FastRoute\Dispatcher::FOUND:
            // Se la rotta è trovata, chiama il controller e il metodo associati
            $handler = $routeInfo[1];  // Esempio: ['LibriController', 'index']
            $vars = $routeInfo[2];  // Variabili passate nella rotta (es. ID o altri parametri)

            // Istanzia il controller e chiama il metodo specifico
            $controller = new $handler[0];
            call_user_func_array([$controller, $handler[1]], $vars);
            break;
    }
}
