<?php 
    include __DIR__ . "/../DAL/ClassPanier.php";
    $panier = Panier::getInstance();
    $Commandes = $panier->getCommandes();
    var_dump($Commandes);
?>