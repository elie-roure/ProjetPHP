<html>
    <body>
        <?php
            echo "Vous n'avez pas taper deux fois le même mot de passe <br/>";
            $create = true;
            $login = $_POST["login"];
            $prenom = $_POST["Prenom"];
            $mdp = $_POST["mdp"];
            $mdpconfirm = $_POST["mdpconfirm"];
            $nom = $_POST["Nom"];
            require_once("update.php");
        ?>
    </body>
</html>
