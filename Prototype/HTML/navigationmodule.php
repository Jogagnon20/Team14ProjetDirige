<?php       
    if(isset($_SESSION["Client"])){
        if(isset($_SESSION["Admin"])){
            $navLinks = '            
            <li class="nav-item">
                <a class="nav-link" href="monProfil.php">Mon Profil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ajoutSpectacle.php">Ajout Spectacle</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="DOMAINLOGIC/logout.dom.php">Déconnexion</a>
            </li>
            ';            
        }
        else{            
            $navLinks = '            
            <li class="nav-item">
                <a class="nav-link" href="monProfil.php">Mon Profil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="DOMAINLOGIC/logout.dom.php">Déconnexion</a>
            </li>
            ';
        }
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
            <input class="form-control mr-sm-2" type="text" placeholder="Recherche" name="search">
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
            <ul class="navbar-nav">            
                <li class="nav-item">
                    <a class="nav-link" href="AdvancedSearch.php">Recherche Avancé</a>
                </li>
            </ul>
        </form>
        <ul class="navbar-nav mr-auto, text-right">
            <?php
                echo $navLinks;
            ?>
        </ul>
    </div>
</nav>
