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

	img{
		border:2px solid green;
		overflow: auto;
		float: left;
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
			</tr>
		</table>
	</nav>
</div>
	<?php
		
	?>
</div>
</body>
</html>