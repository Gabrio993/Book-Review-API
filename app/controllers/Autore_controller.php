<?php

class AutoreController
{
    // Metodo per elencare tutti gli autori (GET /autore)
    public function getAllAuthors()
    {
        $autore = new Autore(); // Crei un'istanza della classe Autore
        $autori = $autore->allAuthors(); // Ottieni tutti gli utenti dal database
        echo json_encode($autori, JSON_PRETTY_PRINT); // Restituisci i risultati come JSON
    }

    // Metodo per trovare un autore tramite id (GET /autore/{id})
    public function getAuthorsById($id_autore)
    {
        // crea un'istanza della classe Autore
        $autore = new Autore();
        // cerca l'autore tramite id e popola le proprietà dell'oggetto
        $autore_data = $autore->getAuthorsById($id_autore);

        if ($autore_data) {
            echo json_encode($autore_data, JSON_PRETTY_PRINT); // Restituisce l'autore come JSON
        } else {
            echo json_encode(["message" => "Autore non trovato"], JSON_PRETTY_PRINT); // Se non trovato
        }
    }

    public function createAuthors($id_autore, $nome, $cognome, $data_nascita){
       // crea un'istanza della classe Autore
       $autore = new Autore();
       //Creo il nuovo autore
       $autore->createAuthors($id_autore, $nome, $cognome, $data_nascita);
    }

}