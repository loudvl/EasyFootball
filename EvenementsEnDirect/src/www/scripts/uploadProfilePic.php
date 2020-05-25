<?php
require("../config/sessionConst.php");
session_start();

if(isset($_SESSION[SESSION_EMAIL]))
{
    if($_SESSION[SESSION_EMAIL] != "")
    {
        require("../db/database.php");
        if (!isset($_FILES['profilePic']) ||
        !is_uploaded_file($_FILES['profilePic']['tmp_name'])) {
        echo('Probleme de transfert');
        exit;
        }
        // Récupérer le contenu du fichier tmp
        $file = file_get_contents($_FILES['profilePic']['tmp_name']);
        // Récupérer le type MIME du fichier à l’aide de la classe finfo
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['profilePic']['tmp_name']);
        // On créé la chaîne de caractères qui permettra de l’afficher directement dans l’attribut src d’un tag <img>
        // On utilise la fonction base64_encode pour transformer le contenu $data en base64
        $src = 'data:'.$mime.';base64,'.base64_encode($file);
        // SQL d'insertion standard.
        $sql = "UPDATE user SET base64ProfilePic = :pic WHERE email = :email";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':pic', $src);
        $stmt->bindParam(':email', $_SESSION[SESSION_EMAIL]);
        $stmt->execute();
    }
}
?>