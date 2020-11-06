<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    <nav style="border-bottom: 2px grey solid">
        <ul>
            
            <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll > Toutes nos pierres</a></li>
            <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=type> Par type</a></li>
            <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=forme> Par forme</a></li>


            </ul>
            </nav>
            </head>
            <body>
            <?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"

            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
            ?>
            </body>
            <footer>
                <p style="border: 1px solid black;text-align:right;padding-right:1em;">
                    Site vente de pierres de Elie Roure, Etienne Tillier et Guilhem Cros (le plus bo des 3)
                </p>
            </footer>
            </html>

