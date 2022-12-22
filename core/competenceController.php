<?php
    session_start();

    // on analyse ce qu'il y a à faire :
    $action = "empty";
    // si la clé "faire" est détecté dans $_POST (avec la balise caché
    // input type = "hidden")
    if (isset($_POST["faire"])):
        // notre variable action est égale à la valeur de la clé faire
        $action = $_POST["faire"];
    endif;
    // on utilise un switch pour vérifier l'action
    switch ($action):
        case "create-competence":
            createCompetence();
        break;
    endswitch;
    // les différentes fonctions de notre controleur

function createCompetence()
{
    // 1- Vérification, si les informations ont bien été envoyées
    if (!isset($_POST["type"], $_POST["titre"], $_POST["active"])):
        $_SESSION["message"] = "Informations manquantes dans le formulaire";
        header("Location:../admin/createCompetence.php");
        exit;
    endif;

    // 2- Récupération des informations envoyées par le formulaire
    $type = $_POST["type"];
    $titre = ucfirst(trim($_POST["titre"]));
    $texte = addslashes(ucfirst(trim($_POST["texte"])));
    $lien = addslashes(trim($_POST["lien"]));
    $active = $_POST["active"];

    // 3- Validation des informations
    if($type != 1 && $type != 2):
        $_SESSION["message"] = "Le type est invalide";
        header("Location:../admin/createCompetence.php");
        exit;
    endif;
    if(strlen($titre) < 1 || strlen($titre) > 255):
        $_SESSION["message"] = "Le titre doit avoir entre 1 et 255 caractères";
        header("Location:../admin/createCompetence.php");
        exit;
    endif;
    if(strlen($texte) > 255):
        $_SESSION["message"] = "Le texte doit être inférieur à 255 caractères";
        header("Location:../admin/createCompetence.php");
        exit;
    endif;
    if(strlen($lien) > 255):
        $_SESSION["message"] = "Le lien est invalide est supérieur à 255 caractères";
        header("Location:../admin/createCompetence.php");
        exit;
    endif;
    if($active != 0 && $active != 1):
        $_SESSION["message"] = "La visibilité de la compétence est invalide";
        header("Location:../admin/createCompetence.php");
        exit;
    endif;

    // 4- gestion de l'image
    // vérification que la clé name exite et qu'elle n'est pas null
    if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] !== null):
        // utilisation de la fonction pathinfo() qui retourne des informations sur le chemin path, sous la forme d'une chaine ou de tableau associatif
        // PATHINFI_EXTENTION: retourne l'extention du fichier
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        // uniqid() c'est une fonction qui génère un identifiant unique sur la base du microtime (l'heure actuelle en microseconde)
        $image = "competence" . uniqid() . '.' . $extension;
        // on déplace le fichier renommé vers le dossier assets/images/upload
        move_uploaded_file($_FILES["image"]["tmp_name"], '../assets/images/upload/' . $image);
    endif;
    // 5- récupération de la connection
    require("connexion.php");
    // 6- écriture SQL
    $sql = "INSERT INTO competence -- insérer dans la table compétence au niveau des champs suivants
            (
                type,
                titre,
                texte,
                image,
                lien,
                active
            )
            VALUE
            (
                '$type',
                '$titre',
                '$texte',
                '$image',
                '$lien',
                '$active'
            )
    ";
    // 7- execution de la requête avec la connection
    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    // 8- message d'information
    $_SESSION["message"] = "La compétence a été ajouté";
    // 9- redirection vers listCompetence.php
    header('Location:../admin/listCompetences.php');
    exit;
}


    //-----------------------------------------------
    echo "<pre>";
        var_dump($_POST);
    echo "</pre>";

    echo "<pre>";
        var_dump($_FILES);
    echo "</pre>";
