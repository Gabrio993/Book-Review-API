<?php 
/*
Author: Francesco Labate
Scope: Creation of the author class
*/

class Autore {
    public $db; 
    public $id_autore; 
    public $nome; 
    public $cognome; 
    public $data_nascita; 

    //Construct function 
    public function __construct($id_autore=null,$nome=null,$cognome=null,$data_nascita=null)
    {
        $this->db = Database::getInstance(); // Inizializza la connessione al database
        $this->id_autore = $id_autore;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->data_nascita = $data_nascita;
    }


        // metodo per recuperare tutti gli utenti
        public function allAuthors()
        {
            $stmt = $this->db->query("SELECT * FROM autore"); // query per ottenere tutti gli utenti
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisce i risultati come array associativo
        }
    
        // metodo per recuperare un autore tramite id
        public function getAuthorsById($id_autore)
        {
            $stmt = $this->db->prepare("SELECT * FROM autore WHERE id_autore = :id_autore"); // Query per ottenere un autore tramite id
            $stmt->execute(["id_autore" => $id_autore]); // binding(=associare valore) del valore di id_autore
            $autore = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($autore) {
                // Se troviamo un autore, aggiorniamo le proprietà dell'oggetto
                $this->id_autore = $autore['id_autore'];
                $this->nome = $autore['nome'];
                $this->cognome = $autore['cognome'];
                $this->data_nascita = $autore['data_nascita'];
            }
    
            return $autore;
        }
    
        // Metodo per creare un nuovo autore (POST /autore)
        public function createAuthors($id_autore, $nome, $cognome, $data_nascita){
          $stmt = $this->db->prepare("INSERT INTO autore (id_autore,nome,cognome,data_nascita) VALUES (:id_autore,:nome,:cognome,:data_nascita)");
          $stmt->execute(["id_autore" => $id_autore,"nome" => $nome,"cognome" => $cognome, "data_nascita" => $data_nascita]);
        }

}



?>