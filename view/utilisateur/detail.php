<div class="precision">
<?php

$login_label = $v->getLogin();

if (isset($_GET["action"]) && $_GET["action"] == "created") {
    echo '<p>Votre compte a bien été enregistré, pensez à confirmer votre inscription depuis le mail qui vous a été envoyé </p><br/>';
}

$update = "<a href=\"index.php?controller=utilisateur&action=update&login=" . rawurlencode($login_label) . "\">Mettre à jour</a>";
$delete = "<a href=\"index.php?controller=utilisateur&action=delete&login=" . rawurlencode($login_label) . "\">Supprimer l'utilisateur</a>";
echo
"Profil de " . htmlspecialchars($login_label) . " : " . '<br><ul>
            <li> Login : ' . htmlspecialchars($v->getLogin()) . '</li>
            <li> Nom : ' . htmlspecialchars($v->getNom()) . '</li>
            <li> Prénom : ' . htmlspecialchars($v->getPrenom()) . ' </li>
            <li> Mail : ' . htmlspecialchars($v->getEmail()) . '</li></ul><br>';

?>
<?= (isset($_SESSION['login']) && Session::is_user($v->getLogin()) ? '<p><a href="index.php?controller=commande&action=readAll">Vos commandes</a></p></br>' : "")?>
<?= (Session::is_user($login_label) || Session::is_admin() ? $update . "<br> " . $delete : "" ) ?>
</div>


