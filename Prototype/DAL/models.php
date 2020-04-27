<?php
final class Clients{
    public $idClient;

    public $nomClient;

    public $courrielClient;

    public $adresseClient;

    public $telephoneClient;

    public function __construct($id, $nom, $courriel, $adresse, $telephone) 
    { 
       $idClient = $id;
       $nomClient = $nom;
       $courrielClient = $courriel;
       $adresseClient = $adresse;
       $telephoneClient = $telephone;
    } 
?>