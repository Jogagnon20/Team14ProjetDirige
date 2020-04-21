<?php
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(!validate_session()){
        header("Location: ../error.php?ErrorMSG=Not%20logged%20in!");
        die();
    }

    $_SESSION = array();
    unset($_COOKIE["PHPSESSID"]);
    session_destroy();

    header("Location: ../logout.php");
    die();

?>
