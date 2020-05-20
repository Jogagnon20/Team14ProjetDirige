<div class="container" style="margin-top:30px; position: relative;">
    <h2>Profil du Client</h2>
    <?php 
        try
        {
            $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
            $stmt = $mybd->prepare("CALL SelectClientWhereId(?)");
            $stmt->bindParam(1,$_GET['id']);
            $stmt->execute();
            while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $id = $donnees['idClient'];
                $nom = $donnees['nomClient'];
                $email = $donnees['email'];
                $tel = $donnees['telephoneClient'];
                $adresse = $donnees['adresseClient'];
                echo "
                <div style='padding-left:30px; padding-right:30px'>
                    <div>Nom : $nom</div>
                    <div>Courriel : $email</div>
                    <div>Téléphone : $tel</div>
                    <div>Adresse : $adresse</div>
                    <hr>
                    <h5>Habitudes du client</h5>
                    <div style='padding-left:30px; padding-right:30px'>";
                        try
                        {
                            $nbdiv = 0;
                            $mybd2 = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
                            $stmt2 = $mybd2->prepare("CALL ListHabitudesClient(?)");
                            $stmt2->bindParam(1,$_GET['id']);
                            $stmt2->execute();
                            while ($donnees2 = $stmt2->fetch(PDO::FETCH_ASSOC))
                            {
                                $nbBillets = $donnees2['nbBillets'];
                                $description = $donnees2['Description'];
                                echo "<div>$nbBillets - $description</div>";
                                $nbdiv++;
                            }
                            if ($nbdiv == 0){
                                echo "<div>Ce client n'a toujours pas acheté de billets</div>";
                            }
                            $stmt2->closeCursor();
                        }
                        catch (PDOException $e)
                        {
                            echo('Erreur de connexion: ' . $e->getMessage());
                            exit();
                        }
                        $mybd2=null;
                    echo "</div>
                    <hr>
                    <br>
                </div>";
            }
            $stmt->closeCursor();
        }
        catch (PDOException $e)
        {
            echo('Erreur de connexion: ' . $e->getMessage());
            exit();
        }
        $mybd=null;
    ?>
    <input style='position: absolute; right: 0; bottom: 0;' type="button" onclick="location.href='listUsers.php';" value="Retour"/>
</div>