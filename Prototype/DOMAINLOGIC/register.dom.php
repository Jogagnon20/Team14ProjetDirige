<?php
    include "../CLASSES/MEDIA/media.php";
    include "../CLASSES/USER/user.php";
    include "../UTILS/formvalidator.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(validate_session()){
        header("Location: ../error.php?ErrorMSG=Already%20logged!");
        die();
    }

    //prendre les variables du Post
    $target_dir = "./PHOTOS/PROFILES/";
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pw = $_POST["pw"];
    $pwv = $_POST["pwValidation"];
    $media_file_type = pathinfo($_FILES['Media']['name'] ,PATHINFO_EXTENSION);

    $img_extensions_arr = array("jpg","jpeg","png","gif");    

    if(!empty($media_file_type))
    {
        if(!in_array($media_file_type, $img_extensions_arr)){
            header("Location: ../error.php?ErrorMSG=INVALID FILE TYPE");
            die();
        }  
         //creation d'un nom unique pour la "PATH" du fichier
        $path = tempnam("../PHOTOS/PROFILES", '');
        unlink($path);
        $file_name = basename($path, ".tmp");
        
        //creation de l'url pour la DB
        $url = $target_dir . $file_name . "." . $media_file_type;
        
        //deplacement du fichier uploader vers le bon repertoire (Medias)
        move_uploaded_file($_FILES['Media']['tmp_name'], "../" . $url);

        //create entry in database
        Media::create_entry($type, $url, 'image_de_profil');
    }
    else
    {
        $url = "./PHOTOS/PROFILES/DefaultProfileImage.jpg";
        Media::create_entry('image', $path, 'image_de_profil_default');
    }
    
    //Validation Posts
    if(!Validator::validate_email($email) || !Validator::validate_password($pw))
    {
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=invalid email or password");
        die();
    }

    $aUser = new User();

    //validateLogin
    if(!$aUser->register($email, $username, $pw, $pwv, $url))
    {
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=invalid email or password");
        die();
    }

    header("Location: ../login.php");
    die();
?>
