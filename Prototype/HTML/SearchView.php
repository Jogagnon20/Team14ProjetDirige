<h1 class="my-4">Search results:</h1>
<?php
  $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14'); 
  $tabRecherche = array();
  $recherche = ($_GET["search"]);
  if(isset($_GET['RechercheAvance'])){
    $rechercheAvance = ($_GET["RechercheAvance"]);
  }
  else{
    $rechercheAvance = "NomSpectacle";
  }
  $Categories = array();
  $i = 0;
  foreach($_GET as $item){
    if($i>1){
      array_push($Categories,$item);
    }
    $i++;
  }
  if(empty($recherche) && $rechercheAvance !== "Categorie" ){
    $mybd2 = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14'); 
    $test = $mybd2->query("CALL BaseSortSpectacles");
    while ($val = $test->fetch(PDO::FETCH_ASSOC)){
      array_push($tabRecherche, $val['idSpectacle']);
    }
  }
  else {
    if($rechercheAvance === "NomSpectacle"){
      $resultatSpectacles = $mybd->prepare("CALL SelectForNomSpectacles(?)");
      $resultatSpectacles->bindParam(1,$recherche);
		  $resultatSpectacles->execute();
      while($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)){
        array_push($tabRecherche,$donnees['idSpectacle']);
      }
      $resultatSpectacles->closeCursor();
    }
    if($rechercheAvance === "NomSalle"){
      $stmt = $mybd->prepare("CALL SelectSortedSalles(?)");
      $stmt->bindParam(1,$recherche);
      $stmt->execute();
      while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($tabRecherche, $donnees['idSpectacle']);
      }
      $stmt->closeCursor();
    }
    if($rechercheAvance ==="Categorie"){
      $resultatSpectacles = $mybd->query("CALL SelectForCategoriesSpectacles");
      while($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)){
        foreach($Categories as $item){
          if($item === $donnees['idCategorie']){
            array_push($tabRecherche,$donnees['idSpectacle']);
          }
        }
      }
      $resultatSpectacles->closeCursor();
    }
    if($rechercheAvance === "NomArtiste"){
      $resultatSpectacles = $mybd->query("CALL SelectForArtistesSpectacles");
      while($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)){
        if(strpos( strtolower($donnees['artiste']),  strtolower($recherche)) !== false){
          array_push($tabRecherche,$donnees['idSpectacle']);
        }
      }
      $resultatSpectacles->closeCursor();
    }
    if(count($tabRecherche)===0){
      echo "Aucun résultat trouvé...";
    }
  }
  foreach($tabRecherche as $item){
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1,$item);
    $stmt->execute();
    while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
      $sallesParSpectacle = array();
			for($i = 0;$i<count($donnees);$i++){
		  		$val = $mybd->prepare("CALL SelectForSallesSpectacles(?)");
		  		$val->bindParam(1,$i);
		  		$val->execute();
		  		while($donnesSalles = $val->fetch(PDO::FETCH_ASSOC)){
					array_push($sallesParSpectacle, $donnesSalles['nomSalles']);
		  		}
			}
      $idCategorie = $donnees['idCategorie'];
      $id = $donnees['idSpectacle'];
      $description = $donnees['description'];
      $titre = $donnees['nomSpectacle'];
      $artiste = $donnees['artiste'];
      $GUID = $donnees['GUID'];
      $prix = $donnees['prix_de_base'];
    // <button style='border: 2px solid yellow;float: right;overflow: auto;'
    //         onclick="."showDetails('spectacle$id')".">
    //         <img style='border: 2px solid yellow;float: right;overflow: auto; width: 20px;height: 20px;'src='Images/triangle.png' alt='plus'>
    //       </button>
      echo "
      <div class='grid-container'>
        <div style='grid-area: Picture;'>
          <a href='DetailSpectacle.php?id=$id'><img class='rounded' width='304' height='236' src='Images/$GUID' alt='$titre'></a>
        </div>
        <div style='grid-area: title;'>
          <span style='font-size:30px; align-content:center'><b>$titre</b></span><br>
        </div>
        <div style='grid-area: description;'>
          <span>Fait par: $artiste</span><br>
          <span>Prix de base: $prix$</span><br> 
          <span>Categorie: ";
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
            echo "</span>
        </div>
        <div style='grid-area: Salles;'>
          <span>Il prendra place au:<br>
          <ul>";
					foreach(GetSallesSpectacles($id) as $item){
						echo "<li>$item </li>";
					}
					echo" </ul></span><br> 
        </div>
      </div>
      <div class='hiddenDiv' id='spectacle$id'>
        Détails spectacle
        <button><a href='panier.php?id=spectacle$id'>Acheter</a></button>
      </div>
      <hr>";
      }
    }
    function GetSallesSpectacles($id){
      $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
      $val = $mybd->prepare("CALL SelectForSallesSpectacles(?)");
      $val->bindParam(1,$id);
      $val->execute();
      $sallesParSpectacle = array();
      while($donnesSalles = $val->fetch(PDO::FETCH_ASSOC)){
        array_push($sallesParSpectacle, $donnesSalles['nomSalles']);
      }
      return $sallesParSpectacle;
    }
  
  
?>
<script>
	function showDetails(id){
		
		var element = document.getElementById(id);
		element.classList.toggle("showDiv");
		element.classList.toggle("hiddenDiv");
	}
</script>