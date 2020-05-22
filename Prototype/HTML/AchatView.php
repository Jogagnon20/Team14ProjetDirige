<h1>
    Achat 
</h1>
<?php
    $idSpectacle = $_GET['id'];
    $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
    $stmt = $mybd->prepare("CALL GetSpectacleById(?)");
    $stmt->bindParam(1,$idSpectacle);
    $stmt->execute();
    while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
        $idCategorie = $donnees['idCategorie'];
        $idSpectacle = $donnees['idSpectacle'];
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
                <form action='DOMAINLOGIC/Panier.dom.php'>
                <div>
                <select id='salles' name='idSalle' onChange='DisplaySelect(), ChangeNbPlaces()'><option disabled selected>Choisir une Salle</option>";
                foreach(GetSallesSpectacles($idSpectacle) as $item){
                    $idSalle = $item['idSalle'];
                    $nomSalle = $item['nomSalles'];
                    echo "<option value='$idSalle' prix='$prix' capacite='$capacite'>$nomSalle</option>";
                }
                echo "</select>
                <hr>";
                foreach(GetSallesSpectacles($idSpectacle) as $item2){
                    $idSalle = $item2['idSalle'];
                    $nomSalle = $item2['nomSalles'];
                    echo "
                        <div style='display:none' id='$idSalle'><label> Section de la salle<br> <b>$nomSalle</b></label>
                        
                        <select id='section$idSalle' name='idSection' onChange='CalculerPrix()'><option disabled selected>Choisir une section</option>";
                        foreach(GetSectionsSalles($nomSalle) as $sections)
                        {
                            $idSection = $sections['idSection'];
                            $prixSection = $sections['fm_prix'];
                            $couleur = $sections['Couleur'];
                            echo "<option value='$idSection' prix='$prixSection'>$couleur</option>";
                        }
                        echo "</select><hr>
                        
                        <label> Représentations <br> </label>
                        <select id='heure' name='idRepresentation'><option disabled selected>Choisir une représentation</option>";
                        foreach(GetHeureSpectacle($idSpectacle,$nomSalle) as $representation)
                            {
                                $idRepresentation = $representation['idRepresentation'];
                                $heure = FormatDate($representation['Date']);
                                echo "<option value='$idRepresentation'>$heure</option>";
                            }
                        echo "</select><hr></div>";
                        
                }
                echo "
                </div><div>
                <label for='nbBillet'>Nombre de billets <i>(max 100)</i></label>    
                <input id='nbBillet' type='number' name='nbBillets' step='1' min='0' value='0' onChange='CalculerPrix()'>";
                if(isset($_GET['error'])){
                    $capacite = $_GET['error'];
                    echo "<div style='font-style: italic; color: red'>
                    Désolé, le nombre de billets sélectionnés dépasse la quantité de
                    billets restante dans cette section, soit $capacite billets.
                    SVP, choisir une quantité de billets plus petite ou égale au nombre de billets restants pour cette section.
                        </div";
                }
            echo "
            <hr>
            <div style='display:grid; grid-template-columns:25% 50%'>
                <div>Prix de la commande:<br> <span id='Prix'>0.00 </span>$
                </div>
                <input type='text' style='display:none' name='idSpectacle' value='$idSpectacle'>
                <div>
                    <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Ajouter au panier</button>
                </div>
                <hr>
            </div>
        </form>
    </div>
</div>";
    }

    function FormatDate($date){
        $chaine = dateToFrench($date,"l j F Y G")."h";
        return $chaine;
    }
    
    function dateToFrench($date, $format) 
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
    }

    function GetSectionsSalles($nomSalles){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
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
		$mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
		$val = $mybd->prepare("CALL SelectForSallesSpectacles(?)");
		$val->bindParam(1,$id);
		$val->execute();
		$sallesParSpectacle = array();
		while($donnesSalles = $val->fetch(PDO::FETCH_ASSOC)){
            array_push($sallesParSpectacle, $donnesSalles);
		}
		return $sallesParSpectacle;
    }
    function GetHeureSpectacle($id, $sallesSpecatcle){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
		$val = $mybd->prepare("CALL GetHeureSpectacleParSalle(?,?)");
        $val->bindParam(1,$id);
        $val->bindParam(2,$sallesSpecatcle);
		$val->execute();
		$DateParSpectacle = array();
		while($DonnesRepresentation = $val->fetch(PDO::FETCH_ASSOC)){
            array_push($DateParSpectacle, $DonnesRepresentation);
		}
		return $DateParSpectacle;
    }

    function GetCapaciteFromSalle($idSalle, $idSpectacle){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
		$val = $mybd->prepare("Select CapaciteSalle(?,?)");
        $val->bindParam(1,$idSalle);
        $val->bindParam(2,$idSpectacle);
		$val->execute();
		while($DonnesCapacite = $val->fetch()){
            $res = $DonnesCapacite[0];
		}
		return $res;
    }

    function GetCapaciteFromSection($idSection, $idSpectacle, $idRepresentation){
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
		$val = $mybd->prepare("Select CapaciteSection(?,?,?)");
        $val->bindParam(1,$idSection);
        $val->bindParam(2,$idSpectacle);
        $val->bindParam(3,$idRepresentation);
		$val->execute();
		while($DonnesCapacite = $val->fetch()){
            $res = $DonnesCapacite[0];
		}
		return $res;
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
        prix = nbBillet.value*prix*prixSpectacles;
        prix = AjusterPrix(prix);
        DivPrix.innerHTML = prix;
    }
    else{
        DivPrix.innerHTML = "0.00 ";
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