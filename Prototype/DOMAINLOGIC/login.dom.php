<?php
    include __DIR__ . "/../UTILS/sessionhandler.php";
    include __DIR__ . "/../DAL/models.php";


    session_start();

    if(validate_session()){
        header("Location: ../error.php?ErrorMSG=already%20logged%20in!");
        die();
    }
    if(isset($_SESSION['Client']))
    {
        header("Location: ../Spectacles.php");
        die();
    }

    //prendre les variables du Post
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    //Validation Posts*****************************************************


    //getClient
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
    $stmt = $mybd->prepare("CALL SelectFromClients()");
    $stmt->execute();
    while ($donnees = $stmt->fetch())
    {
        if($donnees['email'] == $email){
            $aClient = new Clients($donnees['idClient'], $donnees['nomClient'], $email, $donnees['adresseClient'], $donnees['telephoneClient']);
        }
    }
    $mybd = null;
    $_SESSION['Client'] = $aClient;
    


    header("Location: ../Spectacles.php");
    die();
?>