<p>Erreur, l'email renseigné n'est pas valide</p>
<?php

$login = $_POST["login"];
$prenom = $_POST["Prenom"];
$mdp = $_POST["mdp"];
$mdpconfirm = $_POST["mdpconfirm"];
$email = $_POST["email"];
$nom = $_POST["Nom"];
require_once("update.php");
?>