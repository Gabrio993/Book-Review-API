<?php

class RecensioneController
{
    private $recensione;

    public function __construct() {
        $this->recensione = new Recensione();
    }

    // Metodo per elencare tutte le recensioni (GET /recensione)
    public function getAllRecensioni()
    {
        $recensioni = $this->recensione->allRecensioni();
        echo json_encode($recensioni, JSON_PRETTY_PRINT);
    }

    // Metodo per trovare una recensione tramite id (GET /recensione/{id})
    public function getRecensioneById($id)
    {
        $recensione_data = $this->recensione->getRecensioneById($id);

        if ($recensione_data) {
            echo json_encode($recensione_data, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["message" => "Recensione non trovata"], JSON_PRETTY_PRINT);
        }
    }

    // Metodo per creare una nuova recensione (POST /recensione)
    public function createRecensione($commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        $this->recensione->createRecensione($commento, $valutazione, $nomeUtente, $dataCreazione);
        echo json_encode(["message" => "Recensione creata con successo"], JSON_PRETTY_PRINT);
    }

    // Metodo per aggiornare una recensione (PUT /recensione/{id})
    public function updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        $this->recensione->updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione);
        echo json_encode(["message" => "Recensione aggiornata con successo"], JSON_PRETTY_PRINT);
    }

    // Metodo per cancellare una recensione (DELETE /recensione/{id})
    public function deleteRecensione($id)
    {
        $this->recensione->deleteRecensione($id);
        echo json_encode(["message" => "Recensione cancellata con successo"], JSON_PRETTY_PRINT);
    }
}
