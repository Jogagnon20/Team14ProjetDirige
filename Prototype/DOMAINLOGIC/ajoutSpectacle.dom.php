<?php
    //include "../CLASSES/USER/user.php";
    include "../UTILS/formvalidator.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();


    //prendre les variables du Post
    $nom = $_POST["nom"];
    $category = $_POST["categorie"];
    $prix = $_POST["prix"];
    $affiche = $_POST["affiche"];
    $descriptionn = $_POST["description"];
    $artiste = $_POST["artiste"];
    $i = 0;
    $y = 0;
    $salles = array();
    $dates = array();
    while(isset($_POST["salle" . $i])){
        array_push($salles, $_POST["salle" . $i]);
        array_push($dates, $_POST["time" . $i]);
        $i++;
    }

    
 
     $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
     $stmt1 = $mybd->prepare("CALL InsertSpectacle(?,?,?,?,?,?)");
    //  // lier les paramètres
     $stmt1->bindParam(1, $nomSpectacle);
     $stmt1->bindParam(2, $idCategorie);
     $stmt1->bindParam(3, $description);
     $stmt1->bindParam(4, $artiste);
     $stmt1->bindParam(5, $prix_de_base);
     $stmt1->bindParam(6, $Guid);
    
      // affectation de valeurs aux paramètres

     $nomSpectacle = $nom;
     $idCategorie = $category;
     $description = $descriptionn;
     $artiste = $artiste;
     $prix_de_base = $prix;
     $Guid = $affiche;
      // executer la requête
     $stmt1->execute();
     if ($donnees = $stmt1->fetch())
     {
        $idSpectaclee = $donnees[0];
     } 

     $mybd=null;

     while(isset($_POST["salle" . $y])){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
        $stmt1 = $mybd->prepare("CALL InsertRepresentations(?,?,?)");
       //  // lier les paramètres
        $stmt1->bindParam(1, $idSpectacle);
        $stmt1->bindParam(2, $idSalle);
        $stmt1->bindParam(3, $date);
   
       
         // affectation de valeurs aux paramètres
        $idSpectacle = $idSpectaclee;
        $idSalle = $salles[$y];
        $date = $dates[$y];
   
         // executer la requête
        $stmt1->execute();
           
   
        $mybd=null;
        $y++;
    }
    

    header("Location: ../AjoutSpectacle.php");
    die();
?>
