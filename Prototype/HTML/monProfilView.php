<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Mon Profil</h2>
            <?php 
              try
              {
                $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
                $stmt = $mybd->prepare("CALL SelectClientWhereId(?)");
                $stmt->bindParam(1, $_SESSION['idClient']);
                $stmt->execute();
                while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                  $nom = $donnees['nomClient'];
                  $email = $donnees['email'];
                  $tel = $donnees['telephoneClient'];
                  $splitAdresse = explode("|", $donnees['adresseClient']);
                  echo "
                  <form action = './DOMAINLOGIC/profil.dom.php'>
                    <div class='form-group'>
                      <label for='Nom'>Nom</label> 
                      <input type='text' class='form-control' value='$nom' name='nomClient' id='nomClient' required>
                    </div>
                    
                    <div class='form-group'>
                      <label for='email'>Courriel</label>
                      <input type='text' class='form-control' value='$email' name='courrielClient'  id='courrielClient' required>";
                        if(isset( $_SESSION['errorEmail'])){
                          $Eemail = $_SESSION['errorEmail'];
                          echo "<div style='color:red'> $Eemail </div>";
                        }
                    echo "</div>

                    <div class='form-group'>
                        <label for='mdp'>Nouveau mot de passe</label>
                        <input type='password' class='form-control' name='newPassword'>
                    </div>

                    <div class='form-group'>
                        <label for='ConfirmationMdp'>Confirmation mot de passe</label>
                        <input type='password' class='form-control' name='verifPassword'>";
                            if(isset( $_SESSION['errorPassword'])){
                                $Epassword = $_SESSION['errorPassword'];
                                echo "<div style='color:red'> $Epassword </div>";
                            }
                    echo "</div>

                    <div class='form-group'>
                        <label for='telephone'>Téléphone</label>
                        <input type='text' class='form-control' value='$tel' name='phone' id='phone'  placeholder='(123) 456-7890' required>
                    </div>

                    <div class='form-group'>
                        <label for='adresse'>Adresse</label>
                            
                            <input type='text' class='form-control' value='$splitAdresse[0]' name='adresseClient' id='adresseClient' required>
                    </div>

                    <div class='form-group'>
                        <label for='adresse'>Code Postal</label>
                        <input type='text' class='form-control' value='$splitAdresse[1]' name='codePostal' id='adresseClient' required>";
                        if(isset( $_SESSION['errorPC'])){
                          $Epc = $_SESSION['errorPC'];
                          echo "<div style='color:red'> $Epc </div>";
                        }
                    echo "</div>

                    <button class='btn btn-success' type='submit'>Enregistrer les changements</button>
                  </form>";
                }
                $stmt->closeCursor();
              }
              catch (PDOException $e)
              {
                  echo('Erreur de connexion: ' . $e->getMessage());
                  exit();
              }
              $mybd=null;
          ?>
        </div>
    </div>
</div>
<script>

function validate_int(myEvento) {
  if ((myEvento.charCode >= 48 && myEvento.charCode <= 57) || myEvento.keyCode == 9 || myEvento.keyCode == 10 || myEvento.keyCode == 13 || myEvento.keyCode == 8 || myEvento.keyCode == 116 || myEvento.keyCode == 46 || (myEvento.keyCode <= 40 && myEvento.keyCode >= 37)) {
    dato = true;
  } else {
    dato = false;
  }
  return dato;
}

function phone_number_mask() {
  var myMask = "(___) ___-____";
  var myCaja = document.getElementById("phone");
  var myText = "";
  var myNumbers = [];
  var myOutPut = ""
  var theLastPos = 1;
  myText = myCaja.value;
  //get numbers
  for (var i = 0; i < myText.length; i++) {
    if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
      myNumbers.push(myText.charAt(i));
    }
  }
  //write over mask
  for (var j = 0; j < myMask.length; j++) {
    if (myMask.charAt(j) == "_") { //replace "_" by a number 
      if (myNumbers.length == 0)
        myOutPut = myOutPut + myMask.charAt(j);
      else {
        myOutPut = myOutPut + myNumbers.shift();
        theLastPos = j + 1; //set caret position
      }
    } else {
      myOutPut = myOutPut + myMask.charAt(j);
    }
  }
  document.getElementById("phone").value = myOutPut;
  document.getElementById("phone").setSelectionRange(theLastPos, theLastPos);
}

document.getElementById("phone").onkeypress = validate_int;
document.getElementById("phone").onkeyup = phone_number_mask;
</script>