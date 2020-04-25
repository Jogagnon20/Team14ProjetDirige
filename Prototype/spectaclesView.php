</div>
	<?php
		echo "Affichage de différents spectacles avec l'accès à la BD et intermédiaire d'une classe en php";
		
		echo "Titre:    Auteur:     Affiche   etc...";

		try{

			$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'dbEquipe14','in6vest14');
			
			echo ('affichage de spectacles') . '<br />';
			$stmt1 = $mybd->prepare("call SelectAllFromTable");

			$stmt1->execute();
			while ($donnees = $stmt1->fetch())
			{
			echo $donnees[0] . $donnees[1] . $donnees[2]. $donnees[3]. $donnees[4]. '<br />';
			}
			echo ($stmt1->rowCount());
			$stmt1->closeCursor();
		}
		 catch (PDOException $e)
		{
			echo('Erreur de connexion: ' . $e->getMessage());
			exit();
		}
		$mybd=null;
		?>
	?>
</div>