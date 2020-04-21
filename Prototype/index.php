<!DOCTYPE html>
<html>
<header> 
<style>
	.gridHeader {
		grid-area : header;
		border:1px solid purple;
		margin: auto;
		padding: 10px;
	}
	.gridFooter {
		grid-area : Footer;
		border: 1px dashed black
	}
	.gridMain {
		grid-area : Main;
		border: 1px solid red;
		margin:right;
	}
	.gridBottom {
		grid-area : Bottom;
		border: 1px solid aqua
	}
	
	.gridContainer {
		display: grid;
		grid-template-areas : 
		'header	header 	header 	header 	header'
		'Main	Main	Main	Main 	Main'
		'Main	Main	Main	Main 	Main'
		'Main	Main	Main	Main 	Main'
		'Main	Main	Main	Main 	Main'
		'Main	Main	Main	Main 	Main'
		'Bottom	Bottom	Bottom	Bottom	Bottom'
		'Bottom	Bottom	Bottom	Bottom	Bottom'
		'Footer	Footer	Footer	Footer	Footer';
		grid-gap : 10px;
		padding : 10px;
	}

	td{
		border: 1px solid pink;
		border-collapse: collapse;
		padding: 10px;
	}

	.imgSpectacles{
		margin-left: 10px;
		border:2px solid green;
		overflow: auto;
		float: left;
	}

	.imgDetails{
		border: 2px solid yellow;
		float: right;
		overflow: auto;
	}
	.smallIcon{
		width: 20px;
		height: 20px;
	}

	.hiddenDiv{
		display: none;
	}

	.showDiv{
		display: show;
	}
</style>
</header>
<body>
<div class="gridContainer">
	<nav class="gridHeader">
		<table style="align-items: center; border: solid, black, 1px">
			<tr style="border-style: solid">
				<td><a href="index.php">Acceuil</a></td>
				<td><a href="profiles.php">Profile</a></td>
				<td><a href="panier.php">Panier</a></td>
				<td>Logout</td>
				<td>					
					<input type="search">
					<button><img class="smallIcon" src="Images/zoom-icon.png" alt="Image loupe"></button>
				</td>
			</tr>
		</table>
	</nav>
		<div class="gridMain">
		<h2>Détails des spectacles à venir</h2>
		<div>
			<img class="imgSpectacles" src="test" alt="Spectacle 1">
			<button class="imgDetails" onclick="showDetails('spectacle1')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un premier test</span>
		</div>
		<div class="hiddenDiv" id="spectacle1">
				Détails spectacle
				<button><a href="panier.php?id=spectacle1">Acheter</a></button>
		</div>

		<br>

		<div>
			<img class="imgSpectacles" src="test" alt="Spectacle 2">
			<button class="imgDetails" onclick="showDetails('spectacle2')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un deuxieme test</span>
		</div>
		<div class="hiddenDiv" id="spectacle2">
			Détails spectacle
			<button><a href="panier.php">Acheter</a></button>
		</div>

		<br>

		<div>
			<img class="imgSpectacles" src="test" alt="Spectacle 3">
			<button class="imgDetails" onclick="showDetails('spectacle3')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un troisieme test</span>
		</div>
		<div class="hiddenDiv" id="spectacle3">
			Détails spectacle
			<button><a href="panier.php">Acheter</a></button>
		</div>

		<br>

		<div>
			<img class="imgSpectacles" src="test" alt="Spectacle 4">
			<button class="imgDetails" onclick="showDetails('spectacle4')"><img class="smallIcon imgDetails" src="Images/triangle.png" alt="plus"></button>
			<span>Voici un quatrieme test</span>
		</div>
		<div class="hiddenDiv" id="spectacle4">
			Détails spectacle
			<button><a href="panier.php">Acheter</a></button>
		</div>

		</div>
		<div class="gridBottom">
		<h2>Spectacles déjà regardés</h2>
		<span>
			<img src="Spectacle 12" alt="Spectacle 12">
			<img src="Spectacle 13" alt="Spectacle 13">
			<img src="Spectacle 14" alt="Spectacle 14">
			<img src="Spectacle 15" alt="Spectacle 15">
			<img src="Spectacle 16" alt="Spectacle 16">
		</span>
		</div>
		<div class="gridFooter">
		Footer // to do with masterpage
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