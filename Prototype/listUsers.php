<?php
    session_start();
    
    if(!isset($_SESSION["Client"]))
    {
        header("Location: login.php");
        die();
    }
    if(!isset($_SESSION["Admin"]))
    {
        header("Location: spectacles.php");
        die();
    }

    //load view content
    $module = "listUsersView.php";
    $content = array();
    array_push($content, $module);

    //variables used in the loaded module
    $title = "Liste usagers";

    //load the masterpage
    require_once __DIR__ . "/HTML/masterpage.php";
?>