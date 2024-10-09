<?php

class LibroController
{
    // Metodo per elencare tutti i libri (GET /libro)
    public function getBooks()
    {
        $libro = new LibroDAO(); // Crei un'istanza della classe LibroDAO
        $libri = $libro->allBooks(); // Ottieni tutti i libri dal database
        echo json_encode($libri, JSON_PRETTY_PRINT); // Restituisci i risultati come JSON
    }

    // Metodo per trovare un libro tramite id (GET /libro/{id})
    public function showIdBook($id)
    {
        // Crei un'istanza della classe Libro
        $libro = new LibroDAO();
        // Cerchi il libro tramite id
        $libro_data = $libro->findIdBook($id);

        if ($libro_data) {
            echo json_encode($libro_data, JSON_PRETTY_PRINT); // Restituisci il libro come JSON
        } else {
            echo json_encode(["message" => "Libro non trovato"], JSON_PRETTY_PRINT); // Se non trovato
        }
    }

    // Metodo per recuperare i libri in base al genere
    public function showGenreBook($genere)
    {
        $libro = new LibroDAO();
        $libriPerGenere = $libro->findBooksByGenre($genere);


        if ($libriPerGenere) {
            echo json_encode($libriPerGenere, JSON_PRETTY_PRINT); // Restituisci i libri come JSON
        } else {
            echo json_encode(["message" => "Genere non trovato"], JSON_PRETTY_PRINT); // Se non trovato
        }
    }

    // Metodo per creare un nuovo libro
    public function create()
    {
        // Leggi il corpo della richiesta
        $data = json_decode(file_get_contents('php://input'), true);

        // Accedi ai dati decodificati
        $titolo = $data['titolo'] ?? null;
        $id_autore = $data['id_autore'] ?? null;
        $annoPubblicazione = $data['anno_pubblicazione'] ?? null;
        $genere = $data['genere'] ?? null;
        $isbn = $data['isbn'] ?? null;
        $id_casa_editrice = $data['id_casa_editrice'] ?? null;

        $libro = new LibroDAO();
        $nuovoLibro = $libro->createBook($titolo, $id_autore, $annoPubblicazione, $genere, $isbn, $id_casa_editrice);

        if ($nuovoLibro) {
            echo json_encode(["message" => "Libro creato con successo con ID: $nuovoLibro"], JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["message" => "Errore nella creazione del libro."], JSON_PRETTY_PRINT);
        }
    }


    //- Metodo per aggiornare un libro (PUT/libro/{id})
    public function update($id)
    {   // Otteniamo i dati JSON inviati dal client
        $data = json_decode(file_get_contents('php://input'), true);

        // Prepariamo i valori da passare al metodo updateBook, impostando a null quelli non forniti
        $titolo = $data['titolo'] ?? null;
        $id_autore = $data['id_autore'] ?? null;
        $annoPubblicazione = $data['anno_pubblicazione'] ?? null;
        $genere = $data['genere'] ?? null;
        $isbn = $data['isbn'] ?? null;
        $id_casa_editrice = $data['id_casa_editrice'] ?? null;

        // Chiama il metodo updateBook nel modello Libro
        $libro = new LibroDAO();
        $result = $libro->updateBook($id, $titolo, $id_autore, $annoPubblicazione, $genere, $isbn, $id_casa_editrice);

        if ($result) {
            echo json_encode(["message" => "Libro aggiornato con successo"], JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["message" => "Errore nell'aggiornamento del libro o nessun campo modificato"], JSON_PRETTY_PRINT);
        }
    }
    //Metodo per cancellare un libro (DELETE/libro/{id})
    public function deleteIdBook($id)
    {

        // Creo un istanza della classe LibroDAO
        $libro = new LibroDAO();
        // Chiamo il metodo deleteBook passando l'id
        $result = $libro->deleteBook($id);

        // Output
        if ($result) {
            json_encode(["message" => "Libro cancellato con successo"], JSON_PRETTY_PRINT);
        } else {
            json_encode(["message" => "Errore nella cancellazione del libro"], JSON_PRETTY_PRINT);
        }
    }

    // Metodo per passare i dati alla vista
    public function getBooksForView()
    {
        $libroDAO = new LibroDAO();
        $libri = $libroDAO->allBooks();
        header("Content-Type: text/html");
        require __DIR__ . '/../views/vista.php'; // il file vista
    }
}
