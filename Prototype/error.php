<?php
    session_start();

    $title="Error";
    $module="errorview.php";
    $content = array();
    array_push($content, $module);

    require_once __DIR__ . "/HTML/masterpage.php";

?>
