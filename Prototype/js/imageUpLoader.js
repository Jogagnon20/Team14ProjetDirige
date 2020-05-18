// Dépendances: jquery

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