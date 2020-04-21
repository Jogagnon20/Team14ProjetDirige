<?php
    include "../CLASSES/USER/user.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";


    session_start();

    if(validate_session()){
        header("Location: ../error.php?ErrorMSG=already%20logged%20in!");
        die();
    }

    //prendre les variables du Post
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    //Validation Posts
    //$aUser = new User(); création d'un user

    //validateLogin
    if($aUser->Login($email, $pw))
    {
        login($aUser->get_id(), $aUser->get_email(), $aUser->get_username());
        header("Location: ../Spectacles.php");
        die();
    }
    
    header("Location: ../error.php?ErrorMSG=invalid email or password");
    die();
