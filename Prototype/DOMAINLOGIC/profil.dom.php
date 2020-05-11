<?php
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
    $stmt1 = $mybd->prepare("CALL UpdateProfil()");
    $stmt1->execute();
    while ($donnees = $stmt1->fetch())
    {
        if($donnees['email'] == $email){
            $aClient = new Clients($donnees['idClient'], $donnees['nomClient'], $email, $donnees['adresseClient'], $donnees['telephoneClient']);
        }
    }
    $mybd = null;
    $_SESSION['Client'] = $aClient;

    









?>