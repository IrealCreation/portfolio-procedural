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
<title>Console d'administration</title>
<?php
include("../assets/inc/headerBack.php");

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h6>Bienvenue <?= $_SESSION["prenom"] ?> sur le back-office</h6>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <form action="../core/userController.php" method="post">
                    <input type="hidden" name="faire" value="log-out">
                    <button class="btn bg-primary text-light fw-bold" type="submit" name="soumettre">Se
                        deconnecter</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>