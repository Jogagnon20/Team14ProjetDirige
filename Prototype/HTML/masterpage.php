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
            .grid-container-Search {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: 1fr 1fr;
                grid-template-areas: "Picture Title Title" "Picture Description Description";
                gap: 1px 1px;
                background-color:#28a745;
            }
            .grid-container {
                display: grid;
                grid-template-columns: 50% 50%;
                gap: 1px 1px;
                background-color:#28a745;
            }
            .grid-container-Billet{
                display: grid;
                margin-bottom: 50px;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
                grid-template-rows: 20% 50% 13% 17%;
                gap: 1px 1px;
                grid-template-areas: ". Title Title Title Title ." "Picture Picture Artiste Artiste Picture2 Picture2" "Picture Picture Date Date Picture2 Picture2" "SalleCouleur SalleCouleur Adresse Adresse SiteWeb SiteWeb";
                background-color: #b3ffb3;
                border: 2px black solid;
            }
            .cursive{
                font-family:cursive;
            }
       </style>
    </head>
    <body style="padding-bottom: 100px">
        <?php include "navigationmodule.php";?>
        <div style="width:85%; margin-left:auto;margin-right:auto">
            <?php  load_modules($content); ?>
        </div>
        <footer class="footer" style="text-align:center; ">
        <input style='position: relative; margin-left: 500px;' type='button' onclick="document.location.href='spectacles.php';" value='Retour'/>
            <p>Fait par : Danny Léveillé, Guillaume Paquin, Jonathan Gagnon,  Nicolas Dalpé</p>
            <p id="DateNow"></p>

            

        </footer>

        <script>
             var date = new Date().toLocaleDateString();
            document.getElementById("DateNow").innerHTML = date;
        </script>
    </body>
</html>
