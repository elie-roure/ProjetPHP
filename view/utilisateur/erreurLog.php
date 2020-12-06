<p>Erreur, ce nom d'utilisateur est déjà existant</p>
<?php
$create = true;
$login = $_POST["login"];
$prenom = $_POST["Prenom"];
$mdp = $_POST["mdp"];
$mdpconfirm = $_POST["mdpconfirm"];
$email = $_POST["email"];
$nom = $_POST["Nom"];
require_once("update.php");
?>

