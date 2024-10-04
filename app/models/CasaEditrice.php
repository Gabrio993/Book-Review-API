<?php

class CasaEditrice {

  // definizione delle proprietà
  public $id_casa_editrice;
  public $nome;
  public $anno_fondazione;
  public $paese;

  // metodo costruttore
  public function __construct($id_casa_editrice = null, $nome = null, $anno_fondazione = null, $paese = null)
  {

    $this->id_casa_editrice = $id_casa_editrice;
    $this->nome = $nome;
    $this->anno_fondazione = $anno_fondazione;
    $this->paese = $paese;
  }
}