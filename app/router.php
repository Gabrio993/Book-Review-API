<?php

use FastRoute\RouteCollector;

require_once "../vendor/autoload.php";
require_once "../config/Database.php";
require_once "../app/models/Libro.php";
require_once "../app/models/LibroDAO.php";
require_once "../app/models/Utente.php";
require_once "../app/models/UtenteDAO.php";
require_once "../app/models/CasaEditrice.php";
require_once "../app/models/CasaEditriceDAO.php";
require_once "../app/models/Autore.php";
require_once "../app/models/AutoreDAO.php";
require_once "../app/models/Recensione.php";
require_once "../app/models/RecensioneDAO.php";
require_once "../app/controllers/LibroController.php";
require_once "../app/controllers/UtenteController.php";
require_once "../app/controllers/CasaEditriceController.php";
require_once "../app/controllers/Autore_controller.php";
require_once "../app/controllers/RecensioneController.php";
require_once "../app/controllers/VistaController.php";

function route()
{
    // Definiamo il dispatcher di FastRoute
    $dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

        // Definiamo le rotte per le operazione CRUD 
        // Libri
        $r->addRoute("GET", "/book-review-api/libri", ["LibroController", "getBooks"]);  // Elenca tutti i libri
        $r->addRoute('GET', '/book-review-api/libri/{id:\d+}', ['LibroController', "showIdBook"]); // Mostra un singolo libro (id)
        $r->addRoute('GET', '/book-review-api/libri/genre/{genere}', ['LibroController', "showGenreBook"]); // Mostra libri in base al genere
        $r->addRoute('PUT', '/book-review-api/libri/{id:\d+}', ['LibroController', "update"]); // Aggiorna un libro passando l'id
        $r->addRoute('POST', '/book-review-api/libri', ['LibroController', "create"]);  // Crea un nuovo libro
        $r->addRoute('DELETE', '/book-review-api/libri/{id:\d+}', ['LibroController', "deleteIdBook"]); // Cancella un libro (id)
        //Utenti
        $r->addRoute("GET", "/book-review-api/utenti", ["UtenteController", "getAllUsers"]);  // Elenca tutti gli utenti
        $r->addRoute("GET", "/book-review-api/utenti/{id_utente:\d+}", ["UtenteController", "showUserId"]);  // Mostra utente (id)
        $r->addRoute("GET", "/book-review-api/utenti/username/{username}", ["UtenteController", "showUsername"]);  // Mostra utente(username)
        $r->addRoute("GET", "/book-review-api/utenti/email/{email}", ["UtenteController", "showEmail"]);  // Mostra utente(email)
        $r->addRoute("PUT", "/book-review-api/utenti/{id_utente:\d+}", ["UtenteController", "update"]);  // Modifica utente(id)
        $r->addRoute("POST", "/book-review-api/utenti", ["UtenteController", "create"]);  // Crea un nuovo utente
        $r->addRoute("DELETE", "/book-review-api/utenti/{id_utente:\d+}", ["UtenteController", "deleteIdUser"]);  // Crea un nuovo utente
        // Case editrici
        $r->addRoute("GET", "/book-review-api/casaeditrice", ["CasaEditriceController", "getAllCaseEditrici"]);  // Elenca tutte le case editrici
        $r->addRoute("GET", '/book-review-api/casaeditrice/{id_casa_editrice:\d+}', ['CasaEditriceController', "getCasaEditriceById"]);  // Elenca casa editrice(id)
        $r->addRoute('POST', '/book-review-api/casaeditrice', ['CasaEditriceController', "createCasaEditrice"]); // Crea una casa editrice
        // Autori
        $r->addRoute("GET", "/book-review-api/autori", ["AutoreController", "getAllAuthors"]);  // Elenca tutti gli autori
        $r->addRoute('GET', '/book-review-api/autori/{id_autore:\d+}', ["AutoreController", "getAuthorsById"]); // Elenca Autore (id)
        $r->addRoute('PUT', '/book-review-api/autori/{id_autore:\d+}', ["AutoreController", "updateAuthors"]); // Aggiorna Autore (id)
        $r->addRoute('POST', '/book-review-api/autori', ["AutoreController", "createAuthors"]); // Crea nuovo Autore (id)
        $r->addRoute('DELETE', '/book-review-api/autori/{id_autore:\d+}', ["AutoreController", "deleteAuthors"]); // Elimina Autore (id)
        //Recensioni
        $r->addRoute("GET", "/book-review-api/recensioni", ["RecensioneController", "getAllRecensioni"]);  // Elenca tutte le recensioni
        $r->addRoute("GET", "/book-review-api/recensioni/{id:\d+}", ["RecensioneController", "getRecensioneById"]);  // Elenca una recensione (id)
        $r->addRoute("PUT", "/book-review-api/recensioni/{id:\d+}", ["RecensioneController", "updateRecensione"]);  // Aggiorna recensione
        $r->addRoute("POST", "/book-review-api/recensioni/{id:\d+}", ["RecensioneController", "createRecensione"]);  // Crea una recensione
        $r->addRoute("DELETE", "/book-review-api/recensioni/{id:\d+}", ["RecensioneController", "deleteRecensione"]);  // Cancella una recensione
        // Nuova rotta per il VistaController
        $r->addRoute('GET', '/book-review-api/vista', ['VistaController', 'showBooksView']); // Mostra la vista dei libri
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

            header("Content-Type: application/json");
            // Istanzia il controller e chiama il metodo specifico
            $controller = new $handler[0];
            call_user_func_array([$controller, $handler[1]], $vars);
            break;
    }
}
