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
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pw = $_POST["pw"];
    $pwv = $_POST["pwValidation"];
    $adress = $_POST["adress"];
    $postalCode = $_POST["pc"];
    
    //Validation Posts
    if(!Validator::validate_email($email) || !Validator::validate_password($pw) || !Validator::validate_PostalCode($postalCode))
    {
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=invalid email or password or postal code");
        die();
    }

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
