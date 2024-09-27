<?php

// Includi il file di configurazione del database
require_once '../config/Database.php';

// Includi il file autoload di Composer
require_once '../vendor/autoload.php';

// Includi il file della classe Recensione
require_once '../app/controllers/RecensioneController.php';

// Includi il file della classe Recensione
require_once '../app/models/Recensione.php';

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

// Crea un'istanza della classe Recensione
// $recensione = new Recensione();


// // Testa la funzione createRecensione
// try {
//     $recensione->createRecensione(1, 'Test recensione', 5, 'Nome Utente', '2023-02-20');
//     echo 'Recensione creata con successo!';
// } catch (Exception $e) {
//     echo 'Errore durante la creazione della recensione: ' . $e->getMessage();
// }

// // Testa la funzione updateRecensione
// try {
//     $recensione->updateRecensione(1, 'Test recensione aggiornata', 4, 'Nome Utente', '2023-02-20');
//     echo 'Recensione aggiornata con successo!';
// } catch (Exception $e) {
//     echo 'Errore durante l\'aggiornamento della recensione: ' . $e->getMessage();
// }

// // Testa la funzione getRecensioneById
// try {
//     $recensione = $recensione->getRecensioneById(1);
//     echo 'Recensione recuperata con successo: ' . $recensione['commento'];
// } catch (Exception $e) {
//     echo 'Errore durante la recensione della recensione: ' . $e->getMessage();
// }

// // Testa la funzione deleteRecensione
// try {
//     $recensione->deleteRecensione(1);
//     echo 'Recensione cancellata con successo!';
// } catch (Exception $e) {
//     echo 'Errore durante la cancellazione della recensione: ' . $e->getMessage();
// }