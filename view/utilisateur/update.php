


<form method="post" action="index.php?controller=utilisateur&action=<?= ($create ? "created" : "updated") ?>">
    <fieldset>
        <legend><?= ($create ? "Inscription" : "Mise à jour utilisateur") ?></legend>
        <p>
            <label for="login_id">Login</label> :
            <input type="text" placeholder="Ex : jean66" name="login" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($login) ?>" id="login_id"/>
        </p>
        <p>
            <label for="password_id">Mot de passe</label> :
            <input type="password" minlength="6" name="mdp" id="password_id" required="Veuillez remplir ce champs"/>
        </p>
        <p>
            <label for="password_id_confirm">Confirmation mot de passe</label> :
            <input type="password" minlength="6" name="mdpconfirm" id="password_id_confirm" required='Veuillez remplir ce champs'/>
        </p>
        <p>
            <label for="Nom_id">Nom</label> :
            <input type="text" value="<?= htmlspecialchars($nom) ?>"  placeholder="Ex : Maurisson" name="Nom" id="Nom_id" required/>
        </p>
        <p>
            <label for="prenom_id">Prénom</label> :
            <input type="text" placeholder="Ex : Paul" value="<?= htmlspecialchars($prenom) ?>"    name="Prenom" id="prenom_id" required/>
        </p>
        <p>
            <label for="email_id">Mail</label> :
            <input type="email" placeholder="Ex : jean66@gmail.com" value="<?= htmlspecialchars($email) ?>" name="email" id="email_id" required/>
        </p>
        <?= (Session::is_admin() ? '<label for="imput_admin">Admin</label><br/><input type="checkbox" name="admin" value="1" id="imput_admin">' : "") ?>
        <p>
            <input type="submit" value="<?= $create ? "S'inscrire" : "Mettre à jour" ?>" />

        </p>
        <p>
            Vous êtes déjà inscrit ? <a href="index.php?action=connect&controller=utilisateur">Connectez-vous ici</a> !
        </p>
    </fieldset>
</form>

