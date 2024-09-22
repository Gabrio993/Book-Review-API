<?php

class UtenteController
{
    // Metodo per elencare tutti gli utenti (GET /utente)
    public function getAllUsers()
    {
        $utente = new Utente(); // Crei un'istanza della classe Utente
        $utenti = $utente->allUsers(); // Ottieni tutti gli utenti dal database
        echo json_encode($utenti, JSON_PRETTY_PRINT); // Restituisci i risultati come JSON
    }

    // Metodo per trovare un utente tramite id (GET /utente/{id})
    public function getUserById($id_utente)
    {
        // crea un'istanza della classe Utente
        $utente = new Utente();
        // cerca l'utente tramite id e popola le proprietà dell'oggetto
        $utente_data = $utente->getUserById($id_utente);

        if ($utente_data) {
            echo json_encode($utente_data, JSON_PRETTY_PRINT); // Restituisce l'utente come JSON
        } else {
            echo json_encode(["message" => "Utente non trovato"], JSON_PRETTY_PRINT); // Se non trovato
        }
    }

    public function createUser($id_utente, $username, $email, $password){
       // crea un'istanza della classe Utente
       $utente = new Utente();
       //Creo il nuovo utente
       $utente->createUser($id_utente, $username, $email, $password);
    }

    /* TODO: 
    - Metodo per trovare un utente tramite autore (GET/utente)
    
    
    - Metodo per creare un nuovo utente (POST/utente)


    - Metodo per aggiornare un utente (PUT/utente/{id})


    - Metodo per cancellare un utente (DELETE/utente/{id})*/
}
