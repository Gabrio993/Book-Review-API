<?php

class Libro
{
    // Proprietà del libro
    private $db;
    private $id;
    private $titolo;
    private $id_autore;
    private $annoPubblicazione;
    private $genere;
    private $isbn;

    // Costruttore per inizializzare l'oggetto libro con le sue proprietà
    public function __construct($id = null, $titolo = null, $id_autore = null, $annoPubblicazione = null, $genere = null, $isbn = null)
    {
        $this->db = Database::getInstance(); // Inizializza la connessione al database
        $this->id = $id;
        $this->titolo = $titolo;
        $this->id_autore = $id_autore;
        $this->annoPubblicazione = $annoPubblicazione;
        $this->genere = $genere;
        $this->isbn = $isbn;
    }

    // Metodo per recuperare tutti i libri
    public function allBooks()
    {
        $stmt = $this->db->query("SELECT * FROM libro"); // Query per ottenere tutti i libri
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisce i risultati come array associativo
    }

    // Metodo per recuperare un libro tramite id
    public function findIdBook($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM libro WHERE id_libro = :id_libro"); // Query per ottenere un libro tramite id
        $stmt->execute(["id_libro" => $id]); // Binding del valore di id_libro
        $libro = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($libro) {
            // Se troviamo un libro, aggiorniamo le proprietà dell'oggetto
            $this->id = $libro['id_libro'];
            $this->titolo = $libro['titolo'];
            $this->id_autore = $libro['id_autore'];
            $this->annoPubblicazione = $libro['anno_pubblicazione'];
            $this->genere = $libro['genere'];
            $this->isbn = $libro['isbn'];
        }

        return $libro;
    }

    /* TODO: 
    - Metodo per trovare un libro tramite autore (GET/libro)
    
    
    - Metodo per creare un nuovo libro (POST/libro)


    - Metodo per aggiornare un libro (PUT/libro/{id})


    - Metodo per cancellare un libro (DELETE/libro/{id})*/
}
