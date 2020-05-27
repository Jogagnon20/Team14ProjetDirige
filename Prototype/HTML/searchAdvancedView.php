<form class="form-inline my-2 my-lg-0" action="search.php">
    <div>
        <h1>Recherche Avancée</h1>
        <select onchange="showDetailsCategorie(this, '#typeCategorie')" name="RechercheAvance" class="form-control">
            <option value="NomSpectacle" selected>Nom du Spectacle</option>
            <option value="NomArtiste">Nom de l'artiste</option>
            <option value="NomSalle">Nom de salle</option>
            <option id='test' value="Categorie">Categorie</option>
        </select>
        <hr>
        <input type="text" name="search" placeholder="Recherche" id="text">
        <hr>
        <?php
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
        $resultatCategorie = $mybd->query("CALL SelectFromCategories");
        $i = 0;
        echo "<div style='display:none' id='typeCategorie'><h3>Liste de catégorie</h3>";
        while ($donnees = $resultatCategorie->fetch(pdo::FETCH_ASSOC)) {
            $data = $donnees['Description'];
            $idCategorie = $donnees['idCategorie'];
            echo "<input type='checkbox' name='nomCategorie$i' value='$idCategorie'>$data <hr>";
            $i++;
        }
        echo "</div>";
        ?>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </div>
</form>

<script>
    function showDetails(id) {
        var element = document.getElementById(id);
        element.classList.toggle("showDiv");
        element.classList.toggle("hiddenDiv");
    }

    $('select').on({
        "change": function() {
            choice = $(this).val();
            if (choice == "Categorie") {
                $("#typeCategorie").css("display", "block");
                $("#text").css("display", "none")
            } else {
                $("#typeCategorie").css("display", "none");
            }
        }
    });
</script>