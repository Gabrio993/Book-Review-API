<?php

// Gestione della connessione al Database
class Database
{
    private static $instance = null;

    //Crea e restituisce un'unica connessione PDO al database
    public static function getInstance()
    {
        if (self::$instance === null) {
            $config = include('config.php'); // Legge i dettagli della connessione dal file di configurazione
            $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8";
            self::$instance = new PDO($dsn, $config['db_user'], $config['db_password']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
