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
    }
    $mybd = null;
        echo 
        "<div style='display:grid; grid-template-columns: 50% 50%;'>
            <div>
                <img class='rounded' width='608' height='472' src='Images/$GUID' alt='$titre'>
            </div>
            <div style='text-align:center'>   
                <h1 style='display:inline'>$titre</h1> &nbsp <h1 style='display:inline'> $prix $</h1><hr>
                <h4 style='display:inline'> Salles qui présentes ce spectacle: </h4> <a href='Achats.php?id=$id' style='float:right'>
                <button>
                    Achat
                </button>
                </a> <br> <br> 
                <ul style='display: inline-block;'>
                ";
              
                $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
		        $stmt = $mybd->prepare("CALL SelectForSallesSpectacles(?)");
		        $stmt->bindParam(1,$id);
		        $stmt->execute();

		        while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<li style='text-align: justify'>".$donnees['nomSalles']." ".$donnees['Capacite']. " places </li>"; 
		        }
		        echo"
                </ul>
                <hr>
                <h4 style='display:inline'>Categorie:</h4> ";
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
                <h4 style='display:inline'>Artiste: </h4>
                $artiste
                <hr>
                <h4>Petite description</h4>
                $description
            </div>
        </div>";

   
?>
