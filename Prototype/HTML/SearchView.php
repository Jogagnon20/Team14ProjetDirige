<h1 class="my-4">Search results:</h1>
<?php
  $tabCategorie = array();
  $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14'); 
  $resultatCategorie = $mybd->query("CALL SelectFromCategories");
  while ($donnees = $resultatCategorie->fetch()){
    array_push($tabCategorie, strtolower($donnees[1]));
  }
  $resultatCategorie->closeCursor();


  $recherche = ($_GET["search"]);
  $rechercheAvance = ($_GET["RechercheAvance"]);

  if($rechercheAvance === 'Categorie'){
    $stmt = $mybd->prepare("CALL GetCategorieByDescription(?)");
    $stmt->bindParam(1,$recherche);
    $stmt->execute();
    if($res = $stmt->fetch()){
      $idCategorie = $res;
    }
  } 
  $stmt->closeCursor();
  $tabRecherche = array();
  $resultatSpectacles = $mybd->query("CALL SelectFromSpectacles");
  while ($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)){
    if($rechercheAvance === "NomSpectacle"){
      if(strpos($donnees['NomSpectacle'], $recherche) !== false){
        array_push($tabRecherche,$donnees[0]);
      }
    }
    if($rechercheAvance === "Categorie"){
      if($idCategorie['idCategorie'] === $donnees['idCategorie']){
        array_push($tabRecherche,$donnees['idSpectacle']);
      }
    }
    if($rechercheAvance === "NomArtiste"){
      if(strpos( $donnees[3],$recherche) !== false){
        array_push($tabRecherche,$donnees['idSpectacle']);
      }
    }
    if($rechercheAvance === "Description"){
      if(strpos($donnees[2],$recherche) !== false){
        array_push($tabRecherche,$donnees['idSpectacle']);
      }
    }
  }
  $resultatSpectacles->closeCursor();

  foreach($tabRecherche as $item){
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1,$item);
    $stmt->execute();
    while($donnees = $stmt->fetch()){
      $id = $donnees['idSpectacle'];
      $description = $donnees['description'];
      $titre = $donnees['nomSpectacle'];
      $artiste = $donnees['artiste'];
      $GUID = $donnees['GUID'];
    
      echo "
      <div style='display:grid; grid-template-columns: 1fr 1fr;'>
        <div>
          <img class='rounded' width='304' height='236' src='Images/$GUID' alt='$titre'>
        </div>
        <div>
          <button style='border: 2px solid yellow;float: right;overflow: auto;'
            onclick="."showDetails('spectacle$id')".">
            <img style='border: 2px solid yellow;float: right;overflow: auto; width: 20px;height: 20px;'src='Images/triangle.png' alt='plus'>
          </button>
          <span style='fontSize:14'><b>$titre</b></span><br>
          <span>Fait par:$artiste</span><br>
          <span>Salles: Cente Bell</span><br> 
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