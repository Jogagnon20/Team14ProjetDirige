<?php
  session_start();
  
    $title="Recherche Avancé";

    $content = array();
    array_push($content, "searchAdvancedView.php");
    require_once __DIR__ . "/HTML/masterpage.php";

?>
