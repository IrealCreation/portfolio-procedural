<?php
/* TODO: Si l'utilisateur n'est pas connecté ou n'est pas administrateur,
le rediriger et lui afficher un message l'invitant à se connecter
Indice : $_SESSION est votre amie.
*/

include("../assets/inc/headBack.php");

// Vérifions si l'utilisateur a le droit d'accéder à la page
if (!isset($_SESSION["role"], $_SESSION["isLog"], $_SESSION["prenom"]) || !$_SESSION["isLog"] || $_SESSION["role"] != 1) {
    // L'utilisateur n'a pas le droit : redirigeons-le!
    $_SESSION["message"] = "Vous n'avez pas le droit d'accès à l'administration";
    header("Location: ../admin/index.php");
    exit;
}
?>
<title>Détail de l'utilisateur</title>
<?php
    include("../assets/inc/headerBack.php");

    // Choix de l'id de l'utilisateur à afficher
    $id = $_GET["id"];
    // demande du fichier de connexion
    require("../core/connexion.php");
    // écriture de la requète
    $sql = "SELECT `id_user`, -- selection des champs (pour une lecture)
                    `nom`,
                    `prenom`,
                    `email`,
                    `role`
            -- de la table user
            FROM user
            -- où le champs id_user = $id
            WHERE id_user = $id -- où champs id_user = variable $id 
    ";
    // execution de la requête avec les paramètres de connexion
    $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    // formattage du retour de la requête sous forme de tableau
    // associatif
    $user = mysqli_fetch_assoc($query);

    /* TODO :
        1) Afficher les informations de l'utilisateur sur la page
        2) Afficher un utilisateur en fonction de son id quand on clique dessus depuis la liste des utilisateurs (listUsers.php)
            Indices : paramètres GET dans l'URL
    */
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                
            </div>
        </div>
        <?php 
        // echo "<pre>";
        // var_dump($user);
        // echo "</pre>";
        ?>
        <h2>Détail d'un utilisateur</h2>
        <div class="col-4">
            <p>Le nom : <?php echo $user["nom"]?></p>
            <p>Le prénom : <?php echo $user["prenom"]?></p>
            <p>L'email : <?php echo $user["email"]?></p>
            <p>Le rôle : <?php 
                            if($user["role"] == 1):
                                echo "Administrateur";
                            else:
                                echo "Utilisateur";
                            endif;
                            ?>
            </p> 
        </div>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>