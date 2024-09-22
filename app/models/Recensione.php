<?php

class Recensione
{
    private $id;
    private $commento;
    private $valutazione;
    private $nomeUtente;
    private $dataCreazione;

    public function __construct($id, $commento, $valutazione, $nomeUtente, $dataCreazione)
    {
        $this->id = $id;
        $this->commento = $commento;
        $this->valutazione = $valutazione;
        $this->nomeUtente = $nomeUtente;
        $this->dataCreazione = $dataCreazione;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCommento()
    {
        return $this->commento;
    }

    public function getValutazione()
    {
        return $this->valutazione;
    }

    public function getNomeUtente()
    {
        return $this->nomeUtente;
    }

    public function getDataCreazione()
    {
        return $this->dataCreazione;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCommento($commento)
    {
        $this->commento = $commento;
    }

    public function setValutazione($valutazione)
    {
        $this->valutazione = $valutazione;
    }

    public function setNomeUtente($nomeUtente)
    {
        $this->nomeUtente = $nomeUtente;
    }

    public function setDataCreazione($dataCreazione): void
    {
        $this->dataCreazione = $dataCreazione;
    }
}
