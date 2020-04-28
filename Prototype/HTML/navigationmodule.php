<?php   
// isset($_SESSION["Client"])
    if(isset($_SESSION["Client"])){
        $navLinks = '
        <li class="nav-item">
            <a class="nav-link" href="DOMAINLOGIC/logout.dom.php">Déconnexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Mon Profile.php">Mon Profile</a>
        </li>
        ';
    }
    else{
    $navLinks = '
    <li class="nav-item">
        <a class="nav-link" href="login.php">Connexion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">Inscription</a>
    </li>';
    }
?>


<nav class="navbar navbar-expand-md bg-dark navbar-dark mb-4 text-capitalize">
    <div class="container collapse navbar-collapse">
        <ul class="navbar-nav">            
            <li class="nav-item">
                <a class="nav-link" href="spectacles.php">Spectacles</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
            <select name="RechercheAvance" class="form-control">
                <option value="NomSpectacle" selected>Nom du Spectacle</option>
                <option value="NomArtiste">Nom de l'artiste</option>
                <option value="Description">Description</option>
                <optgroup label="Categorie">
                    <option value="Categorie|HUM">Humour</option>
                    <option value="Categorie|DAN">Dance</option>
                    <option value="Categorie|THE">Théâtre</option>
                    <option value="Categorie|MAG">Magie</option>
                    <option value="Categorie|MUS">Musique</option>
                </optgroup>
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
        </form>
        <ul class="navbar-nav mr-auto, text-right">
            <?php
                echo $navLinks;
            ?>
        </ul>        
    </div>
</nav>
