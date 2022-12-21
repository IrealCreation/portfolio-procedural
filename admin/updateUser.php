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

echo "<pre>";
var_dump($user);
echo "</pre>";

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
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>