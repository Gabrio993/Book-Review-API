<?php

class RecensioneController
{
    // Metodo per elencare tutte le recensioni (GET /recensione)
    public function getAllRecensioni()
    {
        $recensione = new Recensione();
        $recensioni = $recensione->allRecensioni();
        echo json_encode($recensioni, JSON_PRETTY_PRINT);
    }

    // Metodo per trovare una recensione tramite id (GET /recensione/{id})
    public function getRecensioneById($id)
    {
        $recensione = new Recensione();
        $recensione_data = $recensione->getRecensioneById($id);

        if ($recensione_data) {
            echo json_encode($recensione_data, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["message" => "Recensione non trovata"], JSON_PRETTY_PRINT);
        }
    }

    // Metodo per creare una nuova recensione (POST /recensione)
    public function createRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        $recensione = new Recensione();
        $recensione->createRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione);
        echo json_encode(["message" => "Recensione creata con successo"], JSON_PRETTY_PRINT);
    }

    // Metodo per aggiornare una recensione (PUT /recensione/{id})
    public function updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        $recensione = new Recensione();
        $recensione->updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione);
        echo json_encode(["message" => "Recensione aggiornata con successo"], JSON_PRETTY_PRINT);
    }

    // Metodo per cancellare una recensione (DELETE /recensione/{id})
    public function deleteRecensione($id)
    {
        $recensione = new Recensione();
        $recensione->deleteRecensione($id);
        echo json_encode(["message" => "Recensione cancellata con successo"], JSON_PRETTY_PRINT);
    }
}
