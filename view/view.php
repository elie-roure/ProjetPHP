
<?php
$login_action = (isset($_SESSION['login']) ? "deconnect" : "connect" );
$login_label = (isset($_SESSION['login']) ? "Déconnexion" : "Connexion" );
?>

<!DOCTYPE html>

<html>


    <head>
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">



    </head>

    <body>
        <div class ="wrapper">
            <header>
                <nav>
                    <p><a href = index.php?action=readAll > Accueil</a></p>

                    <p><a href="index.php?action=<?= $login_action ?>&controller=utilisateur"><?= $login_label ?></a></p> 
                    <?= (!isset($_SESSION['login']) ? '<p><a href="index.php?action=create&controller=utilisateur">Inscription</a></p>' : "") ?>
                    <?= (isset($_SESSION['login']) ? "<p><a href=\"index.php?action=read&controller=utilisateur&login=" . $_SESSION["login"] . "\">Profil</a></p>" : "") ?>
                    <?= "<p><a href=\"index.php?controller=pierre&action=afficherPanier\">Mon panier</a>"?>
                    <?= (Session::is_admin()) ? "<p><a href =\"index.php?action=readAll&controller=utilisateur\">Tous les utilisateurs (admin)</a></p>" : "" ?>
                </nav>
            </header>
            <div>

                <?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"


                $filepath = File::build_path(array("view", $controller, "$view.php"));
                require $filepath;
                ?>

            </div>
    </body>
    <footer>
        <p>Site vente de pierres de Elie Roure, Etienne Tillier et Guilhem Cros</p>
    </footer>
</div>



</html>
