<?php
include_once '../models/CasaEditriceDAO.php';

class CasaEditriceController
{
  private $casaEditriceDAO;

  public function __construct()
  {
    $this->casaEditriceDAO = new CasaEditriceDAO();
  }

  // metodo per ottenere tutte le case editrici
  public function getAllCaseEditrici()
  {
    $caseEditrici = $this->casaEditriceDAO->getAllCaseEditrici();
    return $caseEditrici;
  }

  // metodo per ottenere una casa editrice
  public function getCasaEditriceById($id_casa_editrice)
  {
    $casaEditrice = $this->casaEditriceDAO->getCasaEditriceById($id_casa_editrice);
    return $casaEditrice;
  }

  // metodo per creare una nuova casa editrice
  public function createCasaEditrice($nome, $anno_fondazione, $paese)
  {
    if (!empty($nome) && !empty($anno_fondazione) && !empty($paese)) {
      $id_casa_editrice = $this->casaEditriceDAO->createCasaEditrice(null, $nome, $anno_fondazione, $paese);
      if ($id_casa_editrice)
        return ["message" => "Casa editrice creata con successo", "id" => $id_casa_editrice];
      else
        return ["message" => "Errore nella creazione della casa editrice"];
    } else
      return ["message" => "Dati mancanti per la creazione della casa editrice"];

  }

  // metodo per aggiornare una casa editrice
  public function updateCasaEditrice($id_casa_editrice, $nome = null, $anno_fondazione = null, $paese = null)
  {
    if (!empty($id_casa_editrice)) {
      $result = $this->casaEditriceDAO->updateCasaEditrice($id_casa_editrice, $nome, $anno_fondazione, $paese);
      if ($result)
        return ["message" => "Casa editrice aggiornata con successo"];
      else
        return ["message" => "Errore nell'aggiornamento della casa editrice"];
    } else
      return ["message" => "ID mancante per l'aggiornamento"];
  }

  // metodo per eliminare una casa editrice
  public function deleteCasaEditrice($id_casa_editrice)
  {
    if (!empty($id_casa_editrice)) {
      $result = $this->casaEditriceDAO->deleteCasaEditrice($id_casa_editrice);
      if ($result)
        return ["message" => "Casa editrice cancellata con successo"];
      else
        return ["message" => "Errore nella cancellazione della casa editrice"];
    } else
      return ["message" => "ID mancante per la cancellazione"];
  }
}