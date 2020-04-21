<?php
  session_start();
  
    if(!isset($_GET["search"])){
      header("Location: error.php?ErrorMSG=Bad%20Request!");
      die();
    }

    $title="search";

    $content = array();
    array_push($content, "searchview.php");
    require_once __DIR__ . "/HTML/masterpage.php";

?>
