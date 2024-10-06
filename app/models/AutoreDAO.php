<?php
require_once "../config/Database.php";
require_once "Autore.php";


class AutoreDAO
{
    private $db;
    public $id_autore;
    public $nome;
    public $cognome;
    public $data_nascita;

    public function __construct()
    {

        $this->db = Database::getInstance();
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
        $stmt->execute(["id_autore" => $id_autore]); // binding
        return $stmt->fetch(PDO::FETCH_ASSOC); // Restituisce il risultato come array associativo

    }

    // Metodo per creare un nuovo autore
    public function createAuthors($id_autore, $nome, $cognome, $data_nascita)
    {
        $stmt = $this->db->prepare("SELECT * FROM autore WHERE id_autore = :id_autore");
        $autore_esistente = $stmt->execute(["id_autore" => $id_autore]);

        if ($autore_esistente) {
            $stmt = $this->db->prepare("INSERT INTO autore (id_autore,nome,cognome,data_nascita) VALUES (:id_autore,:nome,:cognome,:data_nascita)");
            $stmt->execute(["id_autore" => $id_autore, "nome" => $nome, "cognome" => $cognome, "data_nascita" => $data_nascita]);
        }
    }

    // Metodo per aggiornare un autore esistente
    public function updateAuthors($id_autore, $nome, $cognome, $data_nascita)
    {
        // Aggiornamento dell'autore
        $stmt = $this->db->prepare("SELECT * FROM autore WHERE id_autore = :id_autore");
        $autore_esistente = $stmt->execute(["id_autore" => $id_autore]);

        if ($autore_esistente) {
            $stmt = $this->db->prepare("UPDATE autore SET nome = :nome, cognome = :cognome, data_nascita = :data_nascita WHERE id_autore = :id_autore");
            $stmt->execute([
                "id_autore" => $id_autore,
                "nome" => $nome,
                "cognome" => $cognome,
                "data_nascita" => $data_nascita
            ]);
        }
    }


    // Metodo per eliminare un utente
    public function deleteAuthors($id_autore)
    {
        // Rimozione dell'autore 
        $stmt = $this->db->prepare("SELECT * FROM autore WHERE id_autore = :id_autore");
        $autore_esistente = $stmt->execute(["id_autore" => $id_autore]);

        if ($autore_esistente) {
            $stmt = $this->db->prepare("DELETE FROM autore WHERE id_autore = :id_autore");
            $stmt->execute(["id_autore" => $id_autore]);
        }
    }
}
