<?php
  include __DIR__ . "/../UTILS/moduleloader.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "bootstrap.html";?>
        <title> <?php echo $title ?> </title>
       <style>
           .hiddenDiv{
            display: none;
            }
            .showDiv{
                display: show;
            }
            .footer {
                position: relative;
                left: 0;
                bottom: 0;
                width: 100%;
                color: black;
                text-align: center;
            }
            .grid-container {
                display: grid;
                grid-template-columns: 50% 50%;
                gap: 1px 1px;
                background-color:lightgray;
}
       </style>
    </head>
    <body style="padding-bottom: 100px">
        <?php include "navigationmodule.php";?>
        <div style="width:85%; margin-left:auto;margin-right:auto">
            <?php  load_modules($content); ?>
        </div>
        <footer class="footer" style="text-align:center; ">
            <p>Fait par : Danny Léveillé, Guillaume Paquin, Jonathan Gagnon,  Nicolas Dalpé</p>
            <p id="DateNow"></p>
        </footer>

        <script>
             var date = new Date().toLocaleDateString();
            document.getElementById("DateNow").innerHTML = date;
        </script>
    </body>
</html>
