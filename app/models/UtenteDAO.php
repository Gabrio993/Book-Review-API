<?php

class UtenteDAO
{
  // proprietà dell'utente
  private $db;
  private $id_utente;
  private $username;
  private $email;
  private $password;

  // Costruttore per inizializzare l'oggetto utente con le sue proprietà
  public function __construct()
  {
    $this->db = Database::getInstance(); // Inizializza la connessione al database

  }

  // metodo per recuperare tutti gli utenti
  public function allUsers()
  {
    $stmt = $this->db->query("SELECT * FROM utente"); // query per ottenere tutti gli utenti
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // restituisce i risultati come array associativo
  }

  // metodo per recuperare un utente tramite id
  public function getUserById($id_utente)
  {
    $stmt = $this->db->prepare("SELECT * FROM utente WHERE id_utente = :id_utente"); // query per ottenere un utente tramite id
    $stmt->execute(["id_utente" => $id_utente]); // binding(=associare valore) del valore di id_utente
    $utente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utente) {
      // se troviamo un utente, aggiorniamo le proprietà dell'oggetto
      $this->id_utente = $utente['id_utente'];
      $this->username = $utente['username'];
      $this->email = $utente['email'];
      $this->password = $utente['password'];
    }

    return $utente;
  }

  // Metodo per recuperare un utente in base all'email
  public function getUserByEmail($email)
  {
    $stmt = $this->db->prepare("SELECT * FROM utente WHERE email = :email"); // Query per ottenere gli utenti in base alla mail
    $stmt->execute(["email" => $email]); // Binding del valore email
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisce i risultati come array associativo
  }

  // Metodo per recuperare un utente in base all'email
  public function getUserByUsername($username)
  {
    $stmt = $this->db->prepare("SELECT * FROM utente WHERE username = :username"); // Query per ottenere gli utenti in base allo username
    $stmt->execute(["username" => $username]); // Binding del valore dell'username
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisce i risultati come array associativo
  }


  // Metodo per creare un nuovo utente (POST /utente)
  public function createUser($username, $email, $password)
  {
    $stmt = $this->db->prepare("INSERT INTO utente (username,email,password) VALUES (:username,:email,:password)");
    $result = $stmt->execute(["username" => $username, "email" => $email, "password" => $password]);

    // Verifica se l'inserimento è avvenuto con successo
    if ($result) {
      return $this->db->lastInsertId(); // Restituisce l'ID del nuovo utente creato
    } else {
      return false; // Inserimento fallito
    }
  }

  // - Metodo per aggiornare un utente (PUT/utente/{id})

  public function updateUser($id_utente, $username = null, $email = null, $password = null)
  {
    // Prima, verifichiamo se l'utente esiste
    $stmt = $this->db->prepare("SELECT * FROM utenti WHERE id_utente = :id_utente");
    $stmt->execute(['id_utente' => $id_utente]);
    $utente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utente) {
      // Se l'utente non esiste, restituiamo false
      return false;
    }

    // Prepariamo i campi da aggiornare dinamicamente
    $fieldsToUpdate = [];
    $params = ['id_utente' => $id_utente];

    if ($username !== null) {
      $fieldsToUpdate[] = "username = :username";
      $params['username'] = $username;
    }
    if ($email !== null) {
      $fieldsToUpdate[] = "email = :email";
      $params['email'] = $email;
    }
    if ($password !== null) {
      // Consigliabile usare password_hash() per memorizzare le password in modo sicuro
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $fieldsToUpdate[] = "password = :password";
      $params['password'] = $hashedPassword;
    }

    // Se non ci sono campi da aggiornare, concludiamo l'operazione senza aggiornare
    if (empty($fieldsToUpdate)) {
      return false;
    }

    // Query SQL finale
    $sql = "UPDATE utenti SET " . implode(", ", $fieldsToUpdate) . " WHERE id_utente = :id_utente";
    $stmt = $this->db->prepare($sql);

    // Eseguiamo la query con i parametri aggiornati
    $result = $stmt->execute($params);

    return $result;
  }


  // - Metodo per cancellare un utente (DELETE/utente/{id})
  public function deleteUser($id)
  {
    // Prima, verifichiamo se il libro esiste
    $stmt = $this->db->prepare("SELECT * FROM utente WHERE id_utente = :id_utente");
    $stmt->execute(['id_utente' => $id]);
    $utente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se il libro non esiste, restituiamo false
    if (!$utente) {
      return false;
    }

    // Prepariamo la query per cancellare il libro
    $stmt = $this->db->prepare("DELETE FROM utente WHERE id_utente= :id_utente");

    // Esegui la query passando l'ID del libro da cancellare
    $result = $stmt->execute(['id_utente' => $id]);

    // Restituisce true se la cancellazione è avvenuta con successo, altrimenti false
    return $result;
  }

}