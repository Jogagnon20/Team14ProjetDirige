<?php 
	include __DIR__ . "/HTML/masterpage.php";
?>

<!DOCTYPE html>
<html>
<header> 
<style>
	.imgDetails{
		border: 2px solid yellow;
		float: right;
		overflow: auto;
	}
	.smallIcon{
		width: 20px;
		height: 20px;
	}
</style>
</header>
<body>
<div>	
		<div>
		<h2>Détails des spectacles à venir</h2>
		<div>
			<img class="rounded"  width="304" height="236" src="https://www.ilesoniq.com/uploads/ilesoniq/poster/ileSoniq20_PosterOfficiel-FR.jpg?v=e4d6dc59b565193b049f183ee7a05ea3" alt="Ile Soniq">
			<button class="imgDetails" onclick="showDetails('spectacle1')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un premier test</span>
		</div>
		<div class="hiddenDiv" id="spectacle1">
				Détails spectacle
				<button><a href="panier.php?id=spectacle1">Acheter</a></button>
		</div>

		<br>

		<div>
			<img class="rounded"  width="304" height="236" src="https://upload.wikimedia.org/wikipedia/fr/thumb/1/1c/Logo_Cirque_du_Soleil.svg/1200px-Logo_Cirque_du_Soleil.svg.png" alt="Cirque du Soleil">
			<button class="imgDetails" onclick="showDetails('spectacle2')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un deuxieme test</span>
		</div>
		<div class="hiddenDiv" id="spectacle2">
			Détails spectacle
			<button><a href="panier.php">Acheter</a></button>
		</div>

		<br>

		<div>
			<img class="rounded"  width="304" height="236" src="https://storage.quebecormedia.com/v1/dynamic_resize/sws_path/amq-prod/50143c49-3a40-490d-ba6f-db488b640b20_AMQ-N-2x1_WEB.jpg?quality=80&size=1200x&version=7" alt="Spectacle Céline Dion">
			<button class="imgDetails" onclick="showDetails('spectacle3')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un troisieme test</span>
		</div>
		<div class="hiddenDiv" id="spectacle3">
			Détails spectacle
			<button><a href="panier.php">Acheter</a></button>
		</div>

		<br>

		<div>
			<img class="rounded"  width="304" height="236" src="https://lezenithsteustache.ca/uploads/spectacles/2.png" alt="Spectacle 4">
			<button class="imgDetails" onclick="showDetails('spectacle4')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un quatrieme test</span>
		</div>
		<div class="hiddenDiv" id="spectacle4">
			Détails spectacle
			<button><a href="panier.php">Acheter</a></button>
		</div>

		</div>
		<div>
		<h2>Spectacles déjà regardés</h2>
		<span>
			<img class="rounded"  width="304" height="236" src="https://www.ilesoniq.com/uploads/ilesoniq/poster/ileSoniq20_PosterOfficiel-FR.jpg?v=e4d6dc59b565193b049f183ee7a05ea3" alt="Ile Soniq">
			<img class="rounded"  width="304" height="236" src="https://upload.wikimedia.org/wikipedia/fr/thumb/1/1c/Logo_Cirque_du_Soleil.svg/1200px-Logo_Cirque_du_Soleil.svg.png" alt="Cirque du Soleil">
			<img class="rounded"  width="304" height="236" src="https://storage.quebecormedia.com/v1/dynamic_resize/sws_path/amq-prod/50143c49-3a40-490d-ba6f-db488b640b20_AMQ-N-2x1_WEB.jpg?quality=80&size=1200x&version=7" alt="Spectacle Céline Dion">
			<img class="rounded"  width="304" height="236" src="https://lezenithsteustache.ca/uploads/spectacles/2.png" alt="Show d'humour">
		</span>
		</div>
		<div>
		</div>
	<?php
		
	?>
</div>
<script>
	function showDetails(id){
		var element = document.getElementById(id);
		element.classList.toggle("showDiv");
		element.classList.toggle("hiddenDiv");
	}
</script>
</body>
</html>