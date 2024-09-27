<?php

interface RecensioneDAO {
    public function getAllRecensioni();
    public function getRecensioneById($id);
    public function createRecensione($recensione);
    public function updateRecensione($recensione);
    public function deleteRecensione($id);
}
