# Book-Review-API

Sviluppo di una web API per un servizio di recensioni di libri.

## Descrizione del progetto

Questo progetto è una web API per un servizio di recensioni di libri. L'obiettivo è fornire agli utenti la possibilità di creare,  
visualizzare, aggiornare e cancellare recensioni sui libri. Il design dell'API segue il pattern architetturale **MVC (Model-View-Controller)**,  
che garantisce scalabilità e manutenibilità, facilitando l'evoluzione del progetto nel tempo.

## Documentazione

1. Per ulteriori dettagli sull'utilizzo dell'API, è possibile consultare la documentazione **Swagger**:  
    [Documentazione Swagger](http://localhost/book-review-api/swagger-ui/dist/index.html)

2. [Interfaccia Utente per operazioni crud](http://localhost/book-review-api/)

3. Per tutti gli altri endpoint guardare il file `/book-review-api/app/router.php` oppure la documentazione swagger al link superiore.

4. All'interno della cartella `book-review-api/migration/db_finale/book_db.sql`, è presente il database allo stadio finale da poter  
     scaricare per la verifica   ed il funzionamento dell' applicativo. 

5. In `book-review-api/.htaccess` é presente la seguente regola: all'url `localhost/book-review-api/` (con presenza o meno dello slash finale),  
    l'utente viene automaticamnete reindirizzato all'url `localhost/book-review-api/vista.php`