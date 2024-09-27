<?php

require_once 'dao/RecensioneDAO.php'; 
require_once 'dao/RecensioneDAOImpl.php'; 

class Recensione {
    private $dao;

    public function __construct() {
        $this->dao = new RecensioneDAOImpl();
    }

    public function allRecensioni() {
        return $this->dao->getAllRecensioni();
    }

    public function getRecensioneById($id) {
        return $this->dao->getRecensioneById($id);
    }

    public function createRecensione($commento, $valutazione, $nomeUtente, $dataCreazione) {
        $recensione = [
            'commento' => $commento,
            'valutazione' => $valutazione,
            'nome_utente' => $nomeUtente,
            'data_creazione' => $dataCreazione,
        ];
        $this->dao->createRecensione($recensione);
    }

    public function updateRecensione($id, $commento, $valutazione, $nomeUtente, $dataCreazione) {
        $recensione = [
            'id' => $id,
            'commento' => $commento,
            'valutazione' => $valutazione,
            'nome_utente' => $nomeUtente,
            'data_creazione' => $dataCreazione,
        ];
        $this->dao->updateRecensione($recensione);
    }

    public function deleteRecensione($id) {
        $this->dao->deleteRecensione($id);
    }
}
