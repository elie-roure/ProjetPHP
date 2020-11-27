<!DOCTYPE html>
<html>
    <body>
        <?php
        $update = "<a href=\"index.php?controller=utilisateur&action=update&login=".rawurlencode($_GET['login'])."\">Mettre à jour</a>";
        $delete = "<a href=\"index.php?controller=utilisateur&action=delete&login=".rawurlencode($_GET["login"])."\">Supprimer l'utilisateur</a>";
            echo
        "L'utilisateur : ".'<br><ul>
            <li> ' . htmlspecialchars($v->getLogin()) . '</li>
            <li> ' . htmlspecialchars($v->getNom()) . '</li>
            <li> ' . htmlspecialchars($v->getPrenom()) . ' </li></ul><br>';

            ?>
        <?= (Session::is_user($_GET["login"]) || Session::is_admin() ? $update . " " . $delete : "" ) ?>


    </body>
</html>
