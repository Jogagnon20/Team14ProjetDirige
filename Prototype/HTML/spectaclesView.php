<h2>Détails des spectacles à venir</h2>
<?php 
	try
	{
		$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
		$resultat = $mybd->query("call SelectFromSpectacles");
		while ($donnees = $resultat->fetch())
		{
			$id = $donnees[0];
			$description = $donnees[2];
			$titre = $donnees[6];
			$artiste = $donnees[3];
			$GUID = $donnees[5];
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
		$resultat->closeCursor();
	}
	catch (PDOException $e)
	{
		echo('Erreur de connexion: ' . $e->getMessage());
		exit();
	 }
	$mybd=null;
?>

<script>
	function showDetails(id){
		
		var element = document.getElementById(id);
		element.classList.toggle("showDiv");
		element.classList.toggle("hiddenDiv");
	}
</script>