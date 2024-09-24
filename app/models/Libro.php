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
    private $id_casa_editrice;

    // Costruttore per inizializzare l'oggetto libro con le sue proprietà
    public function __construct($id = null, $titolo = null, $id_autore = null, $annoPubblicazione = null, $genere = null, $isbn = null, $id_casa_editrice = null)
    {
        $this->db = Database::getInstance(); // Inizializza la connessione al database
        $this->id = $id;
        $this->titolo = $titolo;
        $this->id_autore = $id_autore;
        $this->annoPubblicazione = $annoPubblicazione;
        $this->genere = $genere;
        $this->isbn = $isbn;
        $this->id_casa_editrice = $id_casa_editrice;
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
            $this->id_casa_editrice = $libro['id_casa_editrice'];
        }

        return $libro;
    }

    // Metodo per recuperare i libri in base al genere
    public function findBooksByGenre($genere)
    {
        $stmt = $this->db->prepare("SELECT * FROM libro WHERE genere = :genere"); // Query per ottenere libri in base al genere
        $stmt->execute(["genere" => $genere]); // Binding del valore del genere
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisce i risultati come array associativo
    }

    // Metodo per creare un nuovo libro
    public function createBook($titolo, $id_autore, $annoPubblicazione, $genere, $isbn, $id_casa_editrice)
    {
        // Prepara la query per inserire un nuovo libro
        $stmt = $this->db->prepare("INSERT INTO libro (titolo, id_autore, anno_pubblicazione, genere, isbn, id_casa_editrice) VALUES (:titolo, :id_autore, :anno_pubblicazione, :genere, :isbn, :id_casa_editrice)");

        // Esegui la query passando i parametri
        $result = $stmt->execute([
            "titolo" => $titolo,
            "id_autore" => $id_autore,
            "anno_pubblicazione" => $annoPubblicazione,
            "genere" => $genere,
            "isbn" => $isbn,
            "id_casa_editrice" => $id_casa_editrice
        ]);

        // Verifica se l'inserimento è avvenuto con successo
        if ($result) {
            return $this->db->lastInsertId(); // Restituisce l'ID del nuovo libro creato
        } else {
            return false; // Inserimento fallito
        }
    }

    //Metodo per aggiornare un libro (PUT/libro/{id})
    public function updateBook($id, $titolo = null, $id_autore = null, $annoPubblicazione = null, $genere = null, $isbn = null, $id_casa_editrice = null)
    {
        // Prima, verifichiamo se il libro esiste
        $stmt = $this->db->prepare("SELECT * FROM libro WHERE id_libro = :id_libro");
        $stmt->execute(['id_libro' => $id]);
        $libro = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$libro) {
            // Se il libro non esiste, restituiamo false
            return false;
        }

        // Prepariamo i campi da aggiornare dinamicamente
        $fieldsToUpdate = [];
        $params = ['id_libro' => $id];

        if ($titolo !== null) {
            $fieldsToUpdate[] = "titolo = :titolo";
            $params['titolo'] = $titolo;
        }
        if ($id_autore !== null) {
            // Verifica se l'autore esiste prima di aggiornare
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM autore WHERE id_autore = :id_autore");
            $stmt->execute(['id_autore' => $id_autore]);
            $autoreEsiste = $stmt->fetchColumn(); // viene utilizzata per ottenere il primo valore della prima riga del risultato della query.

            //se il primo vlore della prima riga ottenuta dalla query = 0, vuol dire che non abbiamo trovato autori con quell'id
            if ($autoreEsiste == 0) {
                return false; // Non eseguiamo l'operazione
            }
            $fieldsToUpdate[] = "id_autore = :id_autore"; // array con i campi da aggiornare e nuberplaceholder per la preparazione alla query
            $params['id_autore'] = $id_autore; // Valore che verrà effettivamente passato alla query
        }
        if ($annoPubblicazione !== null) {
            $fieldsToUpdate[] = "anno_pubblicazione = :anno_pubblicazione";
            $params['anno_pubblicazione'] = $annoPubblicazione;
        }
        if ($genere !== null) {
            $fieldsToUpdate[] = "genere = :genere";
            $params['genere'] = $genere;
        }
        if ($isbn !== null) {
            $fieldsToUpdate[] = "isbn = :isbn";
            $params['isbn'] = $isbn;
        }
        if ($id_casa_editrice !== null) {
            $fieldsToUpdate[] = "id_casa_editrice = :id_casa_editrice";
            $params["id_casa_editrice"] = $id_casa_editrice;
        }

        // Se non ci sono campi da aggiornare, concludiamo l'operazione senza aggiornare
        if (empty($fieldsToUpdate)) {
            return false;
        }

        // Query sql finale
        // implode() unisce tutti gli elementi dell'array in una stringa e separando i valori da una virgola e un spazio
        // $fieldsToUpdate Ogni elemento di questo array è una stringa che indica quale colonna deve essere aggiornata e a quale valore deve essere impostata.
        $sql = "UPDATE libro SET " . implode(", ", $fieldsToUpdate) . " WHERE id_libro = :id_libro";
        $stmt = $this->db->prepare($sql);

        // Eseguiamo la query con i parametri aggiornati
        $result = $stmt->execute($params);

        return $result;
    }

    /* TODO: 

    - Metodo per cancellare un libro (DELETE/libro/{id})*/
}
