<?php 
    session_start();
    $idBillet = $_GET['idBillet'];

    $panier = $_SESSION['Panier'];
    foreach($panier as $item){
        if($idBillet == $item[0][0]){
            $no = array_search($item,$_SESSION['Panier']);
            unset($_SESSION['Panier'][$no]);
        }
    }
    header("Location: ../Panier.php");
    die();
?>