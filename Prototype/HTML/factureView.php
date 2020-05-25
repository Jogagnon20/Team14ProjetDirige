<div class="container" style="margin-top:30px">
    <h2>Facture</h2><hr>
    <?php
        $nbBillets = $_GET['nbBillets'];
        $idBillet = $_GET['id'];

        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
        $stmt = $mybd->prepare("call GetLatestAchatByClient(?)");
        $stmt->bindParam(1, $_SESSION['idClient']);
        $stmt->execute();
        while($donnees = $stmt->fetch()){
            $lastId = $donnees[0];
        }

        $nomSpectacle;
        $dateRep;
        $prixBillet;
        $dateAchat;
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
        $stmt = $mybd->prepare("call GetInfoFacture(?)");
        $stmt->bindParam(1, $lastId);
        $stmt->execute();
        while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
            $nomSpectacle = $res['nomSpectacle'];
            $dateRep = $res['dateRep'];
            $prix = number_format($res['prixBillet']*$nbBillets,2);
            $dateAchat = $res['dateAchat'];
        }
        $mybd=null;

        echo "<div style='position: relative; padding:20px'>
                <div>Merci d'avoir acheté <b>$nbBillets</b> billets pour le spectacle : <b>$nomSpectacle</b></div>
                <div>La représentation se fera le : $dateRep <br></div>
                
                <div>$prix </div>
                <div>$dateAchat <hr></div>
                <span style=\"position: absolute; right: 0;\"><input type=\"button\" onclick=\"location.href='Panier.php';\" value=\"Retour au panier\"/></span>
                <br>
            <div>";
        
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
        $stmt = $mybd->prepare("call DeleteBillet(?)");
        $stmt->bindParam(1,$idBillet);
        $stmt->execute();
    
        $noBillet = array();
        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14'); 
        $stmt = $mybd->prepare("call GetAllBilletbyClient(?)");
        $stmt->bindParam(1, $_SESSION['idClient']);
        $stmt->execute();
        while($donnees = $stmt->fetch()){
            array_push($noBillet,$donnees);
        }
        $_SESSION['Panier'] = $noBillet;

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
    ?>
</div>