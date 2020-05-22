<?php 
    session_start();
    $idClient = $_SESSION['idClient'];
    $nbBillet = $_GET['nbBillet'];
    $imprime = $_GET['imprime'];

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
    $stmt->bindParam(3,$nbBillet);
    $stmt->bindParam(4,$imprime);
    $res = $stmt->execute();

    $idBillet = $_GET['idBillet'];
    $panier = $_SESSION['Panier'];
    foreach($panier as $item){
        if($idBillet == $item[0]){
            $no = array_search($item,$_SESSION['Panier']);
            unset($_SESSION['Panier'][$no]);
        }
    }

    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("call DeleteBillet(?)");
    $stmt->bindParam(1,$idBillet);
    $stmt->execute();

    header("Location: ../Panier.php");
    die();
?>