<?php
    include("assets/inc/headFront.php");
?>
        <title>Portfolio</title>
<?php
    include("assets/inc/headerFront.php");
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
            </div>
        </main>
<?php
    include("assets/inc/footerFront.php");
?>