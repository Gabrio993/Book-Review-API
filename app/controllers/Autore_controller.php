<?php

class AutoreController

{
    // Metodo per elencare tutti gli autori (GET /autore)
    public function getAllAuthors()
    {
        $autore = new AutoreDAO(); // Crei un'istanza della classe AutoreDAO
        $autori = $autore->allAuthors(); // Ottieni tutti gli utenti dal database
        echo json_encode($autori, JSON_PRETTY_PRINT); // Restituisci i risultati come JSON
    }

    // Metodo per trovare un autore tramite id ()
    public function getAuthorsById($id_autore)
    {
        // crea un'istanza della classe Autore
        $autore = new AutoreDAO();
        // cerca l'autore tramite id e popola le proprietà dell'oggetto
        $autore_data = $autore->getAuthorsById($id_autore);

        if ($autore_data) {
            echo json_encode($autore_data, JSON_PRETTY_PRINT); // Restituisce l'autore come JSON
        } else {
            echo json_encode(["message" => "Autore non trovato"], JSON_PRETTY_PRINT); // Se non trovato
        }
    }

    public function createAuthors()
    {

        $data = json_decode(file_get_contents("php://input"), true);

        $id_autore = $data["id_autore"] ?? null;
        $nome = $data["nome"] ?? null;
        $cognome = $data["cognome"] ?? null;
        $data_nascita = $data["data_nascita"] ?? null;
        //conversione della data nel formato corretto
        $new_data_nascita = strtotime($data_nascita);
        $final_data = date("Y-m-d", $new_data_nascita);
        // crea un'istanza della classe Autore
        $autore = new AutoreDAO();
        //Creo il nuovo autore
        $autore->createAuthors($id_autore, $nome, $cognome, $final_data);
    }

    public function deleteAuthors($id_autore)
    {
        // crea un'istanza della classe Autore
        $autore = new AutoreDAO();
        // Elimino l'autore dato l'Id
        $autore->deleteAuthors($id_autore);

        // Output
        if ($autore) {
            json_encode(["message" => "Autore cancellato con successo"], JSON_PRETTY_PRINT);
        } else {
            json_encode(["message" => "Errore nella cancellazione dell'autore"], JSON_PRETTY_PRINT);
        }
    }

    public function updateAuthors($id_autore)
    {
        // Otteniamo i dati JSON inviati dal client
        $data = json_decode(file_get_contents('php://input'), true);

        $id_autore = $data["id_autore"] ?? null;
        $nome = $data["nome"] ?? null;
        $cognome = $data["cognome"] ?? null;
        $data_nascita = $data["data_nascita"] ?? null;

        $autore = new AutoreDAO();
        $autore->updateAuthors($id_autore, $nome, $cognome, $data_nascita);
    }
}
