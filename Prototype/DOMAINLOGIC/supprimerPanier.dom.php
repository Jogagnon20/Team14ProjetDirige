<?php 
    session_start();
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