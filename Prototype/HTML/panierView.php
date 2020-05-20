<h1>Votre Panier</h1>
<?php 

    $panier = $_SESSION['Panier'];
    if(count($panier)>0){
        foreach($panier as $item){
            $nbBillet = $item[1];
            $idBillet = $item[0][0];
            $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
            $stmt = $mybd->prepare("call GetBilletByID(?)");
            $stmt->bindParam(1,$idBillet);
            $stmt->execute();
            
            while($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
                $nomSpectacle = $donnees['nomSpectacle'];
                $couleur = $donnees['couleur'];
                $nomSalle = $donnees['nomSalles'];
                $GUID = $donnees['GUID'];
                $date = $donnees['Date'];
                $adresse = $donnees['Adresse'];
                $artiste = $donnees['artiste'];
                $prixBillet = $donnees['prixBillet'];
                AfficherBillet($couleur, $nomSpectacle, $nomSalle, $GUID, $date, $adresse, $artiste, $nbBillet, $idBillet, $prixBillet);
            }
        } 
        //echo "<hr><input type='button' class='btn btn-outline-dark' id='acheterPanier' name='acheterPanier' value='Acheter le panier'>";
    }
    else{
        echo "Votre panier est vide.";
    }

    function AfficherBillet($couleur, $nomSpectacle, $nomSalle, $GUID, $date, $adresse, $artiste, $nbBillet, $idBillet, $prixBillet){
        $date = FormatDate($date);
        echo "
        <div style='display:grid; grid-template-columns:3.5fr 1.5fr;'>
        <div class='grid-container-Billet'>
            <div style='grid-area: Picture'> 
                <img class='rounded'  width='100%' height='236' src='Images/$GUID' alt='$nomSpectacle'>
            </div>
            <div style='grid-area: Title; text-align:center'>
                <b style='font-size:50px;  font-family: fantasy;'>
                    $nomSpectacle
                </b>
            </div>
            <div style='grid-area: Artiste; margin-top:3em'>
                <div style='font-size:40px;text-align:center'>
                    $artiste
                </div>
            </div>
            <div class='cursive' style='grid-area: SalleCouleur; align-content:center'>
                <div style='text-align:center; '>Salle : $nomSalle</div>
                <div style='text-align:center; '>Section : $couleur</div>
            </div>
            <div class='cursive' style='grid-area: Adresse; text-align:center'>
                $adresse
            </div>
            <div class='cursive' style='grid-area: Date; text-align:center'>
               <div>$date</div>
            </div>
            <div style='grid-area: Picture2'>
                <img class='rounded' width='100%' height='236' src='Images/$GUID' alt='$nomSpectacle'>
            </div>
            <div style='grid-area: SiteWeb; text-align:right; margin-right:1em; margin-top:2em'>
                notresite.com
            </div>
        </div><div style='text-align:center'>";
        AfficherNbBillet($nbBillet, $idBillet, $prixBillet);
        
        echo" 
        
        <hr>
        <form action='./DOMAINLOGIC/supprimerPanier.dom.php'>
            <input value='$idBillet' style='display:none' name='idBillet'>
            <button class='btn btn-outline-danger' type='submit'>Supprimer du panier</button>
        </form>
        <hr>
        <form action='./DOMAINLOGIC/acheterBillet.dom.php'>
            <input value='$idBillet' style='display:none' name='idBillet'>
            <textarea style='display:none' class='nbBillet$idBillet' name='nbBillet'>
                $nbBillet
            </textarea>
            <button class='btn btn-outline-dark' type='submit'>Acheter</button>
        </form>
        </div></div>";
    }

    

    function AfficherNbBillet($nbBillet, $idBillet, $prixBillet){
        echo "<div style='font-size:40px'>
        <button class='btn btn-outline-secondary' onClick='ChangeNbBillet(-1, $idBillet, $prixBillet)' style='width:45px; font-size:30px'>-</button>
        <span class='nbBillet$idBillet'>$nbBillet</span> billets
        <button class='btn btn-outline-secondary' onClick='ChangeNbBillet(1, $idBillet, $prixBillet)' style='width:45px; font-size:30px'>+</button>
        <div id='prixBillet$idBillet'>". number_format($prixBillet*$nbBillet,2)." $</div>
        </div>
        ";
    }
    function FormatDate($date){
        $chaine = dateToFrench($date,"l j F Y g")."h";
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
    function AcheterPanier(){
        var_dump('allo');
        echo 'allo';
    }
?>

<script>
    function ChangeNbBillet(val, id, prix){
        var element = document.getElementsByClassName('nbBillet'+id);
        var text;
        text = parseInt(element[0].innerHTML)+val;
        if(parseInt(text)<0){
            text = 0;
        }
        if(parseInt(text)>100){
            text = 100;
        }
        for(var i = 0; i<element.length;i++){
            element[i].innerHTML = text;
        }
        
        
        var item = document.getElementById('prixBillet'+id);
        var prixAjuster = AjusterPrix(prix*text)
        item.innerHTML = prixAjuster+" $";
    }
    function AjusterPrix(prix){
    var value = prix;
    for(var i = 6;i>=0;i--){
        if(prix>=Math.pow(10,i)){
            value = value.toPrecision(i+3);
            break;
            }
        }
    return value;
    }

</script>