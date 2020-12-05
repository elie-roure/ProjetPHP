<?php
if ($falsemdp) {
    $loginlabel = $login;
    $mdplabel = $mdp;
}
?>


<form method="post" action="index.php?controller=utilisateur&action=connected">
    <fieldset>
        <legend>Connexion</legend>
        <p>
            <label for="loginid">Login</label>
            <input type="text" name="login" value="<?= $falsemdp ? $loginlabel : "" ?>" required id="loginid"><br/>
        </p>
        <p>
            <label for="mdpid">Mot de passe</label>
            <input type="password" name="mdp" required value="<?= $falsemdp ? $mdplabel : "" ?>" id="mdpid"><br/>
        </p>
        <p>
            <input type="submit" value="Connexion" />
        </p>
        <p>
            Vous n'êtes pas encore inscrit ? <a href="index.php?action=create&controller=utilisateur">Inscrivez-vous ici</a> !
        </p>
    </fieldset>
</form>
