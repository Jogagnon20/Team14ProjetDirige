<?php
final class Clients{
    public $idClient;

    public $nomClient;

    public $courrielClient;

    public $adresseClient;

    public $telephoneClient;

    public function __construct($id, $nom, $courriel, $adresse, $telephone) 
    { 
       $this->idClient = $id;
       $this->nomClient = $nom;
       $this->courrielClient = $courriel;
       $this->adresseClient = $adresse;
       $this->telephoneClient = $telephone;
    } 
}
?>