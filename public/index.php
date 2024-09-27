<?php

// Includi il file di configurazione del database
require_once '../config/Database.php';

// Includi il file autoload di Composer
require_once '../vendor/autoload.php';

// Includi il file della classe RecensioneController
require_once '../app/controllers/RecensioneController.php';

// Includi il file della classe Recensione
require_once '../app/models/Recensione.php';

// Includi il file della classe RecensioneDAO
require_once '../app/models/RecensioneDAO.php';

$controller = new RecensioneController();
echo "<pre>";
$controller->getAllRecensioni();
echo "<pre>";

// // Testa la funzione updateRecensione
// try {
//     $controller->updateRecensione(9, "Prova NOVE", 4, "Anna", date('Y-m-d H:i:s'));
//     echo 'Recensione aggiornata con successo!';
// } catch (Exception $e) {
//     echo 'Errore durante l\'aggiornamento della recensione: ' . $e->getMessage();
// }
// echo "<pre>";

// // Testa la funzione createRecensione
// try {
//     // Crea un'istanza del DAO
//     $recensioneDAO = new RecensioneDAO();
    
//     // Crea una nuova recensione
//     $recensioneDAO->createRecensione(5, 'Nome Utente 2', date('Y-m-d H:i:s'));
    
//     echo 'Recensione creata con successo!';
// } catch (Exception $e) {
//     echo 'Errore durante la creazione della recensione: ' . $e->getMessage();
// }



// // Testa la funzione getRecensioneById
// try {
//     // Ottieni l'istanza del DAO (Recensione Data Access Object)
//     $recensioneDAO = new RecensioneDAO();

//     // Recupera la recensione con l'ID 1
//     $recensione = $recensioneDAO->getRecensioneById(9);

//     if ($recensione) {
//         echo 'Recensione recuperata con successo: ' . $recensione->recensione;
//         echo '<br>';
//         echo 'Valutazione: ' . $recensione->valutazione;
//         echo '<br>';
//         echo 'Data creazione: ' . $recensione->data_creazione;
//         echo '<br>';
//         echo 'Nome utente: ' . $recensione->nome_utente;
//     } else {
//         echo 'Recensione non trovata';
//     }
// } catch (Exception $e) {
//     echo 'Errore durante il recupero della recensione: ' . $e->getMessage();
// }

// Testa la funzione deleteRecensione
// try {
//     $controller->deleteRecensione(10); 
// } catch (Exception $e) {
//     echo 'Errore durante la cancellazione della recensione: ' . $e->getMessage();
// }

?>
