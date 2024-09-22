<?php 
/*
Author: Francesco Labate
Scope: Creation of the author class
*/

class Autore {
    public int $id_autore; 
    public string $nome; 
    public string $cognome; 
    public string $data_nascita; 

    //Construct function 
    public function __construct($id_autore,$nome,$cognome,$data_nascita)
    {
        $this->id_autore = $id_autore;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->data_nascita = $data_nascita;
    }


    //Methods of the class author (getters)
    public function getId_autore(){ 
        return $this->id_autore; 
    }

    public function getNome() {
        return $this->nome; 
    }
    
    public function getCognome() {
        return $this->cognome; 
    }

    public function getData_nascita(){ 
        return $this->data_nascita; 
    }    


    //methods setters 
    public function setId_autore($id_autore)
    {
        $this->id_autore = $id_autore;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome
    }

    public function setData_nascita($data_nascita)
    {
        $this->data_nascita = $data_nascita;
    }

}



?>