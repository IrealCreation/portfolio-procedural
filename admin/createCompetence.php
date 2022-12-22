<?php
    include("../assets/inc/headBack.php");
?>
<title>création d'une compétence</title>
<?php
    include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
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
        <div class="row">
            <h3>Créer une compétence</h3>
            <div class="col-4">
                <form class="form-group" action="../core/competenceController.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="faire" value="create-competence">
                    <label for="l1">Choix du type de compétence :</label>
                    <select class="form-control" name="type" id="l1">
                        <option value="1" selected>Front-end</option>
                        <option value="2">Back-end</option>
                    </select>
                    <input class="form-control mt-3" type="text" name="titre" placeholder="titre ?">
                    <input class="form-control mt-3"type="text" name="texte" placeholder="Le texte ?">
                    <label for="l2">Image :</label>
                    <input class="form-control" type="file" name="image" id="l2">
                    <input class="form-control mt-3" type="text" name="lien" placeholder="Le lien ?">
                    <label for="l3">Active en front ?</label>
                    <select class="form-control" name="active" id="l3">
                        <option value="0">Compétence désactivée en front</option>
                        <option value="1" selected>Compétence activée en front</option>
                    </select>
                    <button class="btn bg-primary text-light fw-bold mt-3" type="submit" name="soumettre">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    include("../assets/inc/footerBack.php");
?>