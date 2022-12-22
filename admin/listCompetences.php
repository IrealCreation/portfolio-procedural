<?php
    include("../assets/inc/headBack.php"); 
?>
<title>Liste des compétences</title>
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
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h1>Liste des compétences</h1>
            </div>
        </div>
        <?php
            // Vérifions si l'utilisateur a le droit d'accéder à la page
            if (!isset($_SESSION["role"], $_SESSION["isLog"], $_SESSION["prenom"]) || !$_SESSION["isLog"] || $_SESSION["role"] != 1) {
                // L'utilisateur n'a pas le droit : redirigeons-le!
                $_SESSION["message"] = "Vous n'avez pas le droit d'accès à l'administration";
                header("Location: ../admin/index.php");
                exit;
            }
            // récupération de la connexion bdd
            require("../core/connexion.php");
            // écriture SQL
            $sql = "SELECT  *
                    FROM competence
            ";
            // execution de la requète avec la connexion
            $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
            // Retour de la requète sous forme de tableau associatif
            $competences = mysqli_fetch_all($query, MYSQLI_ASSOC);
        ?>
        <table class="table text-center">
            <tr>
                <th>image</th>
                <th>active en front</th>
                <th>Type</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
            <?php
                foreach($competences as $competence):
            ?>
                    <tr>
                        <td width="40%">
                            <image style="width: 70%" class="img-fluid" src="../assets/images/upload/<?= $competence["image"] ?>" alt="image-compétence">
                        <td>
                            <?php
                                if ($competence["active"] == 0):
                                    echo "non";
                                else:
                                    echo "oui";
                                endif;
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($competence["type"] == 1):
                                    echo "Front-End";
                                else:
                                    echo "Back-End";
                                endif;
                            ?>
                        </td>
                        <td><?= $competence["titre"]; ?></td>
                        <td>
                            <a type="button" class="btn bg-primary text-light fw-bold" href="updateCompetence.php?id=<?= $competence["id_competence"]; ?>">Modifier</a>
                            <a type="button" class="btn bg-success text-light fw-bold" href="readCompetence.php?id=<?= $competence["id_competence"]; ?>">Détail</a>
                            <a type="button" class="btn bg-danger text-light fw-bold" href="deleteCompetence.php?id=<?= $competence["id_competence"]; ?>">Supprimer</a>
                        </td>
                    </tr>
            <?php
                endforeach;
            ?>
        </table>
        <div class="col-3">
            <a type="button" class="btn bg-primary text-light fw-bold" href="createCompetence.php">Créer une compétence</a>
        </div>
    </div>
</main>
<?php
    include("../assets/inc/footerBack.php");
?>