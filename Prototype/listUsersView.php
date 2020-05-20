<div class="container" style="margin-top:30px">
    <h2>liste des usagers</h2>
    <?php 
        try
        {
            $Spectacles = array();
            $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
            $resultat = $mybd->query("call SelectOrderClients");
            echo "<div style='padding:20px'>";
            while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                $id = $donnees['idClient'];
                $nom = $donnees['nomClient'];
                $email = $donnees['email'];
                $nbBillets = $donnees['nbBillets'];
                echo "
                <div style='position: relative;'>
                    nombre de billets achetés : $nbBillets - <b>$nom</b> : $email
                    <span style=\"position: absolute; right: 0;\"><input type=\"button\" onclick=\"location.href='profilClient.php?id=$id';\" value=\"Accéder au profil\"/></span>
                    <hr>
                </div>";
            }
            echo "</div>";
            $resultat->closeCursor();
        }
        catch (PDOException $e)
        {
            echo('Erreur de connexion: ' . $e->getMessage());
            exit();
        }
        $mybd=null;
    ?>
</div>