<?php

class VistaController
{
    // Metodo per visualizzare la pagina 'vista.php'
    public function showBooksView()
    {
        // Includi il controller dei libri per ottenere i dati
        $libroController = new LibroController();
        $libroController->getBooksForView(); // Carica i dati nella vista
    }
}
