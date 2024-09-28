<?php

// Questo file è il punto di ingresso principale per tutte le richieste.
// È il file che sarà richiamato dal server web (es. Apache, Nginx).

// Includi l'autoloader di Composer per gestire le librerie esterne (es. FastRoute)
require_once '../vendor/autoload.php';

// Includi il file Router che gestirà il routing delle richieste
require_once '../app/router.php';

// Avvia il routing
route();
