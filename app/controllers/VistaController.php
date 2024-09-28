<?php

class VistaController
{
    // Metodo per visualizzare la pagina 'vista.php'
    public function showVista()
    {
        // Includi la vista. Assicurati che il percorso sia corretto
        require __DIR__ . '/../views/vista.php';
    }
}
