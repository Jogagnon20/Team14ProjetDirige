<?php 
    session_start();
    $idBillet = $_GET['idBillet'];
    $nbBillets = trim($_GET['nbBillet']);
    $imprimer = $_GET['imprime'];

    $idRepresentation;
    $idSection;
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call SelectFromBillets(?)");
    $stmt->bindParam(1, $idBillet);
    $stmt->execute();
    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
        $idRepresentation = $res['idRepresentation'];
        $idSection = $res['idSection'];
    }
    $mybd=null;


    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("Select CapaciteSection(?,?)");
    $stmt->bindParam(1,$idSection);
    $stmt->bindParam(2,$idRepresentation);
    $stmt->execute();
    while($res = $stmt->fetch()){
        $capacite = $res[0];
    }
    $mybd=null;

     if((int)$capacite<(int)$nbBillets){
        header("Location: ./../Panier.php?error=$capacite");
        die();
    }

    header("Location: acheterBillet.dom.php?imprime=$imprimer&nbBillet=$nbBillets&idBillet=$idBillet");
    die();
?>