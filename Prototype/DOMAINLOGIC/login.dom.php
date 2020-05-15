<?php
    include __DIR__ . "/../UTILS/sessionhandler.php";
    include "../DAL/models.php";
    include "../UTILS/formvalidator.php";


    session_start();
    session_destroy();
    session_start();
    if(isset($_SESSION['Client']))
    {
        header("Location: ../Spectacles.php");
        die();
    }

    //prendre les variables du Post
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    //Validation Posts*****************************************************
    if(!Validator::validate_login_email($email)){
        $_SESSION['errorLogin'] = true;
        $_SESSION['errorEmailLogin'] = "L'adresse courriel est invalide";
    }
    if(!Validator::validate_login_password($pw)){
        $_SESSION['errorLogin'] = true;
        $_SESSION['errorPasswordLogin'] = "Le mot de passe est invalide";
    }

    if(isset($_SESSION['errorLogin'])){
        $_SESSION['emailLogin'] = $email;
        header("Location: ../login.php");
        die();
    }
    //getClient
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
    $stmt1 = $mybd->prepare("CALL SelectFromClients()");
    $stmt1->execute();
    while ($donnees = $stmt1->fetch())
    {
        if($donnees['email'] == $email){
            $aClient = new Clients($donnees['idClient'], $donnees['nomClient'], $email, $donnees['adresseClient'], $donnees['telephoneClient']);
        }
    }
    $mybd = null;
    $_SESSION['Client'] = $aClient;
    
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
    $stmt1 = $mybd->prepare("CALL SelectIsAdminClient(?)");
    $stmt1->bindParam(1, $emailP);
    $emailP = $email;
    $stmt1->execute();
    while ($donnees = $stmt1->fetch())
    {
        if($donnees['isAdmin'] == 1){
            $_SESSION['Admin'] = true;
        }
    }
    $mybd = null;


    header("Location: ../Spectacles.php");
    die();
?>