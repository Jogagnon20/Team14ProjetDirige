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
    <h2>Spectacle à acheter</h2>
    <span>        
        <img class="imgSpectacles" alt="spectacle1"> 
    </span>
    <span class="imgDetails">
        <select  id="spectacle" name="spectacle">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>

        <button>Ajouter</button>
    </span>
    
</div>
<div class="gridBottom">
    <h2>Panier</h2>
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