<?php

class Libro
{
    // Proprietà del libro
    private $id;
    private $titolo;
    private $id_autore;
    private $annoPubblicazione;
    private $genere;
    private $isbn;
    private $id_casa_editrice;

    // Costruttore per inizializzare l'oggetto libro con le sue proprietà
    public function __construct($id, $titolo = null, $id_autore = null, $annoPubblicazione = null, $genere = null, $isbn = null, $id_casa_editrice = null)
    {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->id_autore = $id_autore;
        $this->annoPubblicazione = $annoPubblicazione;
        $this->genere = $genere;
        $this->isbn = $isbn;
        $this->id_casa_editrice = $id_casa_editrice;
    }
}
