<?php 
    include __DIR__ . "/../DAL/ClassPanier.php";
    session_start();
    $idClient = $_SESSION['idClient'];
    $idSpectacle = $_GET['idSpectacle'];
    $idSection = $_GET['idSection'];
    $idRepresentation = $_GET['idRepresentation'];
    $nbBillet = $_GET['nbBillets'];
    $idSalle = $_GET['idSalle'];


    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("Select CapaciteSection(?,?)");
    $stmt->bindParam(1,$idSection);
    $stmt->bindParam(2,$idRepresentation);
    $stmt->execute();
    while($res = $stmt->fetch()){
        $capacite = $res[0];
    }
    $mybd=null;

    
    if((int)$capacite<(int)$nbBillet){
        header("Location: ./../Achats.php?id=$idSpectacle&error=$capacite");
        die();
    }

    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("CALL InsertBillets(?,?,?,?,?,?)");
    $stmt->bindParam(1,$idSection);
    $stmt->bindParam(2,$idClient);
    $stmt->bindParam(3,$idRepresentation);
    $stmt->bindParam(4,$idSalle);
    $stmt->bindParam(5,$idSpectacle);
    $stmt->bindParam(6,$nbBillet);
    $total = $stmt->execute();
    $mybd=null;

    
    $noBillet;
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call GetLatestBilletbyClient(?)");
    $stmt->bindParam(1,$idClient);
    $stmt->execute();
    while($donnees = $stmt->fetch()){
        $noBillet =$donnees;
    }
    array_push($_SESSION['Panier'], $noBillet);

    header("Location: ../Panier.php");
    die();

?>