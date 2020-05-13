<?php
  session_start();
  
    $title="Achat";

    $content = array();
    array_push($content, "AchatView.php");
    require_once __DIR__ . "/HTML/masterpage.php";

?>
