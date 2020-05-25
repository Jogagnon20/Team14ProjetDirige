<?php 
    session_start();
    $idClient = $_SESSION['idClient'];
    $nbBillets = $_GET['nbBillet'];
    $idBillet = $_GET['idBillet'];
    $imprime = 0;
    if ($_GET['imprime'] === "on")
        $imprime = 1;

    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call InsertAchat(?,?)");
    $stmt->bindParam(1,$date);
    $stmt->bindParam(2,$idClient);
    $date = date("Y-m-d h:i:s");
    $stmt->execute();

    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call GetLatestAchatByClient(?)");
    $stmt->bindParam(1,$idClient);
    $stmt->execute();
    while($donnees = $stmt->fetch()){
        $lastId = $donnees[0];
    }

    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call InsertAchatReel(?,?,?,?)");
    $stmt->bindParam(1,$idBillet);
    $stmt->bindParam(2,$lastId);
    $stmt->bindParam(3,$nbBillets);
    $stmt->bindParam(4,$imprime);
    $res = $stmt->execute();

    header("Location: ../facture.php?id=$idBillet&nbBillets=$nbBillets");
    die();
?>