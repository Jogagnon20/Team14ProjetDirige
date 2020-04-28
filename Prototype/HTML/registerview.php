
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
                        <input type="password" class="form-control" name="pw" id="pwd" required><br>
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
                    <input type="password" class="form-control" name="pwValidation" id="pwValidation" required><br>
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
                            echo "<input type='text' class='form-control' name='adress' id='adress' required><br>";
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
                            echo "<input type='text' class='form-control' value='$phone' name='phone' id='phone' placeholder='514-123-1234' required>";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='phone' id='phone' required placeholder='514-123-1234'><br>";
                        }
                    ?>
                    <?php
                        if(isset( $_SESSION['errorPhone'])){
                            $phone = $_SESSION['errorPhone'];
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
                            echo "<input type='text' class='form-control' value='$pc' name='pc' id='pc' required>";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='pc' id='pc' required><br>";
                        }
                    ?>
                     <?php
                        if(isset( $_SESSION['errorPc'])){
                            $pc = $_SESSION['errorPc'];
                            echo "<div style='color:red'> $pc </div>";
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
<script>$('#phone').mask('(000) 000-0000');</script>
