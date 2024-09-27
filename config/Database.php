<?php

class Database {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            $config = include 'config.php';
            $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8";
            self ::$instance = new PDO($dsn, $config['db_user'], $config['db_password']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}