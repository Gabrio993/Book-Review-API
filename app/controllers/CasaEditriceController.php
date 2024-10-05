<?php

class CasaEditriceController
{
  public function getAllCaseEditrici()
  {
    $casaEditrice = new CasaEditriceDAO();
    $caseEditrici = $casaEditrice->getAllCaseEditrici();
    echo json_encode($caseEditrici, JSON_PRETTY_PRINT);
  }

  public function getCasaEditriceById($id_casa_editrice)
  {
    $casaEditrice = new CasaEditriceDAO();
    $casaEditriceId = $casaEditrice->getCasaEditriceById($id_casa_editrice);

    if($casaEditriceId)
      echo json_encode($casaEditriceId, JSON_PRETTY_PRINT);
    else
      echo json_encode(["message" => "Casa editrice non trovata"], JSON_PRETTY_PRINT);
  }

  public function createCasaEditrice($nome, $anno_fondazione, $paese)
  {
    $casaEditrice = new CasaEditriceDAO();
    $casaEditrice->createCasaEditrice($nome, $anno_fondazione, $paese);

    if($casaEditrice)
      echo json_encode(["message" => "Casa editrice inserita correttamente"], JSON_PRETTY_PRINT);
    else
      echo json_encode(["message" => "Casa editrice non è stata inserita correttamente"], JSON_PRETTY_PRINT);
  }
}