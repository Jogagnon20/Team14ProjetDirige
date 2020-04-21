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
        
</style>
    </head>
    <body>
        <?php include "navigationmodule.php";?>
        <div class="container align-center text-center">
            <?php  load_modules($content); ?>
        </div>
        <footer>
        </footer>
    </body>
</html>
