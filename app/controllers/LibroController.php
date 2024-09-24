<?php

class LibroController
{
    // Metodo per elencare tutti i libri (GET /libro)
    public function getBooks()
    {
        $libro = new Libro(); // Crei un'istanza della classe Libro
        $libri = $libro->allBooks(); // Ottieni tutti i libri dal database
        echo json_encode($libri, JSON_PRETTY_PRINT); // Restituisci i risultati come JSON
    }

    // Metodo per trovare un libro tramite id (GET /libro/{id})
    public function showIdBook($id)
    {
        // Crei un'istanza della classe Libro
        $libro = new Libro();
        // Cerchi il libro tramite id e popoli le proprietà dell'oggetto
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
        $libro = new Libro();
        $libriPerGenere = $libro->findBooksByGenre($genere);


        if ($libriPerGenere) {
            echo json_encode($libriPerGenere, JSON_PRETTY_PRINT); // Restituisci i libri come JSON
        } else {
            echo json_encode(["message" => "Genere non trovato"], JSON_PRETTY_PRINT); // Se non trovato
        }
    }

    // Metodo per creare un nuovo libro
    public function create($titolo, $id_autore, $annoPubblicazione, $genere, $isbn, $id_casa_editrice)
    {
        $libro = new Libro();
        $nuovoLibro = $libro->createBook($titolo, $id_autore, $annoPubblicazione, $genere, $isbn, $id_casa_editrice);

        if ($nuovoLibro) {
            echo "Libro creato con successo con ID: $nuovoLibro ";
        } else {
            echo "Errore nella creazione del libro.";
        }
    }

    /* TODO: 
    - Metodo per trovare un libro tramite autore (GET/libro)
    
    
    - Metodo per creare un nuovo libro (POST/libro)


    - Metodo per aggiornare un libro (PUT/libro/{id})


    - Metodo per cancellare un libro (DELETE/libro/{id})*/
}
