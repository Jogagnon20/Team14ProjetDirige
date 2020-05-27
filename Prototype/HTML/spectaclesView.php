<h2>Détails des spectacles à venir</h2>
<?php 
	require "./UTILS/imageHelper.php";
	$imageHelper = new ImageHelper('./Images','No_image.png') ;
	try
	{
		$Spectacles = array();
		$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
		$resultat = $mybd->query("call BaseSortSpectacles");
		echo "
				<div class='grid-container'>";
		while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			$idCategorie = $donnees['idCategorie'];
			$id = $donnees['idSpectacle'];
			$description = $donnees['description'];
			$titre = $donnees['nomSpectacle'];
			$artiste = $donnees['artiste'];
			$GUID = $donnees['GUID'];
			$photoURL = $imageHelper->getURL($GUID);
			if($photoURL[9] != '{'){
				$photoURL = "Images/$GUID";
			}
			$prix = $donnees['prix_de_base'];
			echo "
				<div style='display:grid; grid-template-columns: 60% 40%; padding-left:10px'>
					<div>
						<div>
							<b style='font-size:30px; align-content:center'>
								$titre
							</b> 
							<a href='Achats.php?id=$id' style='float:right'>";AfficherAchat($id);
								
							echo "</a>
						</div>
						<a href='DetailSpectacle.php?id=$id'>
						
							<img class='rounded' width='304' height='236' src='$photoURL' alt='$titre'>
							
						</a>
					</div>
					<div style='font-size:22px'>
					<br>
					<br>
					<br>
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
					</div>";
		}
		echo "</div>";
		$resultat->closeCursor();
	}
	catch (PDOException $e)
	{
		echo('Erreur de connexion: ' . $e->getMessage());
		exit();
	}
	$mybd=null;

	function AfficherAchat($id)
{
  if (isset($_SESSION["idClient"])) {
    echo "<a href='Achats.php?id=$id' style='float:right'>
          <button>
            Achat
          </button>
        </a>";
  }
}
	function GetSallesSpectacles($id){
		$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
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
