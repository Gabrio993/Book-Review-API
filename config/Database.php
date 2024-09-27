<?php

// Configurazione del database
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_database');
define('DB_USER', 'nome_utente');
define('DB_PASSWORD', 'password_utente');

// Configurazione della connessione al database
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Creazione dell'istanza della classe Database
class Database {
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        }
        return self::$instance;
    }
}

// Funzione per eseguire query al database
function query($sql, $params = []) {
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

// Funzione per eseguire query di lettura al database
function queryRead($sql, $params = []) {
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}
