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
            - id_message (A.I. Auto Incrémentation primary key)
            - nom (VARCHAR 255) : non null
            - prenom (VARCHAR 255) : non null
            - societe (VARCHAR 255) : null
            - email (VARCHAR 255) : non null (clé unique)
            - telephone (VARCHAR 255) : null
            - description (TEXT) : non null
        .compétence
        - une table competence
            - id_competence (A.I. Auto Incrémentation primary key)
            - type (int 2) (1 : front-end 2: back-end): non null
            - titre (VARCHAR 255) : non null 
            - texte (VARCHAR 255) : null
            - image (VARCHAR 255) : null
            - lien (VARCHAR 255)  : null
            - active (Boolean) : non null
        

* création de l'architecture (arborescence des dossiers et fichiers)
* création de la table user dans la bdd portfolio
* création du dossier et fichier aide/creerUnAdminDuSite.php
    -ce fichier va nous permettre de créer un formulaire pour enregistrer un administrateur qui aura accès au back-office (console d'administration) de notre site (pour le portfolio vous-même)
* création d'une barre de navigation dans le fichier assets/inc/headerFront.php
* création du fichier admin/index.php qui va gérer le formulaire de connexion au back-office
* création du fichier core/userController.php qui va gérer les différentes fonctions (login logout et le crud de la table user)
Ces fonctions prennent en charge les messages flash
* création du crud au niveau de la table user
* création de la table competence en bdd 



