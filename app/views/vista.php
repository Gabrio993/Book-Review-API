<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Libri</title>
    <!-- Aggiungi Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container my-4">
    <h1 class="text-center mb-4">Gestione Libri</h1>

    <!-- Sezione per la creazione di un nuovo libro -->
    <h2 class="mb-3">Crea un nuovo libro</h2>
    <form id="createBookForm">
        <div class="row">
            <div class="col">
                <label class="form-label" for="titolo">Titolo:</label>
                <input class="form-control" type="text" id="titolo" name="titolo" required>
            </div>
            <div class="col">
                <label class="form-label" for="id_autore">Autore ID:</label>
                <input class="form-control" type="number" id="id_autore" name="id_autore" required>
            </div>
            <div class="col">
                <label class="form-label" for="anno_pubblicazione">Anno Pubblicazione:</label>
                <input class="form-control" type="number" id="anno_pubblicazione" name="anno_pubblicazione" required>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <label for="genere">Genere:</label>
                <input class="form-control" type="text" id="genere" name="genere" required>
            </div>
            <div class="col">
                <label class="form-label" for="isbn">ISBN:</label>
                <input class="form-control" type="text" id="isbn" name="isbn" required>
            </div>
            <div class="col">
                <label class="form-label" for="id_casa_editrice">Casa Editrice ID:</label>
                <input class="form-control" type="number" id="id_casa_editrice" name="id_casa_editrice" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col text-center">
                <button class="mt-4 btn btn-primary" type="submit">Crea Libro</button>
            </div>
        </div>

    </form>

    <h2 class="mb-3">Lista Libri</h2>
    <table id="bookTable" class="table table-bordered border-primary table-hover">
        <thead class="table-info table-bordered border-primary">
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Anno</th>
                <th>Genere</th>
                <th>ISBN</th>
                <th>Casa Editrice</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <!-- I libri verranno popolati qui tramite JavaScript -->
        </tbody>
    </table>

    <h2 class="mb-3">Aggiorna un libro</h2>
    <!-- Sezione per l'aggiornamento di un libro-->
    <form id="updateBookForm" style="display:none;">
        <!-- Input invisibile all'utente ma necessario poi per la richiesta di aggiornamento al server
         javascript riempira dinamicamente l'id del libro associato alla modifica. Quando il form viene iviato, il valore di questo campo
         viene incluso nella richiesta di aggiornamento. (interfaccia più pulita per l'utente)-->
        <input type="hidden" id="updateBookId" name="id_libro">
        <div class="row">
            <div class="col">
                <label class="form-label" for="updateTitolo">Titolo</label>
                <input class="form-control" type="text" id="updateTitolo" name="titolo" required>
            </div>
            <div class="col">
                <label class="form-label" for="updateAutore">Autore ID:</label>
                <input class="form-control" type="number" id="updateAutore" name="id_autore" required>
            </div>
            <div class="col">
                <label class="form-label" for="updateAnno">Anno Pubblicazione:</label>
                <input class="form-control" type="number" id="updateAnno" name="anno_pubblicazione" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="updateGenere">Genere:</label>
                <input class="form-control" type="text" id="updateGenere" name="genere" required>
            </div>
            <div class="col">
                <label class="form-label" for="updateIsbn">ISBN:</label>
                <input class="form-control" type="text" id="updateIsbn" name="isbn" required>
            </div>
            <div class="col">
                <label class="form-label" for="updateCasaEditrice">Casa Editrice ID:</label>
                <input class="form-control" type="number" id="updateCasaEditrice" name="id_casa_editrice" required>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <button class="mt-4 btn btn-primary" type="submit">Aggiorna Libro</button>
            </div>
        </div>
    </form>