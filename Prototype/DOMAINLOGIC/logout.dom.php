<?php
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if (!isset($_SESSION['Client'])) {
        header("Location: ../error.php?ErrorMSG=Not%20logged%20in!");
        die();
    }

    $_SESSION = array();
    unset($_COOKIE["PHPSESSID"]);
    session_destroy();

    header("Location: ../login.php");
    die();
?>
