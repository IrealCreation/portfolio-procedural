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

// Choix de l'id de l'utilisateur à afficher
$id = $_GET["id"];

require("../core/connexion.php");

$sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
    FROM user
    WHERE id_user = $id
";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

$user = mysqli_fetch_assoc($query);

/* TODO :
    1) Afficher les informations de l'utilisateur sur la page
    2) Afficher un utilisateur en fonction de son id quand on clique dessus depuis la liste des utilisateurs (listUsers.php)
        Indices : paramètres GET dans l'URL
*/

?>
<title>Modification de l'utilisateur</title>
<?php
include("../assets/inc/headerBack.php");

?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h1>Détails de l'utilisateur</h1>
            </div>
        </div>
        <?php 
        echo "<pre>";
        var_dump($user);
        echo "</pre>";
        ?>

        <h2>Modifier l'utilisateur</h2>
        <!-- gestion de l'affichage des messages -->
        <div class="row mt-5">
            <?php
                if (isset($_SESSION["message"])):
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION["message"] . '</div>';
                    // on efface la clé message, une fois qu'elle a été affichée avec unset()
                    unset($_SESSION["message"]);
                endif;
            ?>
        </div>
        <form method="POST" action="../core/userController.php">
            <input type="hidden" name="faire" value="update">

            <input type="hidden" name="id" value="<?= $user["id_user"]; ?>" />

            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?= $user["nom"]; ?>" />
            
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $user["prenom"]; ?>" />
            
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user["email"]; ?>" />
            
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control" />

            <label for="role">Rôle :</label>
            <select name="role" id="role" class="form-control">
                <option value="2" <?php if($user["role"] == 2) {
                    echo "selected";
                } ?>>Utilisateur</option>
                <option value="1" <?php if($user["role"] == 1) {
                    echo "selected";
                } ?>>Administrateur</option>
            </select>

            <button type="submit" class="btn btn-success mt-3">
                Modifier
            </button>
        </form>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>