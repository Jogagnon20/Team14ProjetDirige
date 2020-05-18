<?php 
    $id = $_GET['id'];
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
        $idCategorie = $donnees['idCategorie'];
        $id = $donnees['idSpectacle'];
        $description = $donnees['description'];
        $titre = $donnees['nomSpectacle'];
        $artiste = $donnees['artiste'];
        $GUID = $donnees['GUID'];
        $prix = $donnees['prix_de_base'];

        echo 
        "<div style='display:grid; grid-template-columns: 50% 50%;'>
            <div>
                <img class='rounded' width='608' height='472' src='Images/$GUID' alt='$titre'>
            </div>
            <div style='text-align:center'>   
                <h1>$titre</h1> <hr>
                Salles + nbPacesParSalle: <a href='Achats.php?id=$id'>Achat</a>
                <hr>
                Categorie: ";
                 switch($idCategorie){
                    case 'HUM':
                        echo 'Humour';
                        break;
                    case 'MAG':
                        echo 'Magie';
                        break;
                    case 'DAN':
                        echo 'Danse';
                        break;
                    case 'MUS':
                        echo 'Musique';
                        break;
                    case 'DRA':
                        echo 'Drame';
                        break;
                }
                echo "<hr>
                Petite description <br>
                $description
            </div>
        </div>";

    }
?>
