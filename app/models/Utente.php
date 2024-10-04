<?php

class Utente
{
    // Proprietà dell'utente
    private $db;
    private $id_utente;
    private $username;
    private $email;
    private $password;

    // Costruttore per inizializzare l'oggetto utente con le sue proprietà
    public function __construct($id_utente = null, $username = null, $email = null, $password = null)
    {
        $this->db = Database::getInstance(); // Inizializza la connessione al database
        $this->id_utente = $id_utente;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /*Le proprietà sono dichiarate come private, il che significa che possono essere accessibili solo all'interno della classe. 
    I metodi getter e setter consentono di accedere e modificare questi valori in modo controllato.*/

    // Getter per id_utente
    public function getIdUtente()
    {
        return $this->id_utente;
    }

    // Setter per id_utente
    public function setIdUtente($id_utente)
    {
        $this->id_utente = $id_utente;
    }

    // Getter per username
    public function getUsername()
    {
        return $this->username;
    }

    // Setter per username
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // Getter per email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter per email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter per password
    public function getPassword()
    {
        return $this->password;
    }

    // Setter per password
    public function setPassword($password)
    {
        $this->password = $password;
    }
}

