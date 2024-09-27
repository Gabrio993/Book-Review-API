[StartOfDocument app/models/Recensione.php]
[CursorSurroundingLines]
<?php

class Recensione
{
    public $db;
    public $id;
    public $commento;
    public $valutazione;
    public $nomeUtente;
    public $dataCreazione;

    // Costruttore per inizializzare l'oggetto Recensione e la connessione al DB
    public function __construct($id = null, $commento = null, $valutazione = null, $nomeUtente = null, $dataCreazione = null)
    {
        $this->db = Database::getInstance();
        $this->id = $id;
        $this->commento = $commento;
        $this->valutazione = $valutazione;
        $this->nomeUtente = $nomeUtente;
        $this->dataCreazione = $dataCreazione;
    }

    // Metodo per recuperare tutte le recensioni
    public function allRecensioni()
    {
        $stmt = $this->db->query("SELECT * FROM recensione");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo per recuperare una recensione tramite ID
    public function getRecensioneById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM recensione WHERE id = :id");
        $stmt->execute(["id" => $id]);
        $recensione = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recensione) {
            $this->id = $recensione['id'];
            $this->commento = $recensione['commento'];
            $this->valutazione = $recensione['valutazione'];
            $this->nomeUtente = $recensione['nome_utente'];
            $this->dataCreazione = $recensione['data_creazione'];
        }

        return $recensione;
    }

    // Metodo per creare una nuova recensione
    public function createRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        // Validazione dei valori di input
        if (empty($commento)) {
            throw new Exception("Il commento non può essere vuoto");
        }
        if (!is_int($valutazione) || $valutazione < 1 || $valutazione > 5) {
            throw new Exception("La valutazione deve essere un intero compreso tra 1 e 5");
        }

        // Creazione della recensione
        $stmt = $this->db->prepare("INSERT INTO recensione (id, commento, valutazione, nome_utente, data_creazione) VALUES (:id, :commento, :valutazione, :nomeUtente, :dataCreazione)");
        $stmt->execute([
            "id" => $id,
            "commento" => $commento,
            "valutazione" => $valutazione,
            "nomeUtente" => $nomeUtente,
            "dataCreazione" => $dataCreazione
        ]);
    }

    // Metodo per aggiornare una recensione
    public function updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        // Validazione dei valori di input
        if (empty($commento)) {
            throw new Exception("Il commento non può essere vuoto");
        }
        if (!is_int($valutazione) || $valutazione < 1 || $valutazione > 5) {
            throw new Exception("La valutazione deve essere un intero compreso tra 1 e 5");
        }

        // Aggiornamento della recensione
        $stmt = $this->db->prepare("UPDATE recensione SET commento = :commento, valutazione = :valutazione, nome_utente = :nomeUtente, data_creazione = :dataCreazione WHERE id = :id");
        $stmt->execute([
            "id" => $id,
            "commento" => $commento,
            "valutazione" => $valutazione,
            "nomeUtente" => $nomeUtente,
            "dataCreazione" => $dataCreazione
        ]);
    }

    // Metodo per cancellare una recensione
    public function deleteRecensione($id)
    {
        $stmt = $this->db->prepare("DELETE FROM recensione WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }

    // Getter e Setter
    public function getId()
    {
        return $this->id;
    }

    public function getCommento()
    {
        return $this->commento;
    }

    public function getValutazione()
    {
        return $this->valutazione;
    }

    public function getNomeUtente()
    {
        return $this->nomeUtente;
    }

    public function getDataCreazione()
    {
        return $this->dataCreazione;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCommento($commento)
    {
        $this->commento = $commento;
    }

    public function setValutazione($valutazione)
    {
        $this->valutazione = $valutazione;
    }

    public function setNomeUtente($nomeUtente)
    {
        $this->nomeUtente = $nomeUtente;
    }

    public function setDataCreazione($dataCreazione)
    {
        $this->dataCreazione = $dataCreazione;
    }
}