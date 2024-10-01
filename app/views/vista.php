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

    <!-- Modale di Conferma per le varie operazioni dell'utente -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Conferma Operazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler procedere con questa operazione?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-danger" id="confirmButton">Conferma</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclusione script per javascript dinamico con Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Script principale dell'applicativo -->
    <script>
        // Funzione per caricare i libri nella tabella
        async function loadBooks() {
            try {
                const response = await fetch('/book-review-api/libri');
                if (!response.ok) throw new Error('Errore nel caricamento dei libri');
                const books = await response.json();
                const tableBody = document.querySelector("#bookTable tbody");
                tableBody.innerHTML = ""; // Svuota la tabella prima di popolarla 
                books.forEach(book => {
                    const row = `<tr>
                        <td>${book.id_libro}</td>
                        <td>${book.titolo}</td>
                        <td>${book.id_autore}</td>
                        <td>${book.anno_pubblicazione}</td>
                        <td>${book.genere}</td>
                        <td>${book.isbn}</td>
                        <td>${book.id_casa_editrice}</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteBook(${book.id_libro})">Elimina</button>
                            <button class="btn btn-warning" onclick="editBook(${book.id_libro})">Modifica</button>
                        </td>
                    </tr>`;
                    tableBody.innerHTML += row;
                });
            } catch (error) {
                console.error(error);
                alert('Si è verificato un errore: ' + error.message);
            }
        }

        // Creazione di un nuovo libro
        document.getElementById("createBookForm").addEventListener("submit", async function(event) {
            event.preventDefault();
            const formData = new FormData(this); //formData è un oggetto built in di js che consente di costruire un insieme di coppie chiave/valore che rappresentano i dati di un form
            const data = Object.fromEntries(formData.entries()); // formData.entries(): Questo metodo restituisce un iteratore che contiene tutte le coppie chiave/valore nell'oggetto FormData. Ogni elemento dell'iteratore è una coppia [chiave, valore].
            // Object.fromEntries(): Questo metodo, converte l'iteratore restituito da formData.entries() in un oggetto JavaScript.

            // Mostra la modale di conferma per la creazione
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();

            // Aggiungi un listener al pulsante di conferma
            document.getElementById('confirmButton').onclick = async function() {
                try {
                    const response = await fetch('/book-review-api-prove/libri', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });
                    if (!response.ok) throw new Error('Errore durante la creazione del libro');

                    this.reset(); // Resetta il form
                    loadBooks(); // Ricarica i libri
                    confirmModal.hide(); // Nascondi la modale
                } catch (error) {
                    console.error(error);
                    alert('Si è verificato un errore: ' + error.message);
                }
            }.bind(this); // Bind del contesto di this riferito al modulo
        });

        // Eliminazione di un libro
        let bookIdToDelete = null; // Variabile per tenere traccia dell'ID del libro da eliminare

        async function deleteBook(id) {
            bookIdToDelete = id; // Memorizza l'ID del libro da eliminare
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show(); // Mostra la modale di conferma
        }