<html>
    <body>
        <p>Le mot de passe ou le nom de compte ne convient pas pour vous connecter.</p>
        <?php 
            $falsemdp = true;
            $mdp = $_POST["mdp"];
            $login = $_POST["login"];
        ?>
        <?php require_once"connect.php";?>
    </body>
</html>
