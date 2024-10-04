<?php


require_once "../vendor/autoload.php"; // inclusione dell'autoloader di Composer
require_once "../config/Database.php"; // inclusione della connessione al db
require_once "../app/models/Utente.php"; // inclusione del model
require_once "../app/models/UtenteDAO.php"; // inclusione del model 
require_once "../app/controllers/UtenteController.php"; // inclusione del controller 


// Testing

/*------------Ottieni tutti gli utenti------------*/
// echo "Ottieni tutti gli utenti";
// $controller = new UtenteController();
// echo "<pre>";
// $controller->getAllUsers();
// echo "</pre>";
/*------------Trova utente per id------------*/
// echo "Trova utente per id";
// $controller2 = new UtenteController();
// echo "<pre>";
// $controller2->getUserById(2);
// echo "</pre>";

/*------------Trova utente per id------------*/
echo "Trova utente per id";
$controller2 = new UtenteController();
echo "<pre>";
$controller2->showUserId(2);
echo "</pre>";


/*------------Crea un nuovo Utente------------*/
// $controller2->create("giorgio","giorgio@gmail.com","giorgio!");
/*------------Crea un nuovo Utente------------*/
$data = [
  'username' => 'giorgio',
  'email' => 'giorgio@gmail.com',
  'password' => 'giorgio!'
];

// Simula la lettura di input JSON
file_put_contents('php://input', json_encode($data));

$controller2->create();

