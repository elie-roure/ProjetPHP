<html>
    <body>
        <form method="get" action="index.php?">
            <fieldset>
                <legend>Connexion</legend>
                <input type="hidden" name="action" value="connected">
                <input type="hidden" name="controller" value="utilisateur">
                <p> Login :
                <input type="text" name="login" required>
                </p>
                <p> Mot de passe :
                <input type="password" name="mdp" required>
                </p>
                <input type="submit" value="Connexion" />
            </fieldset>
        </form>
    </body>
</html>