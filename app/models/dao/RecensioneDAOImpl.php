<?php

class RecensioneDAOImpl implements RecensioneDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllRecensioni() {
        $stmt = $this->db->query("SELECT * FROM recensione");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecensioneById($id) {
        $stmt = $this->db->prepare("SELECT * FROM recensione WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createRecensione($recensione) {
        // Validazione dei valori di input
        if (empty($recensione['commento'])) {
            throw new Exception("Il commento non può essere vuoto");
        }
        if (!is_int($recensione['valutazione']) || $recensione['valutazione'] < 1 || $recensione['valutazione'] > 5) {
            throw new Exception("La valutazione deve essere un intero compreso tra 1 e 5");
        }

        // Creazione della recensione
        $stmt = $this->db->prepare("INSERT INTO recensione (commento, valutazione, nome_utente, data_creazione) VALUES (:commento, :valutazione, :nomeUtente, :dataCreazione)");
        $stmt->execute([
            "commento" => $recensione['commento'],
            "valutazione" => $recensione['valutazione'],
            "nomeUtente" => $recensione['nome_utente'],
            "dataCreazione" => $recensione['data_creazione']
        ]);
    }

    public function updateRecensione($recensione) {
        // Validazione dei valori di input
        if (empty($recensione['commento'])) {
            throw new Exception("Il commento non può essere vuoto");
        }
        if (!is_int($recensione['valutazione']) || $recensione['valutazione'] < 1 || $recensione['valutazione'] > 5) {
            throw new Exception("La valutazione deve essere un intero compreso tra 1 e 5");
        }

        // Aggiornamento della recensione
        $stmt = $this->db->prepare("UPDATE recensione SET commento = :commento, valutazione = :valutazione, nome_utente = :nomeUtente, data_creazione = :dataCreazione WHERE id = :id");
        $stmt->execute([
            "id" => $recensione['id'],
            "commento" => $recensione['commento'],
            "valutazione" => $recensione['valutazione'],
            "nomeUtente" => $recensione['nome_utente'],
            "dataCreazione" => $recensione['data_creazione']
        ]);
    }

    public function deleteRecensione($id) {
        $stmt = $this->db->prepare("DELETE FROM recensione WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }
}
