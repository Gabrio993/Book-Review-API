<?php

// Includi il file di configurazione del database
require_once '../config/Database.php';

// Includi il file autoload di Composer
require_once '../vendor/autoload.php';

// Includi il file della classe RecensioneController
require_once '../app/controllers/RecensioneController.php';

// Test del controller
$controller = new RecensioneController();
echo "<pre>";
$controller->getAllRecensioni();
echo "<pre>";

// Testa la funzione updateRecensione
try {
    $controller->updateRecensione(1, "Nuovo commento", 4, "NomeUtente", date('Y-m-d H:i:s'));
    echo 'Recensione aggiornata con successo!';
} catch (Exception $e) {
    echo 'Errore durante l\'aggiornamento della recensione: ' . $e->getMessage();
}
