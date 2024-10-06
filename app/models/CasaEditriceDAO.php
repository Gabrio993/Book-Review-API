<?php

include_once '../config/Database.php';
include_once 'CasaEditrice.php';

class CasaEditriceDAO {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // metodo per recuperare tutte le case editrici
    public function getAllCaseEditrici(){

        $stmt = $this->db->query("SELECT * FROM casa_editrice"); //query per ottenere tutte le case editrici
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //restituisce i risultati in un array associativo
    }

    // metodo per recuperare una casa editrice tramite id
    public function getCasaEditriceById($id_casa_editrice){

      $stmt = $this->db->prepare("SELECT * FROM casa_editrice WHERE id_casa_editrice = :id_casa_editrice"); //query per ottenere una casa     editrice tramite il suo id
      $stmt->execute(["id_casa_editrice" => $id_casa_editrice]);
      $casa_editrice = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($casa_editrice) {
        // se troviamo una casa editrice, aggiorniamo le proprietà dell'oggetto
        $this->id_casa_editrice = $casa_editrice['id_casa_editrice'];
        $this->nome = $casa_editrice['nome'];
        $this->anno_fondazione = $casa_editrice['anno_fondazione'];
        $this->paese = $casa_editrice['paese'];
      }

      return $casa_editrice;
    }

    // metodo per creare una nuova casa editrice
    public function createCasaEditrice($nome, $anno_fondazione, $paese){
      
      // preparazione della query per inserire una nuova casa editrice
      $stmt = $this->db->prepare("INSERT INTO casa_editrice (nome, anno_fondazione, paese) VALUES (:nome, :anno_fondazione, :paese)");

      // esecuzione della query passando i parametri
      $result = $stmt->execute([
        "nome" => $nome,
        "anno_fondazione" => $anno_fondazione,
        "paese" => $paese
      ]);

      // controllo se l'inserimento è avvenuto con successo
      if ($result) {
        return $this->db->lastInsertId(); // restituisce l'ID della nuova casa editrice
      } else {
        return false; // inserimento non avvenuto con successo
      }
    }

  // metodo per aggiornare una casa editrice
  public function updateCasaEditrice($id_casa_editrice, $nome = null, $anno_fondazione = null, $paese = null)
  {
    //  array di campi scelti per la modifica
    $fields = [];
    $params = ["id_casa_editrice" => $id_casa_editrice];

    if ($nome !== null) {
      $fields[] = "nome = :nome";
      $params['nome'] = $nome;
    }

    if ($anno_fondazione !== null) {
      $fields[] = "anno_fondazione = :anno_fondazione";
      $params['anno_fondazione'] = $anno_fondazione;
    }

    if ($paese !== null) {
      $fields[] = "paese = :paese";
      $params['paese'] = $paese;
    }

    //  nessun campo da aggiornare
    if (empty($fields)) {
      return false;
    }

    // preparazione query
    $query = "UPDATE casa_editrice SET " . implode(', ', $fields) . " WHERE id_casa_editrice = :id_casa_editrice";
    $stmt = $this->db->prepare($query);

    // esecuzione query
    $result = $stmt->execute($params);

    return $result;
  }

  // metodo per cancellare una casa editrice
  public function deleteCasaEditrice($id_casa_editrice) {
    // preparazione query
    $stmt = $this->db->prepare("DELETE FROM casa_editrice WHERE id_casa_editrice = :id_casa_editrice");

    // esecuzione query
    $result = $stmt->execute(["id_casa_editrice" => $id_casa_editrice]);

    return $result;
  }
}