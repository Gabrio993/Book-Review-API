<?php

class UtenteController
{
  // metodo per elencare tutti gli utenti (GET /utente)
  public function getAllUsers()
  {
    $utente = new UtenteDAO(); // crea un'istanza della classe Utente
    $utenti = $utente->allUsers(); // ottiene tutti gli utenti dal database
    echo json_encode($utenti, JSON_PRETTY_PRINT); // restituisce i risultati come JSON
  }

  // metodo per trovare un utente tramite id (GET /utente/{id})
  public function showUserId($id_utente)
  {
    // crea un'istanza della classe Utente
    $utente = new UtenteDAO();
    // cerca l'utente tramite id e popola le proprietà dell'oggetto
    $utente_data = $utente->getUserById($id_utente);

    if ($utente_data) {
      echo json_encode($utente_data, JSON_PRETTY_PRINT); // restituisce l'utente come JSON
    } else {
      echo json_encode(["message" => "Utente non trovato"], JSON_PRETTY_PRINT); // se non lo trova, stampa il messaggio
    }
  }

  public function showUsername($username)
  {
    //creo istanza della classe utente
    $utente = new UtenteDAO();
    //cerco l'utente tramite lo username
    $utenteUsername = $utente->getUserByUsername($username);

    if ($utenteUsername) {
      echo json_encode($utenteUsername, JSON_PRETTY_PRINT); // Restituisci gli come JSON
    } else {
      echo json_encode(["message" => "Username non trovato"], JSON_PRETTY_PRINT); // Se non trovato
    }
  }

  public function showEmail($email)
  {
    //creo istanza della classe utente
    $utente = new UtenteDAO();
    //cerco l'utente tramite la mail
    $utenteEmail = $utente->getUserByEmail($email);

    if ($utenteEmail) {
      echo json_encode($utenteEmail, JSON_PRETTY_PRINT); // Restituisci gli come JSON
    } else {
      echo json_encode(["message" => "Email non trovata"], JSON_PRETTY_PRINT); // Se non trovato
    }
  }

  // Metodo per creare un nuovo utente (POST /utente)
  public function create()
  {
    // Leggi il corpo della richiesta
    $data = json_decode(file_get_contents('php://input'), true);

    // Accedi ai dati decodificati
    $username = $data['username'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

    $utente = new UtenteDAO(); // Istanza della classe UtenteDAO
    $nuovoUtente = $utente->createUser($username, $email, $password);
    if ($nuovoUtente) {
      echo json_encode(["message" => "Utente creato con successo con ID: $nuovoUtente"], JSON_PRETTY_PRINT);
    } else {
      echo json_encode(["message" => "Errore nella creazione dell'utente."], JSON_PRETTY_PRINT);
    }
  }

  //- Metodo per aggiornare un utente(PUT/libro/{id})
  public function update($id_utente)
  {   // Otteniamo i dati JSON inviati dal client
    $data = json_decode(file_get_contents('php://input'), true);

    // Prepariamo i valori da passare al metodo updateBook, impostando a null quelli non forniti
    $username = $data['username'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

    // Chiama il metodo updateBook nel modello Libro
    $utente = new UtenteDAO();
    $result = $utente->updateUser($id_utente, $username, $email, $password);

    if ($result) {
      echo json_encode(["message" => "Utente aggiornato con successo"], JSON_PRETTY_PRINT);
    } else {
      echo json_encode(["message" => "Errore nell'aggiornamento dell'utente o nessun campo modificato"], JSON_PRETTY_PRINT);
    }
  }

  //Metodo per cancellare un libro (DELETE/libro/{id})
  public function deleteIdUser($id_utente)
  {

    // Creo un istanza della classe LibroDAO
    $utente = new UtenteDAO();
    // Chiamo il metodo deleteBook passando l'id
    $result = $utente->deleteUser($id_utente);

    // Output
    if ($result) {
      json_encode(["message" => "Utente cancellato con successo"], JSON_PRETTY_PRINT);
    } else {
      json_encode(["message" => "Errore nella cancellazione dell'utente"], JSON_PRETTY_PRINT);
    }
  }
}
