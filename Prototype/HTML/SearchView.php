<h1 class="my-4">Résultat de recherche</h1>
<?php
$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
$tabRecherche = array();
$recherche = ($_GET["search"]);
if (isset($_GET['RechercheAvance'])) {
  $rechercheAvance = ($_GET["RechercheAvance"]);
} else {
  $rechercheAvance = "NomSpectacle";
}

$Categories = array();
$i = 0;
foreach ($_GET as $item) {
  if ($i > 1) {
    array_push($Categories, $item);
  }
  $i++;
}
if (empty($recherche) && $rechercheAvance !== "Categorie") {
  $mybd2 = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
  $test = $mybd2->query("CALL BaseSortSpectacles");
  while ($val = $test->fetch(PDO::FETCH_ASSOC)) {
    array_push($tabRecherche, $val['idSpectacle']);
  }
} else {
  if ($rechercheAvance === "NomSpectacle") {
    
    $resultatSpectacles = $mybd->prepare("CALL SelectForNomSpectacles(?)");
    $resultatSpectacles->bindParam(1, $recherche);
    $resultatSpectacles->execute();
    while ($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)) {
      array_push($tabRecherche, $donnees['idSpectacle']);
    }
    $resultatSpectacles->closeCursor();
  }
  if ($rechercheAvance === "NomSalle") {
    $stmt = $mybd->prepare("CALL SelectSortedSalles(?)");
    $stmt->bindParam(1, $recherche);
    $stmt->execute();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($tabRecherche, $donnees['idSpectacle']);
    }
    $stmt->closeCursor();
  }
  if ($rechercheAvance === "Categorie") {
    $resultatSpectacles = $mybd->query("CALL SelectForCategoriesSpectacles");
    while ($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)) {
      foreach ($Categories as $item) {
        if ($item === $donnees['idCategorie']) {
          array_push($tabRecherche, $donnees['idSpectacle']);
        }
      }
    }
    $resultatSpectacles->closeCursor();
  }
  if ($rechercheAvance === "NomArtiste") {

    $resultatSpectacles = $mybd->query("CALL SelectForArtistesSpectacles");
    while ($donnees = $resultatSpectacles->fetch(PDO::FETCH_ASSOC)) {
      if (strpos(strtolower($donnees['artiste']),  strtolower($recherche)) !== false) {
        array_push($tabRecherche, $donnees['idSpectacle']);
      }
    }
    $resultatSpectacles->closeCursor();
  }
  if (count($tabRecherche) === 0) {
    echo "Aucun résultat trouvé...";
  }
}
if ($rechercheAvance == "Categorie") {
  foreach ($Categories as $categorie) {
    echo "<div><h3>";
    AfficherCategorie($categorie);
    echo "</h3>";
    AfficherSpectacleAvecCategorie($tabRecherche, $categorie);
  }
  echo "<div/>";
} else {
  AfficherSpectacle($tabRecherche);
}

function AfficherAchat($id)
{
  if (isset($_SESSION["Client"])) {
    echo "<a href='Achats.php?id=$id' style='float:right'>
          <button>
            Achat
          </button>
        </a>";
  }
}
function AfficherSpectacle($tabRecherche)
{
  $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
  foreach ($tabRecherche as $item) {
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1, $item);
    $stmt->execute();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $id = $donnees['idSpectacle'];
      $titre = $donnees['nomSpectacle'];
      $artiste = $donnees['artiste'];
      $GUID = $donnees['GUID'];
      $prix = $donnees['prix_de_base'];
      echo "
        <div class='grid-container-Search'>
          <div style='grid-area: Picture;'>
            <a href='DetailSpectacle.php?id=$id'><img class='rounded' width='304' height='236' src='Images/$GUID' alt='$titre'></a>
          </div>
          <div style='grid-area: Title;'>
            <span style='font-size:30px; align-content:center'><b>$titre</b>";
      AfficherAchat($id);
      echo "</span><br>
          </div>
          <div style='grid-area: Description;'>
            <span>Fait par: $artiste</span><br>
            <span>Prix de base: $prix$</span><br> 
          </div>
        </div>
        <hr>";
    }
  }
}

function AfficherSpectacleAvecCategorie($tabRecherche, $categorie)
{
  $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
  foreach ($tabRecherche as $item) {
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1, $item);
    $stmt->execute();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $idCategorie = $donnees['idCategorie'];
      $id = $donnees['idSpectacle'];
      $titre = $donnees['nomSpectacle'];
      $artiste = $donnees['artiste'];
      $GUID = $donnees['GUID'];
      $prix = $donnees['prix_de_base'];
      if ($idCategorie === $categorie) {
        echo "
        <div class='grid-container-Search'>
          <div style='grid-area: Picture;'>
            <a href='DetailSpectacle.php?id=$id'><img class='rounded' width='304' height='236' src='Images/$GUID' alt='$titre'></a>
          </div>
          <div style='grid-area: Title;'>
            <span style='font-size:30px; align-content:center'><b>$titre</b>";
        AfficherAchat($id);
        echo "</span><br>
          </div>
          <div style='grid-area: Description;'>
            <span>Fait par: $artiste</span><br>
            <span>Prix de base: $prix$</span><br> 
          </div>
        </div>
        <hr>";
      }
    }
  }
}

function AfficherCategorie($idCategorie)
{
  switch ($idCategorie) {
    case 'HUM':
      echo "<h3>Spectacle d'Humour</h3>";
      break;
    case 'MAG':
      echo '<h3>Spectacle de Magie</h3>';
      break;
    case 'DAN':
      echo '<h3>Spectacle de Danse</h3>';
      break;
    case 'MUS':
      echo '<h3>Spectacle de Musique</h3>';
      break;
    case 'DRA':
      echo '<h3>Spectacle de Drame</h3>';
      break;
  }
}
?>
<script>
  function showDetails(id) {
    var element = document.getElementById(id);
    element.classList.toggle("showDiv");
    element.classList.toggle("hiddenDiv");
  }
</script>