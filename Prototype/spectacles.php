<?php
    session_start();

    if(isset($_SESSION["userID"]))
    {
        header("Location: ../error.php?ErrorMSG=Already%20Logged!");
        die();
    }

    $title = "Spectacles";
    $module = "spectaclesView.php";
    $content = array();
    array_push($content, $module);

    require_once __DIR__ . "/HTML/masterpage.php";

?>
