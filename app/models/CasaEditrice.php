<?php

include_once '../../config/Database.php';

class CasaEditrice {
    
    //definizione delle proprietà
    private $db;
    private $id_casa_editrice;
    private $nome;
    private $anno_fondazione;
    private $paese;

    //metodo costruttore
    public function __construct($id_casa_editrice = null, $nome = null, $anno_fondazione = null, $paese = null){

        $this->db = Database::getInstance();
        $this->id_casa_editrice = $id_casa_editrice;
        $this->nome = $nome;
        $this->anno_fondazione = $anno_fondazione;
        $this->paese = $paese;
    }

    //metodo per recuperare tutte le case editrici
    public function getAllCaseEditrici(){
        
        $stmt = $this->db->query("SELECT * FROM casa_editrice"); //query per ottenere tutte le case editrici
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //restituisce i risultati in un array associativo
    }

    //metodo per recuperare una casa editrice tramite id
    public function getCasaEditriceById($id_casa_editrice){

        $stmt = $this->db->prepare("SELECT * FROM casa_editrice WHERE id_casa_editrice = :id_casa_editrice"); //query per ottenere una casa editrice tramite il suo id
        $stmt->execute(["id_casa_editrice" => $id_casa_editrice]);
        $casa_editrice = $stmt->fetch(PDO::FETCH_ASSOC);

        if($casa_editrice) {
            //se troviamo una casa editrice, aggiorniamo le proprietà dell'oggetto
            $this->id_casa_editrice = $casa_editrice['id_casa_editrice'];
            $this->nome = $casa_editrice['nome'];
            $this->anno_fondazione = $casa_editrice['anno_fondazione'];
            $this->paese = $casa_editrice['paese'];
        }

        return $casa_editrice;
    }

    //metodo per recuperare le case editrici in base all'anno di fondazione
    public function getCasaEditriceByAnno($anno_fondazione){

        $stmt = $this->db->prepare("SELECT * FROM casa_editrice WHERE anno_fondazione = :anno_fondazione"); //query per ottenere tutte le case editrici in base all'anno di fondazione
        $stmt->execute(["anno_fondazione" => $anno_fondazione]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //restituisce i risultati in un array associativo
    }

    //metodo per recuperare le case editrici in base al paese
    public function getCasaEditriceByPaese($paese){

        $stmt = $this->db->prepare("SELECT * FROM casa_editrice WHERE paese = :paese"); //query per ottenere tutte le case editrici in base al paese
        $stmt->execute(["paese" => $paese]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //restituisce i risultati in un array associativo
    }  
    
    //metodo per creare una nuova casa editrice
    public function createCasaEditrice($nome, $anno_fondazione, $paese){

        //preparazione della query per inserire una nuova casa editrice
        $stmt = $this->db->prepare("INSERT INTO casa_editrice (nome, anno_fondazione, paese) VALUES (:nome, :anno_fondazione, :paese)");

        //esecuzione della query passando i parametri
        $result = $stmt->execute([
            "nome" => $nome,
            "anno_fondazione" => $anno_fondazione,
            "paese" => $paese
        ]);

        //controllo se l'inserimento è avvenuto con successo
        if($result){
            return $this->db->lastInsertId(); //restituisce l'ID della nuova casa editrice
        }
        else {
            return false; //inserimento non avvenuto con successo
        }
    }

    /* To do:

    metodo per aggiornare una casa editrice

    metodo per cancellare una casa editrice
    */
    
}