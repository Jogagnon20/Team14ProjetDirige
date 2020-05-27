<?php
    session_start();

    if(!isset($_SESSION["Client"])){
        header("Location: login.php");
    }

    $title = "Facture";
    $module = "factureView.php";
    $content = array();
    array_push($content, $module);

    require_once __DIR__ . "/HTML/masterpage.php";

?>
