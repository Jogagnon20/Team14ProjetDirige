<?php
    session_start();

    if(!isset($_SESSION["Admin"]))
    {
        if(isset($_SESSION["Client"])){
            header("Location: spectacles.php");
        }
        else{
            header("Location: login.php");
        }
    }

    //load view content
    $module = "ajoutSpectacleView.php";
    $content = array();
    array_push($content, $module);

    //variables used in the loaded module
    $title = "Ajout d'un spectacle";
    
    //load the masterpage
    require_once __DIR__ . "/HTML/masterpage.php";

?>