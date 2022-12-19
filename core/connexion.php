<?php
    // la configuration de la connexion à la base de données

    // création d'une variable $online (en ligne) avec le type boolean à true
$online = false;

if (!$online):
    $host = "localhost";
    $user = "root";
    // pour les MAC c'est "root", pour les pc "".
    $password = "";
    $bdd = "portfolio";
else:
    // à remplir avec les données que vous fournira votre hébergeur
    // le nom du serveur
    $host = "";
    // l'utilisateur
    $user = "";
    // le mot de passe 
    $password = "";
    // le nom de la bdd
    $bdd = "";
endif;

// mise en place de la connexion à la bdd
$connexion = mysqli_connect($host, $user, $password, $bdd);
// passage des retours de requêtes au format d'encodage UTF-8.
mysqli_query($connexion, "SET NAMES 'utf8'"); 
?>