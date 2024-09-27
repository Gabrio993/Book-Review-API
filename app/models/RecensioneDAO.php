<?php

include_once "Recensione.php";
include_once "../config/Database.php";

class RecensioneDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
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
        $stmt = $this->db->prepare("SELECT * FROM recensione WHERE id_recensione = :id");
        $stmt->execute(["id" => $id]);

        $recensione = $stmt->fetch(PDO::FETCH_OBJ);

        if ($recensione) {
            return $recensione;
        }

        return null;
    }


    // Metodo per creare una nuova recensione
    // Metodo per creare una nuova recensione
public function createRecensione($valutazione, $nomeUtente, $dataCreazione)
{
    // Validazione dei valori di input
    if (!is_int($valutazione) || $valutazione < 1 || $valutazione > 5) {
        throw new Exception("La valutazione deve essere un intero compreso tra 1 e 5");
    }

    // Creazione della recensione
    $stmt = $this->db->prepare("INSERT INTO recensione (valutazione, nome_utente, data_creazione) VALUES (:valutazione, :nomeUtente, :dataCreazione)");
    $stmt->execute([
        "valutazione" => $valutazione,
        "nomeUtente" => $nomeUtente,
        "dataCreazione" => $dataCreazione
    ]);
}




  // Metodo per aggiornare una recensione
  public function updateRecensione($id, $recensione, $valutazione, $nomeUtente, $dataCreazione)
  {
      // Validazione dei valori di input
      if (empty($recensione)) {
          throw new Exception("La recensione non può essere vuota");
      }
      if (!is_int($valutazione) || $valutazione < 1 || $valutazione > 5) {
          throw new Exception("La valutazione deve essere un intero compreso tra 1 e 5");
      }
  
      // Aggiornamento della recensione
      $stmt = $this->db->prepare("UPDATE recensione SET recensione = :recensione, valutazione = :valutazione, nome_utente = :nomeUtente, data_creazione = :dataCreazione WHERE id_recensione = :id");
      $stmt->execute([
          "id" => $id,
          "recensione" => $recensione,
          "valutazione" => $valutazione,
          "nomeUtente" => $nomeUtente,
          "dataCreazione" => $dataCreazione
      ]);
  }


   // Metodo per cancellare una recensione
public function deleteRecensione($id)
{
    $stmt = $this->db->prepare("DELETE FROM recensione WHERE id_recensione = :id");
    $stmt->execute(["id" => $id]);
}

}