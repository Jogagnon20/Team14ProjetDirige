<?php

function generateErrorMSG(){
    $errorMSG = $_GET["ErrorMSG"];
    return "<h4>$errorMSG</h4></br>";
}

echo "<h2> Error:", http_response_code(),"</h2>";
echo generateErrorMSG();

?>
