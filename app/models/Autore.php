<?php

class Autore
{

    public $id_autore;
    public $nome;
    public $cognome;
    public $data_nascita;

    //Construct function 
    public function __construct($id_autore = null, $nome = null, $cognome = null, $data_nascita = null)
    {

        $this->id_autore = $id_autore;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->data_nascita = $data_nascita;
    }
}
