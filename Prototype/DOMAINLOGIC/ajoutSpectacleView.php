<?php
    
require './UTILS/imageHelper.php';

$imageHelper = new ImageHelper('./Images','No_image.png') ;

$html_imageUpLoader = $imageHelper->html_ImageUploader('');
$_SESSION['imageHelper'] = $imageHelper;
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Ajout d'un spectacle</h2>
            <form method = "post" enctype="multipart/form-data"  action = "./DOMAINLOGIC/ajoutSpectacle.dom.php">
                <div class="form-group">
                    
                    <label for="NomSpectacle">Nom du spectacle:</label>
                    <input type='text' class='form-control' value='' name='nom' id='nom' required><br>
                    <label for="artiste">Nom de l'artiste:</label>
                    <input type='text' class='form-control' value='' name='artiste' id='artiste' required><br>
                    <label for="Categorie">Categorie:</label>
                    <select class='form-control' name='categorie' id='categorie' required>
                    <option value=" " disabled selected>Selectionnez une categorie</option>
                    <?php
                        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
                        $stmt1 = $mybd->prepare("CALL SelectFromCategories()");
                        $stmt1->execute();
                        while ($donnees = $stmt1->fetch())
                        {
                            $idCategorie = $donnees['idCategorie'];
                            $nomCategorie = $donnees['Description'];
                            echo "<option value='$idCategorie'>$nomCategorie</option>";
                        }
                        $mybd = null;
                    ?>
                    </select> <br>
                    <label for='Prix'>Prix:</label>
                    <input type='number' class='form-control' value='' name='prix' id='prix' required><br>
                    <label for='Salles'> Nombre de représentation: </label>
                    <input type='number' class='form-control' value='' name='nbRepresentations' required id='nbRepresentations' onkeyup="myFunction()"><br>
                    
                    <select class='form-control' name='salle' id='salle' style="display:none" >
                    <option value=" " disabled selected>Selectionnez une salle</option>
                    
                    <?php
                        $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
                        $stmt1 = $mybd->prepare("CALL SelectFromSalles()");
                        $stmt1->execute();
                        while ($donnees = $stmt1->fetch())
                        {
                            $nomSalle = $donnees['nomSalles'];
                            $idSalle = $donnees['idSalle'];
                            echo "<option value='$idSalle'>$nomSalle</option>";
                        }
                        $mybd = null;
                    ?>
                    </select> 
                    <input type="datetime-local"  id="time" name="time" style="display:none">
                    

                    <div id='selectDiv'>
                    </div>
                    <br>
                    <label style="display:block"  for="ImageUploader">Url de l'affiche</label>
                    <?php echo $html_imageUpLoader; ?> <br> <br>
                    
                    <label style="display:block"  for="description">Description du spectacle</label>
                    <textarea  id="description" class='form-control' name="description" required></textarea>
                </div>
               
                <button class="btn btn-success" type="submit">Ajout</button>
            </form>
            <script src='./js/jquery-3.3.1.js'></script>        
            <script src='./js/imageUpLoader.js'></script>
        </div>
    </div>
</div>
<script>
    function myFunction() {
    var div = document.getElementById('selectDiv');
        div.innerHTML = '';
    var x = document.getElementById("nbRepresentations").value;
    var i;
    
    for(i = 0; i < x ; i++){
        // Create a clone of element with id ddl_1:
        
        var myhr = document.createElement('hr');
        document.getElementById('selectDiv').appendChild(myhr);

        var label = document.createElement('label');
        i++;
        label.innerHTML = 'Representation ' + i;
        i--;
        document.getElementById('selectDiv').appendChild(label);

        let clone1 = document.getElementById("salle").cloneNode( true );
        
        // Change the id attribute of the newly created element:
        clone1.setAttribute( 'name', 'salle' + i );
        clone1.setAttribute('style', 'display:block');
        clone1.required = true;
        // Append the newly created element on element p 
        document.getElementById('selectDiv').appendChild( clone1 );
        var mybr = document.createElement('br');
        document.getElementById('selectDiv').appendChild(mybr);
        
        let clone2 = document.getElementById("time").cloneNode( true );
        clone2.required = true;
        // Change the id attribute of the newly created element:
        clone2.setAttribute( 'name', 'time' + i );
        clone2.setAttribute('style', 'display:block');

        document.getElementById('selectDiv').appendChild( clone2 );
        
    }
}


$("#ImageUploader").change(function (e) { PreLoadImage(e); });
$("#UploadButton").click(function () { $("#ImageUploader").trigger("click"); });
$("#UploadedImage").click(function () { $("#ImageUploader").trigger("click"); });
$("#PDFUploadButton").click(function () { $("#PDFUploader").trigger("click"); });

function PreLoadImage(e) {
    // Saisir la référence sur l'image cible
    var imageTarget = $("#UploadedImage")[0];
    // Saisir la référence sur le fileUpload
    var input = $("#ImageUploader")[0];

    if (imageTarget != null) {
        var len = input.value.length;

        if (len != 0) {
            var fname = input.value;
            var ext = fname.substr(len - 3, len).toLowerCase();

            if ((ext != "png") &&
                (ext != "jpg") &&
                (ext != "bmp") &&
                (ext != "gif")) {
                bootbox.alert("Ce n'est pas un fichier d'image de format reconnu. Sélectionnez un autre fichier.");
            }
            else {
                var fReader = new FileReader();
                fReader.readAsDataURL(input.files[0]);
                fReader.onloadend = function (event) {
                    // event.target.result contiens les données de l'image
                    imageTarget.src = event.target.result;
                }
            }
        }
        else {
            imageTarget.src = null;
        }
    }
    return true;
}
</script>

