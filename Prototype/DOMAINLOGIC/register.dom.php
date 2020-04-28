<?php
    //include "../CLASSES/USER/user.php";
    include "../UTILS/formvalidator.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    session_destroy();
    session_start();
    if(validate_session()){
        header("Location: ../error.php?ErrorMSG=Already%20logged!");
        die();
    }



    //prendre les variables du Post
    $courriel = $_POST["email"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $pw = $_POST["pw"];
    $pwv = $_POST["pwValidation"];
    $adress = $_POST["adress"];
    $postalCode = $_POST["pc"];
    
    //Validation Posts
    if(!Validator::validate_email($courriel)){
        $_SESSION['errorEmail'] = "L'adresse courriel existe déjà"; 
        $_SESSION['error'] = true;
    }
    if(!Validator::validate_password($pw, $pwv)){
        $_SESSION['errorPassword'] = "Le mot de passe est invalide"; 
        $_SESSION['error'] = true;
    }
    if(!Validator::validate_PostalCode($postalCode)){
        $_SESSION['errorPc'] = "Le code postal est invalide"; 
        $_SESSION['error'] = true;
    }
    if(!Validator::validate_PhoneNumber($phone)){
        $_SESSION['errorPhone'] = "Le numéro de téléphone est invalide";
        $_SESSION['error'] = true; 
    }
        if(isset($_SESSION['error'])){
            $_SESSION['email'] = $courriel;
            $_SESSION['name'] = $name;
            $_SESSION['adress'] = $adress;
            $_SESSION['phone'] = $phone;
            $_SESSION['pc'] = $postalCode;
            header("Location: ../register.php");
            die();
        }
 
     $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
     $stmt1 = $mybd->prepare("CALL InsertClient(?,?,?,?,?)");
    //  // lier les paramètres
     $stmt1->bindParam(1, $nomClient);
     $stmt1->bindParam(2, $adresse);
     $stmt1->bindParam(3, $telephone);
     $stmt1->bindParam(4, $email);
     $stmt1->bindParam(5, $motDePasse);
      // affectation de valeurs aux paramètres
     $nomClient = $name;
     $adresse = $adress."|".$postalCode;
     $telephone = $phone;
     $email = $courriel;
     $motDePasse = $pw;
      // executer la requête
     $stmt1->execute();
        
     $mybd=null;
    
    //$aUser = new User();

    //validateLogin
    //if(!$aUser->register($email, $username, $pw, $pwv, $url))
    //{
        //http_response_code(400);
        //header("Location: ../error.php?ErrorMSG=invalid email or password or postal code");
        //die();
    //}

    header("Location: ../login.php");
    die();
?>
