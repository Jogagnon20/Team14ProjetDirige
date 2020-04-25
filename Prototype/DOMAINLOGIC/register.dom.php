<?php
    //include "../CLASSES/USER/user.php";
    include "../UTILS/formvalidator.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

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
    if(!Validator::validate_email($courriel))
    {
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=invalid email");
        die();
    }
    if(!Validator::validate_password($pw, $pwv)){
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=password");
        die();
    }
    if(!Validator::validate_PostalCode($postalCode)){
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=postal code");
        die();
    }
    if(!Validator::validate_PhoneNumber($phone)){
       http_response_code(400);
       header("Location: ../error.php?ErrorMSG=invalid phone number");
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
