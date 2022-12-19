Nous allons créer un site Portfolio
    -partie front
    -partie back-office (admin) qui permettra au webmaster (vous) de configurer le site ou récupérer des informations

    - au niveau de la bdd
        .l'accès au back-office
        - une table user (avec plusiers champs ou colonnes)
            - nom
            - prenom
            - email
            - password
            - role
        .messagerie
        - une table message
            - nom
            - prenom
            - societe
            - email
            - telephone
            - description
        .compétence
        - une table competence
            - type
            - titre
            - texte
            - image
            - lien
            - active
        

* création de l'architecture (arborescence des dossiers et fichiers)
* création de la table user dans la bdd portfolio
* création du dossier et fichier aide/creerUnAdminDuSite.php
    -ce fichier va nous permettre de créer un formulaire pour enregistrer un administrateur qui aura accès au back-office (console d'administration) de notre site (pour le portfolio vous-même)
* création d'une barre de navigation dans le fichier assets/inc/headerFront.php
* création du fichier admin/index.php qui va gérer le formulaire de connexion au back-office
* création du fichier core/userController.php qui va gérer les différentes fonctions (login logout et le crud de la table user)
Ces fonctions prennent en charge les messages flash



