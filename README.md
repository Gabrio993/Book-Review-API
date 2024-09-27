# Aggiornamenti al Codice

## Versione 1.2

### Data di rilascio: 27/09/2024

### Descrizione degli aggiornamenti:

* Aggiunta di un file `README.md` per documentare le modifiche al codice.
* Aggiunta di un file `config.php` per la configurazione del database.
* Aggiunta di un file `index.php` per testare il funzionamento del codice.
* Aggiunta di validazione per i valori di input nelle funzioni `createRecensione` e `updateRecensione` per prevenire l'inserimento di dati non validi nel database.
* Aggiunta di un blocco `try-catch` per gestire eventuali eccezioni che possono verificarsi durante l'esecuzione delle funzioni.
* Miglioramento della leggibilità del codice tramite l'aggiunta di commenti e la formattazione del testo.

### Funzioni aggiornate:

* `createRecensione`: aggiunta di validazione per i valori di input e gestione di eccezioni.
* `updateRecensione`: aggiunta di validazione per i valori di input e gestione di eccezioni.

### File aggiunti:

* `config.php`: file di configurazione del database.
* `index.php`: file per testare il funzionamento del codice.
* `README.md`: file per documentare le modifiche al codice.


### Cronologia degli aggiornamenti:

* 20/09/2024: creazione del file `config.php` e del file `index.php`.
* 27/09/2024: aggiunta di validazione per i valori di input nelle funzioni `createRecensione` e `updateRecensione`.
* 27/09/2024: creazione del file `README.md` per documentare le modifiche al codice.
* 27/09/2024: aggiustata connessione al db
* 27/09/2024: aggiunto commento per aggiornare la recensione
* 27/09/2024: aggiunto db_book per Recensione
* 27/09/2024: creata connessione con DAO