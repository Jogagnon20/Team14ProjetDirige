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
       </style>
    </head>
    <body>
        <?php include "navigationmodule.php";?>
        <div class="container align-center text-center">
            <?php  load_modules($content); ?>
        </div>
        <footer style="text-align:center">
            <p>Fait par : Danny Léveillé, Guillaume Paquin, Jonathan Gagnon,  Nicolas Dalpé</p>
            <p id="DateNow"></p>
        </footer>

        <script>
             var date = new Date().toLocaleDateString();
            document.getElementById("DateNow").innerHTML = date;
        </script>
    </body>
</html>
