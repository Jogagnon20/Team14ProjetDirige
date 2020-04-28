<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Connexion</h2>
            <form method = "post" action = "./DOMAINLOGIC/login.dom.php">
                <div class="form-group">
                    <label for="email">Courriel:</label>
                    <?php
                        if(isset($_SESSION['emailLogin'])){
                            $email = $_SESSION['emailLogin'];
                            echo "<input type='text' class='form-control' value='$email' name='email' id='email' required>";
                        }
                        else{
                            echo "<input type='text' class='form-control' value='' name='email' id='email' required><br>";
                        }
                    ?>
                     <?php
                        if(isset( $_SESSION['errorEmailLogin'])){
                            $error = $_SESSION['errorEmailLogin'];
                            echo "<div style='color:red'> $error </div>";
                        }
                        
                    ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe:</label>
                    <input type="password" class="form-control" name="pw" id="pwd" required><br>
                    <?php
                        if(isset( $_SESSION['errorPasswordLogin'])){
                            $error = $_SESSION['errorPasswordLogin'];
                            echo "<div style='color:red'> $error </div>";
                        }
                        
                    ?>
                </div>
                <button class="btn btn-success" type="submit">Connexion</button>
            </form>
        </div>
    </div>
</div>
