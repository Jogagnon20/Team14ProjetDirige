
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Inscription</h2>
            <form method = "post" action = "./DOMAINLOGIC/register.dom.php">
                
                <div class="form-group">
                    <label for="email">Courriel:</label>
                    <?php
                        if(isset($_SESSION['email'])){
                            $email = $_SESSION['email'];
                            echo "<input type='text' class='form-control' value='$email' name='email' id='email' required>";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='email' id='email' required><br>";
                        }
                    ?>
                     <?php
                        if(isset( $_SESSION['errorEmail'])){
                            $error = $_SESSION['errorEmail'];
                            echo "<div style='color:red'> $error </div>";
                        }
                        
                    ?>
                    
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>

                <div class="form-group">
                        <label for="name">Nom:</label>
                        <?php
                        if(isset($_SESSION['name'])){
                            $name = $_SESSION['name'];
                            echo "<input type='text' class='form-control' value='$name' name='name' id='name' required>";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='name' id='name' required><br>";
                        }
                    ?>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>

                <div class="form-group">
                        <label for="pwd">Mot de passe:</label>
                        <input type="password" class="form-control" name="pw" id="pwd" required>
                        <?php
                        if(isset( $_SESSION['errorPassword'])){
                            $password = $_SESSION['errorPassword'];
                            echo "<div style='color:red'> $password </div>";
                        }
                        
                    ?>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>

                <div class="form-group">
                    <label for="pwd">Validation mot de passe:</label>
                    <input type="password" class="form-control" name="pwValidation" id="pwValidation" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>

                <div class="form-group">
                        <label for="adress">Adresse:</label>
                        <?php
                        if(isset($_SESSION['adress'])){
                            $adress = $_SESSION['adress'];
                            echo "<input type='text' class='form-control' name='adress' value='$adress' id='adress' required>";
                        }
                        else{
                            echo "<input type='text' class='form-control' name='adress' id='adress' required> <br>";
                        }
                    ?>
                        
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>

                <div class="form-group">
                        <label for="phone">Téléphone:</label>
                        <?php
                        if(isset($_SESSION['phone'])){
                            $phone = $_SESSION['phone'];
                            echo "<input type='text' class='form-control' value='$phone' name='phone' id='phone' placeholder='(123) 456-7890 required>";
                            echo "<span style='color:red'> </span>";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='phone' id='phone'  placeholder='(123) 456-7890' required> <br>";
                        }
                    ?>
                    <?php
                        if(isset( $_SESSION['errorPhone'])){
                            $phone = $_SESSION['errorPhone'];
                            echo "<span style='color:red'> </span>";
                            echo "<div style='color:red'> $phone </div>";
                        }
                        
                    ?>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>

                <div class="form-group">
                        <label for="PostalCode">Code Postal:</label>
                        <?php
                        if(isset($_SESSION['pc'])){
                            $pc = $_SESSION['pc'];
                            echo "<input type='text' class='form-control' value='$pc' name='pc' id='pc' placeholder='Q1Q 1Q1' required> ";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='pc' id='pc' placeholder='Q1Q 1Q1' required><br>";
                        }
                    ?>
                     <?php
                        if(isset( $_SESSION['errorPc'])){
                            $pc = $_SESSION['errorPc'];
                            echo "<div style='color:red'> $pc </div> ";
                        }
                        
                    ?>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Veuillez remplir ce champs.</div>
                </div>
                <button class="btn btn-success" type="submit">Inscription</button>
            </form>
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
