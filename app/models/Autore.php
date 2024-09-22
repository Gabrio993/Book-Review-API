

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
}





?>