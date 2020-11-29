<!DOCTYPE html>
<html>
    <body>
        <?php
        $login_label = $v->getLogin();
        
        $update = "<a href=\"index.php?controller=utilisateur&action=update&login=".rawurlencode($login_label)."\">Mettre à jour</a>";
        $delete = "<a href=\"index.php?controller=utilisateur&action=delete&login=".rawurlencode($login_label)."\">Supprimer l'utilisateur</a>";
            echo
        "L'utilisateur : ".'<br><ul>
            <li> ' . htmlspecialchars($v->getLogin()) . '</li>
            <li> ' . htmlspecialchars($v->getNom()) . '</li>
            <li> ' . htmlspecialchars($v->getPrenom()) . ' </li></ul><br>';

            ?>
        <?= (Session::is_user($login_label) || Session::is_admin() ? $update . " " . $delete : "" ) ?>


    </body>
</html>
