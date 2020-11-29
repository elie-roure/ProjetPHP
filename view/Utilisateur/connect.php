<?php 
    if ($falsemdp){
        $loginlabel = $login;
        $mdplabel = $mdp;
    }
?>

<html>
    <body>
        <form method="post" action="index.php?controller=utilisateur&action=connected">
            <fieldset>
                <legend>Connexion</legend>
                <label for="loginid">Login</label>
                <input type="text" name="login" value="<?= $falsemdp ? $loginlabel : "" ?>" required id="loginid"><br/>
                <label for="mdpid">Mot de passe</label>
                <input type="password" name="mdp" required value="<?= $falsemdp ? $mdplabel : "" ?>" id="mdpid"><br/>
                <input type="submit" value="Connexion" />
            </fieldset>
        </form>
    </body>
</html>