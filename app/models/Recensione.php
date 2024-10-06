[StartOfDocument app/models/Recensione.php]
[CursorSurroundingLines]
<?php

class Recensione
{
    public $id;
    public $recensione;
    public $valutazione;
    public $nomeUtente;
    public $dataCreazione;

    // Costruttore per inizializzare l'oggetto Recensione e la connessione al DB
    public function __construct($id = null, $commento = null, $valutazione = null, $nomeUtente = null, $dataCreazione = null)
    {
        // $this->db = Database::getInstance();
        $this->id = $id;
        $this->valutazione = $valutazione;
        $this->nomeUtente = $nomeUtente;
        $this->dataCreazione = $dataCreazione;
    }
}

class RecensioneValidator
{
    public static function validate($data)
    {
        $errors = [];

        if (empty($data['commento'])) {
            $errors[] = "Il commento non può essere vuoto";
        }

        if (!isset($data['valutazione']) || !is_int($data['valutazione']) || $data['valutazione'] < 1 || $data['valutazione'] > 5) {
            $errors[] = "La valutazione deve essere un intero compreso tra 1 e 5";
        }

        return $errors;
    }
}
