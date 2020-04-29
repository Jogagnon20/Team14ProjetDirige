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
  
  if(empty($recherche) && strpos($rechercheAvance,"Categorie")){
    $test = $mybd->query("CALL SelectFromSpectacles");
    while ($val = $test->fetch(PDO::FETCH_ASSOC)){
      array_push($tabRecherche, $val['idSpectacle']);
    }
  }
  else {
    if($rechercheAvance === "nomSalle"){
      $resultatSpectacles = $mybd->query("CALL SelectForNomSpectacles");
      while($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)){
        if(strpos($donnees['nomSpectacle'],$recherche) !== false){
          array_push($tabRecherche,$donnees['idSpectacle']);
        }
      }
      $resultatSpectacles->closeCursor();
    }
    if($rechercheAvance === "nomSalle"){
      $stmt = $mybd->prepare("CALL SelectSortedSalles(?)");
      $stmt->bindParam(1,$recherche);
      $stmt->execute();
      while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($tabRecherche, $donnees['idSpectacle']);
      }
      $resultatSpectacles->closeCursor();
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
        if(strpos($donnees['artiste'],$recherche) !== false){
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

      $id = $donnees['idSpectacle'];
      $description = $donnees['description'];
      $titre = $donnees['nomSpectacle'];
      $artiste = $donnees['artiste'];
      $GUID = $donnees['GUID'];
      $prix = $donnees['prix_de_base'];
    
      echo "
      <div style='display:grid; grid-template-columns: 1fr 1fr;'>
        <div>
          <a href='DetailSpectacle.php?id=$id'><img class='rounded' width='304' height='236' src='Images/$GUID' alt='$titre'></a>
        </div>
        <div>
          <button style='border: 2px solid yellow;float: right;overflow: auto;'
            onclick="."showDetails('spectacle$id')".">
            <img style='border: 2px solid yellow;float: right;overflow: auto; width: 20px;height: 20px;'src='Images/triangle.png' alt='plus'>
          </button>
          <span style='fontSize:14'><b>$titre</b></span><br>
          <span>Fait par:$artiste</span><br>
          <span>Salles: ";
					foreach($sallesParSpectacle as $item){
						echo $item;
					}
					echo"</span><br> 
          <span>À partir de $prix$</span><br> 
          <span>$description</span>
          
        </div>
      </div>
      <div class='hiddenDiv' id='spectacle$id'>
        Détails spectacle
        <button><a href='panier.php?id=spectacle$id'>Acheter</a></button>
      </div>
      <hr>";
      }
    }
    
  
  
?>
<script>
	function showDetails(id){
		
		var element = document.getElementById(id);
		element.classList.toggle("showDiv");
		element.classList.toggle("hiddenDiv");
	}
</script>