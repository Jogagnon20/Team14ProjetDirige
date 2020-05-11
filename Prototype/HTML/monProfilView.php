<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Mon Profil</h2>
            <form method = "post" action = "./DOMAINLOGIC/profil.dom.php">
                <div class="form-group">
                    <label for="email">Courriel</label>
                    <?php
                        $clientInfo = get_object_vars($_SESSION['Client']);
                    ?>
                </div>
                <button class="btn btn-success" type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
</div>