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

    public function createAuthors($id_autore, $nome, $cognome, $data_nascita){
        //conversione della data nel formato corretto
        $data = strtotime($data_nascita);
        $new_data_nascita = date("Y-m-d",$data);
       // crea un'istanza della classe Autore
       $autore = new AutoreDAO();
       //Creo il nuovo autore
       $autore->createAuthors($id_autore, $nome, $cognome, $new_data_nascita);


    }

    public function deleteAuthors($id_autore) {
        // crea un'istanza della classe Autore
        $autore = new AutoreDAO(); 
        // Elimino l'autore dato l'Id
        $autore->deleteAuthors($id_autore);

    }

    public function updateAuthors($id_autore, $nome, $cognome, $data_nascita) {
        $autore = new AutoreDAO(); 
        $autore->updateAuthors($id_autore, $nome, $cognome, $data_nascita);
    }
      

}