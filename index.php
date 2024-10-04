<?php

// Carica l'autoload di Composer
require './vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

// Definisci le rotte con FastRoute
$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    // Rotta per la homepage
    $r->addRoute('GET', '/', 'homeHandler');
    
    // Rotta per recuperare un utente con ID dinamico
    $r->addRoute('GET', '/user/{id:\d+}', 'getUserHandler');
    
    // Rotta per creare un nuovo utente (POST)
    $r->addRoute('POST', '/user/create', 'createUserHandler');
});

// Ottieni il metodo HTTP e l'URI corrente
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Rimuovi i parametri di query dall'URI (se presenti)
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

// Decodifica l'URI
$uri = rawurldecode($uri);

// Dispatch del router
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Gestisci il caso in cui la rotta non è trovata
        echo "404 - Not Found";
        break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Gestisci il caso in cui il metodo HTTP non è permesso
        echo "405 - Method Not Allowed";
        break;

    case FastRoute\Dispatcher::FOUND:
        // Se la rotta è trovata, ottieni l'handler e i parametri dinamici
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

// Funzioni di gestione delle rotte
function homeHandler() {
    echo "Benvenuto alla homepage!";
}

function getUserHandler($vars) {
    $userId = $vars['id'];
    echo "Profilo dell'utente con ID: $userId";
}

function createUserHandler() {
    echo "Nuovo utente creato!";
}