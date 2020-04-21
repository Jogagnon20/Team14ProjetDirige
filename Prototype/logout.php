<?php
    session_start();
    $title = "logout";

    
    $module = "logoutview.php";
    $content = array();
    array_push($content, $module);

    require "./HTML/masterpage.php";
?>
