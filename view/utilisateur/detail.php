<!DOCTYPE html>
<html>
    <body>
        <?php
        $login_label = $v->getLogin();
        
        if (isset($_GET["action"]) && $_GET["action"] == "created"){
            echo 'Votre inscription a été réalisée <br/><br/>';
        }
        
        $update = "<a href=\"index.php?controller=utilisateur&action=update&login=".rawurlencode($login_label)."\">Mettre à jour</a>";
        $delete = "<a href=\"index.php?controller=utilisateur&action=delete&login=".rawurlencode($login_label)."\">Supprimer l'utilisateur</a>";
            echo
        "Profil de " . htmlspecialchars($login_label) . " : ".'<br><ul>
            <li> Login : ' . htmlspecialchars($v->getLogin()) . '</li>
            <li> Nom : ' . htmlspecialchars($v->getNom()) . '</li>
            <li> Prénom : ' . htmlspecialchars($v->getPrenom()) . ' </li></ul><br>';

            ?>
        <?= (Session::is_user($login_label) || Session::is_admin() ? $update . " " . $delete : "" ) ?>


    </body>
</html>
