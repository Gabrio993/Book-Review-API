<?php

class RecensioneController
{
    // Metodo per elencare tutte le recensioni (GET /recensione)
    public function getAllRecensioni()
    {
        $recensione = new RecensioneDAO();
        $recensioni = $recensione->allRecensioni();
        echo json_encode($recensioni, JSON_PRETTY_PRINT);
    }

    // Metodo per trovare una recensione tramite id (GET /recensione/{id})
    public function getRecensioneById($id)
    {
        $recensione = new RecensioneDAO();
        $recensione_data = $recensione->getRecensioneById($id);

        if (empty($recensione_data)) {
            http_response_code(404);
            echo json_encode(["message" => "Recensione non trovata"], JSON_PRETTY_PRINT);
        } else {
            http_response_code(200);
            echo json_encode($recensione_data, JSON_PRETTY_PRINT);
        }
    }


    // Metodo per creare una nuova recensione (POST /recensione)
    public function createRecensione($valutazione, $nomeUtente, $dataCreazione)
    {
        $recensione = new RecensioneDAO();
        $recensione->createRecensione($valutazione, $nomeUtente, $dataCreazione);
        echo json_encode(["message" => "Recensione creata con successo"], JSON_PRETTY_PRINT);
    }



    // Metodo per aggiornare una recensione (PUT /recensione/{id})
    public function updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        $recensione = new RecensioneDAO();
        $recensione->updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione);
        echo json_encode(["message" => "Recensione aggiornata con successo"], JSON_PRETTY_PRINT);
    }

    // Metodo per cancellare una recensione (DELETE /recensione/{id})
    public function deleteRecensione($id)
    {
        $recensioneDAO = new RecensioneDAO();
        try {
            $recensioneDAO->deleteRecensione($id);
            echo json_encode(["message" => "Recensione cancellata con successo"], JSON_PRETTY_PRINT);
        } catch (Exception $e) {
            http_response_code(404);
            echo json_encode(["message" => "Errore durante la cancellazione della recensione: " . $e->getMessage()], JSON_PRETTY_PRINT);
        }
    }
}
