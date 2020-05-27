<?php
    include "../DAL/models.php";
    include "../UTILS/formvalidator.php";
    session_start();
    unset($_SESSION['error']);
    unset($_SESSION['errorPassword']);
    unset($_SESSION['errorPC']);
    unset($_SESSION['errorEmail']);

    $email = $_GET['courrielClient'];
    $newpassword = $_GET['newPassword'];
    $verifyPassword = $_GET['verifPassword'];
    $adresse = $_GET['adresseClient']."|".$_GET['codePostal'];

    //Validations
    if(!Validator::validate_profil_password($newpassword, $verifyPassword)){
        $_SESSION['errorPassword'] = "Les mots de passes ne sont pas identiques"; 
        $_SESSION['error'] = true;
    }
    if(!Validator::validate_PostalCode($_GET['codePostal'])){
        $_SESSION['errorPC'] = "Le code postal ne convient pas"; 
        $_SESSION['error'] = true;
    }
    if(!Validator::validate_profil_email($email, $_SESSION['idClient'])){
        $_SESSION['errorEmail'] = "L'adresse courriel est déja utilisée"; 
        $_SESSION['error'] = true;
    }
    if(isset($_SESSION['error'])){
        header("Location: ../monProfil.php");
        die();
    }

    //Password
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("CALL SelectClientWhereId(?)");
    $stmt->bindParam(1, $_SESSION['idClient']);
    $stmt->execute();
    while ($donnees = $stmt->fetch())
    {
        if ($newpassword == null){
            $password = $donnees['password'];
        }
        else {
            $password = $newpassword;
        }
    }

    //Update
    $stmt = $mybd->prepare("CALL UpdateProfil(?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_SESSION['idClient']);
    $stmt->bindParam(2, $_GET['nomClient']);
    $stmt->bindParam(3, $adresse);
    $stmt->bindParam(4, $_GET['phone']);
    $stmt->bindParam(5, $_GET['courrielClient']);
    $stmt->bindParam(6, $password);
    $stmt->execute();

    //Prendre nouvelles données dans la bd pour session[Client]
    $stmt = $mybd->prepare("call SelectFromClients");
    $stmt->execute();
    while ($donnees = $stmt->fetch())
    {
        if($donnees['idClient'] == $_SESSION['idClient']){
            $aClient = new Clients($donnees['idClient'], $donnees['nomClient'], $email, $donnees['adresseClient'], $donnees['telephoneClient']);
        }
    }

    $mybd = null;
    $_SESSION['Client'] = $aClient;
    header("Location: ../spectacles.php");
    die();
?>
