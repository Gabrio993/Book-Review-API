<?php

class Utente
{
    // proprietà dell'utente
    private $db;
    private $id_utente;
    private $username;
    private $email;
    private $password;

    // costruttore per inizializzare l'oggetto utente con le sue proprietà
    public function __construct($id_utente = null, $username = null, $email = null, $password = null)
    {
        $this->db = Database::getInstance(); // Inizializza la connessione al database
        $this->id_utente = $id_utente;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // metodo per recuperare tutti gli utenti
    public function allUsers()
    {
        $stmt = $this->db->query("SELECT * FROM utente"); // query per ottenere tutti gli utenti
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisce i risultati come array associativo
    }

    // metodo per recuperare un utente tramite id
    public function getUserById($id_utente)
    {
        $stmt = $this->db->prepare("SELECT * FROM utente WHERE id_utente = :id_utente"); // Query per ottenere un utente tramite id
        $stmt->execute(["id_utente" => $id_utente]); // binding(=associare valore) del valore di id_utente
        $utente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utente) {
            // Se troviamo un utente, aggiorniamo le proprietà dell'oggetto
            $this->id_utente = $utente['id_utente'];
            $this->username = $utente['username'];
            $this->email = $utente['email'];
            $this->password = $utente['password'];
        }

        return $utente;
    }

    // Metodo per creare un nuovo utente (POST /utente)

    public function createUser($id_utente, $username, $email, $password){
      $stmt = $this->db->prepare("INSERT INTO utente (id_utente,username,email,password) VALUES (:id_utente,:username,:email,:password)");
      $stmt->execute(["id_utente" => $id_utente,"username" => $username,"email" => $email, "password" => $password]);
    }

    /* TODO: 
    - Metodo per trovare un libro tramite autore (GET/libro)
    

    - Metodo per aggiornare un libro (PUT/libro/{id})


    - Metodo per cancellare un libro (DELETE/libro/{id})*/
}