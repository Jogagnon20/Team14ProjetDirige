<h2>Détails des spectacles à venir</h2>
<?php 
	try
	{
		$Spectacles = array();
		$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
		$resultat = $mybd->query("call BaseSortSpectacles");
		while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			$idCategorie = $donnees['idCategorie'];
			$id = $donnees['idSpectacle'];
			$description = $donnees['description'];
			$titre = $donnees['nomSpectacle'];
			$artiste = $donnees['artiste'];
			$GUID = $donnees['GUID'];
			$prix = $donnees['prix_de_base'];
			echo "
				<div class='grid-container'>
					<div style='grid-area: Picture;'>
						<a href='DetailSpectacle.php?id=$id'><img class='rounded' width='304' height='236' src='Images/$GUID' alt='$titre'></a>
					</div>
					<div style='grid-area: title;'>
						<span style='font-size:30px; align-content:center'><b>$titre</b></span>
						<a href='Achats.php'>Achat</a>
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
		$resultat->closeCursor();
	}
	catch (PDOException $e)
	{
		echo('Erreur de connexion: ' . $e->getMessage());
		exit();
	}
	$mybd=null;

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