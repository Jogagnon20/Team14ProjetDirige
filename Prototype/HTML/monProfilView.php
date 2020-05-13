<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Mon Profil</h2>
            <form method = "post" action = "./DOMAINLOGIC/profil.dom.php">
                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <?php
                        $clientInfo = get_object_vars($_SESSION['Client']);
                        $nomClient = $clientInfo['nomClient'];
                        echo "<input type='text' class='form-control' value='$nomClient' name='$nomClient' id='nomClient' required>";
                        
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">Courriel</label>
                    <?php
                        $clientInfo = get_object_vars($_SESSION['Client']);
                        $courrielClient = $clientInfo['courrielClient'];
                        echo "<input type='text' class='form-control' value='$courrielClient' id='courrielClient' required>";
                    ?>
                </div>
                <div class="form-group">
                    <label for="mdp">Nouveau mot de passe</label>
                    <?php
                        
                    ?>
                </div>
                <div class="form-group">
                    <label for="ConfirmationMdp">Confirmation mot de passe</label>
                    <?php
                      
                    ?>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <?php
                        $clientInfo = get_object_vars($_SESSION['Client']);
                        $telephoneClient = $clientInfo['telephoneClient'];
                        echo "<input type='text' class='form-control' value='$telephoneClient' id='telephoneClient' required>";
                    ?>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <?php
                        $clientInfo = get_object_vars($_SESSION['Client']);
                        $adresseClient = $clientInfo['adresseClient'];
                        echo "<input type='text' class='form-control' value='$adresseClient' id='adresseClient' required>";
                    ?>
                </div>
                <button class="btn btn-success" type="submit">Enregistrer les changements</button>
            </form>
        </div>
    </div>
</div>