<html>
   
    <body>
        <form method="get" action="index.php?">
          <fieldset>
            <legend><?= ($create ? "Inscription" : "Mise à jour utilisateur") ?></legend>
            <p>
              <input type='hidden' name='action' value=<?= ($create ? "created" : "updated")?>>
              <input type='hidden' name='controller' value='utilisateur'>
              <label for="login_id">Login</label> :
              <input type="text" placeholder="Ex : jean66" name="login" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($login)?>" id="login_id"/>
            </p>
            <p>
                <label for="password_id">Mot de passe</label> :
                <input type="password" minlength="6" name="mdp" id="mdp" <?= ($create ? "required" : "")?> value="<?= htmlspecialchars($mdp)?>"/>
            </p>
             <p>
                <label for="password_id">Confirmation mot de passe</label> :
                <input type="password" minlength="6" name="mdpconfirm" id="mdp" <?= ($create ? "required" : "")?> value="<?= htmlspecialchars($mdp)?>"/>
            </p>
            <p>
              <label for="Nom_id">Nom</label> :
              <input type="text" value="<?=  htmlspecialchars($nom)?>"  placeholder="Ex : Maurisson" name="Nom" id="nom_id" required/>
            </p>
            <p>
              <label for="mark_id">Prénom</label> :
              <input type="text" placeholder="Ex : Paul" value="<?= htmlspecialchars($prenom)?>"    name="Prenom" id="prenom_id" required/>
            </p>
            <?= (Session::is_admin() ? '<label for="imput_admin">Admin</label><br/><input type="checkbox" name="admin" value="1" id="imput_admin">' : "")?>
            <p>
              <input type="submit" value="Envoyer" />
            </p>
          </fieldset>
        </form>


    </body>
</html>