<h1>
    Achat 
</h1>
<?php
    $id = $_GET['id'];
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14'); 
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
        $idCategorie = $donnees['idCategorie'];
        $id = $donnees['idSpectacle'];
        $description = $donnees['description'];
        $titre = $donnees['nomSpectacle'];
        $artiste = $donnees['artiste'];
        $GUID = $donnees['GUID'];
        $prix = $donnees['prix_de_base'];

        echo "
        <div style='display:grid; grid-template-columns: 50% 50%;'>
            <div>
                <img class='rounded' width='80%' height='auto' src='Images/$GUID' alt='$titre'>
            </div>
            <div>
                <h3>$titre</h3>
                <label> Salles de spectacle</label>
                <form action='Panier.php'>
                <div>
                <select id='salles' onChange='DisplaySelect()' name='salle'><option disabled selected>Choisir une Salle</option>";
                foreach(GetSallesSpectacles($id) as $item){
                    echo "<option value='$item' prix='$prix'>$item</option>";
                }
                echo "</select><hr>";
                
                foreach(GetSallesSpectacles($id) as $item2){
                    echo "
                        <div style='display:none' id='$item2'>
                        <label> Section de la salle<br> <b>$item2</b></label>
                        <select id='section$item2' name='section' onChange='CalculerPrix()'><option disabled selected>Choisir une section</option>";
                        foreach(GetSectionsSalles($item2) as $sections)
                        {
                            $prixSection = $sections['fm_prix'];
                            $couleur = $sections['Couleur'];
                            echo "<option value='$couleur' prix='$prixSection'>$couleur</option>";
                        }
                        echo "</select><hr>
                        
                        <label> Heure du Spectacle <br> </label>
                        <select id='heure' name='date'><option disabled selected>Choisir une heure</option>";
                        foreach(GetHeureSpectacle($id,$item2) as $heure)
                            {
                                echo "<option value='$heure'>$heure</option>";
                            }
                        echo "</select><hr></div>";
                }
                echo "
                </div><div>
                <label for='nbBillet'>Nombre de billets <i>(max 100)</i></label>    
                <input id='nbBillet' type='number' name='nbBillets' step='1' max='100' min='0' value='0' onChange='CalculerPrix()'>
            </div>
            <hr>
            <div style='display:grid; grid-template-columns:25% 50%'>
                <div>Prix de la commande:<br> <span id='Prix'>0.00 </span>$
                </div>
                <div>
                    <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>";
    }
    function GetSectionsSalles($nomSalles){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
        $val = $mybd->prepare("CALL GetSectionsParNomSalles(?)");
        $val->bindParam(1,$nomSalles);
        $val->execute();
        $sections = array();
        while($donnesSections = $val->fetch(PDO::FETCH_ASSOC)){
            array_push($sections, $donnesSections);
        }
        return $sections;
    }
    
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
    function GetHeureSpectacle($id, $sallesSpecatcle){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'in6vest14');
		$val = $mybd->prepare("CALL GetHeureSpectacleParSalle(?,?)");
        $val->bindParam(1,$id);
        $val->bindParam(2,$sallesSpecatcle);
		$val->execute();
		$DateParSpectacle = array();
		while($DonnesRepresentation = $val->fetch(PDO::FETCH_ASSOC)){
            array_push($DateParSpectacle, $DonnesRepresentation['Date']);
		}
		return $DateParSpectacle;
    }
?>
<script>
var prixSection;
var prixSpectacles;
$(document).ready(function(){
    ChercherPrixSpectacle()
});
function ChercherPrixSpectacle(){
    var x = document.getElementById('salles');
    prixSpectacles = parseFloat(x.options[1].getAttribute('prix'));
}

function DisplaySelect() {
  var x = document.getElementById("salles");
  var i;
  for(i=1;i<x.length;i++){
    document.getElementById(x.options[i].value).style.display = "none";
  }
  document.getElementById(x.value).style.display = "block";
}
function CalculerPrix() {
    var DivPrix = document.getElementById("Prix");
    var Spectacle = document.getElementById("salles");
    var section = document.getElementById("section"+Spectacle.value);
    var nbBillet = document.getElementById("nbBillet");
   
    ChercherPrixSections(section);
    if(!isNaN(prixSection)){
        prix = prixSection;
        prix = nbBillet.value*(prix+prixSpectacles);
        prix = AjusterPrix(prix);
        DivPrix.innerHTML = prix;
    }
    else{
        DivPrix.innerHTML = 0;
    }
}
function AjusterPrix(prix){
    var value = prix;
    for(var i = 6;i>0;i--){
        if(prix>=Math.pow(10,i)){
            value = value.toPrecision(i+3);
            break;
        }
    }
    return value;
}
function ChercherPrixSections(select){
    var i;
    for(i=1;i<select.length;i++){
        if(select.options[i].value == select.value){
            prixSection = parseFloat(select.options[i].getAttribute('prix'));
            
        }
    }
}
</script>