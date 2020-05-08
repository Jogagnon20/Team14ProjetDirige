<?php
  session_start();
  
    $title="Recherche";

    $content = array();
    array_push($content, "searchview.php");
    require_once __DIR__ . "/HTML/masterpage.php";

?>
