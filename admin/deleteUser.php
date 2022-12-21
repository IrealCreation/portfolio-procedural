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
<title>Suppression de l'utilisateur</title>
<?php
    include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
        <h2>Suppression de l'utilisateur</h2>
        <div class="col-12">
            <?php
                // Récupération de l'id de l'utilisateur à afficher
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
            ?>
            <!-- création de 2 boutons : 1 avec un retour vers -->
            <h4>Attention vous êtes sur le point de supprimer le user <?php echo $user["prenom"] . ' ' . $user["nom"] ?></h4>
            <a type="button" class="btn bg-success text-dark fw-bold" href="../admin/listUsers.php">Retour liste</a>
            <form action="../core/userController.php" method="post">
                <input type="hidden" name="faire" value="delete-user">
                <input type="hidden" name="id" value="<?php echo $user["id_user"]; ?>">
                <button type="submit" class="btn bg-danger text-dark fw-bold mt-3">Supprimer</button>
            </form>
        </div>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>