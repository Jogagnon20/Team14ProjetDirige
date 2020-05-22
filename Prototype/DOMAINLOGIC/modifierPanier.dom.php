<?php 
    session_start();
    $idClient = $_SESSION['idClient'];
    $nbBillet = $_GET['nbBillet'];
    $idBillet = $_GET['idBillet'];

    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call UpdateBillet(?, ?)");
    $stmt->bindParam(1,$idBillet);
    $stmt->bindParam(2,$nbBillet);
    $stmt->execute();

    header("Location: ../Panier.php");
    die();
?>