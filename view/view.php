
<!DOCTYPE html>

<html>

<head>
    <title><?php echo $pagetitle; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">

    

</head>

<body>
<header>
    <nav>
       <p><a href = index.php?action=readAll > Accueil</a></p>
       <p><a href = index.php?action=readAll> Tout les utilisateurs (admin)</a></p>
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
<footer>
    <p>Site vente de pierres de Elie Roure, Etienne Tillier et Guilhem Cros</p>
</footer>
</body>


</html>
