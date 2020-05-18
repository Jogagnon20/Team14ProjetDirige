<?php
    include "../DAL/models.php";
    session_start();

    $email = $_GET['courrielClient'];
    $Newpassword = $_GET['newPassword'];
    $verifPassword = $_GET['verifPassword'];


    var_dump($_GET);
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
    $stmt1 = $mybd->prepare("CALL UpdateProfil(id, nomClient, adresseClient, telephoneClient, email, password)");
    $stmt1->bindParam(2, $_GET['nomClient']);
    $stmt1->bindParam(3, $_GET['adresseClient']);
    $stmt1->bindParam(4, $_GET['telephoneClient']);
    $stmt1->bindParam(5, $_GET['courrielClient']);
    $stmt1->bindParam(6, $_GET['newPassword']);
    $stmt1->execute();
    $stmt1 = $mybd->prepare("call SelectFromClients");
    $stmt1->execute();
    while ($donnees = $stmt1->fetch())
    {
        if($donnees['idClient'] == $_SESSION['idClient']){
            $aClient = new Clients($donnees['idClient'], $donnees['nomClient'], $email, $donnees['adresseClient'], $donnees['telephoneClient']);
        }
    }

    $mybd = null;
    $_SESSION['Client'] = $aClient;




?>
