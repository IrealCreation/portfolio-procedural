<?php
    include("../assets/inc/headBack.php"); 
?>
<title>Liste des utilisateurs inscrits</title>
<?php
    include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h1>Liste des utilisateurs</h1>
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
            $sql = "SELECT  `id_user`,
                            `nom`,
                            `prenom`,
                            `email`,
                            `role`
                    FROM `user`
            ";
            // execution de la requète avec la connexion
            $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
            // Retour de la requète sous forme de tableau associatif
            $users = mysqli_fetch_all($query, MYSQLI_ASSOC);
        ?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php
                foreach($users as $user) {
                    /* 
                        TODO: pour chaque utilisateur, créer une nouvelle ligne (tr) et afficher ses informations dans des cellules (td)
                    */
                    ?>
                    <tr>
                        <td>
                            <a href="updateUser.php?id=<?= $user["id_user"]; ?>">
                                <?= $user["id_user"]; ?>
                            </a>
                        </td>
                        <td><?= $user["nom"]; ?></td>
                        <td><?= $user["prenom"]; ?></td>
                        <td><?= $user["email"]; ?></td>
                        <td><?php
                            if($user["role"] == 1) {
                                echo "Administrateur";
                            }
                            else {
                                echo "Utilisateur";
                            }
                        ?></td>
                        <td>[Suppression]</td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</main>
<?php
    include("../assets/inc/footerBack.php");
?>