<?php
    // il faut créer un user avec le role admin dans la bdd pour avoir
    // une personne administrateur du back-offce (console
    // d'administration).
    // pour cela, on créer un formulaire user pour renseigner la bdd.
    // Au niveau du CRUD, nous allons faire un Create avec l'instruction
    // SQL INSERT INTO
    include("../assets/inc/headFront.php");
?>
<title>création d'un admin</title>
<?php
    include("../assets/inc/headerFront.php");
?>
<main>
    <div class="container">
        <div class="row">
            <h3>Admin</h3>
            <div class="col-4">
                <form class="form-group" action="" method="post">
                    <input class="form-control mt-3" type="text" name="nom" placeholder="votre nom">
                    <input class="form-control mt-3"type="text" name="prenom" placeholder="Votre prénom">
                    <input class="form-control mt-3" type="email" name="email" placeholder="Votre email">
                    <input class="form-control mt-3" type="password" name="password" placeholder="Votre mot de passe">
                    <button class="btn bg-primary text-light fw-bold mt-3" type="submit" name="soumettre">Enregistrer</button>
                </form>
                <?php
                    // on récupère le fichier de connexion -> connexion.php qui correspond aux paramètres de connexions de notre bdd
                    require("../core/connexion.php");
                    // une condition pour récupérer les données du formulaires
                    if (isset($_POST["soumettre"])):
                        // 1- récupération des données et formattage.
                        // on utilise des fonctions natives php pour
                        // formatter correctement le texte
                        // addslashes() rajoute un antislash devant
                        // les caractères spéciaux comme '
                        // trim() efface les espaces devant et
                        // derrière le mot
                        // ucfirst() met la 1ère lettre en majuscule
                        $nom = addslashes(trim(ucfirst($_POST["nom"])));
                        $prenom = addslashes(trim(ucfirst($_POST["prenom"])));
                        // strtolower() permet de mettre en minuscule
                        $email = trim(strtolower($_POST["email"]));
                        // la gestion du mot de passe
                        // encodage du mot de passe
                        $options = ['cost' => 12];
                        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT, $options);
                        // on dit que 1 est admin pour le rôle
                        $role = 1;
                        // 2- préparation de l'écriture SQL
                        $sql = "
                                INSERT INTO user (
                                                    nom,
                                                    prenom,
                                                    email,
                                                    password,
                                                    role
                                                )
                                VALUE (
                                        '$nom',
                                        '$prenom',
                                        '$email',
                                        '$password',
                                        '$role'
                                    )
                        ";
                        // 3- execuction de la requête avec les
                        // paramètres de connexion
                        mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
                        // 4- message 
                        $_SESSION["message"] = "Administrateur $nom $prenom est correctement ajouté à la BDD.";
                        // 5- redirection vers notre page d'accueil (index.php)
                        header("Location:../index.php");
                        exit;
                    endif;
                ?>
            </div>
        </div>
    </div>
</main>
<?php
    include("../assets/inc/footerFront.php");
?>