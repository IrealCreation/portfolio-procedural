<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office / avec le login : identifiant & mot de passe

    include("../assets/inc/headFront.php");
?>
<title>Login administration</title>
<?php
    include("../assets/inc/headerFront.php");
?>
<main>
    <div class="container">
        <!-- gestion de l'affichage des messages -->
        <div class="row">
            <?php
                if (isset($_SESSION["message"])):
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION["message"] . '</div>';
                    // on efface la clé message, une fois qu'elle a été affichée avec unset()
                    unset($_SESSION["message"]);
                endif;
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <form class="form-group" action="../core/userController.php" method="post">
                    <input type="hidden" name="faire" value="log-admin">
                    <input class="form-control mt-3" type="email" name="login" placeholder="Votre email">
                    <input class="form-control mt-3" type="password" name="password" placeholder="Votre mot de passe">
                    <button class="btn bg-primary text-light fw-bold mt-3" type="submit" name="soumettre">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    include("../assets/inc/footerFront.php");
?>
