<?php
  session_start();
  if(!isset($_SESSION["Client"])){
    header("Location: login.php");
  }

    $title="Achat";

    $content = array();
    array_push($content, "AchatView.php");
    require_once __DIR__ . "/HTML/masterpage.php";

?>
