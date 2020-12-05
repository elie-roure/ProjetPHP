


<form method="get" action="index.php" controller="pierre">
    <fieldset>
        <legend>Informations produit :</legend>
        <p>  
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <label for="pierre_id">Id Produit</label> :
            <input type="int" <?php echo "value=\"" . htmlspecialchars($idPierre) . "\"" ?> name="idPierre" id="pierre_id" <?php echo "$form=\"" . htmlspecialchars($idPierre) . "\"" ?>/>
        </p> 
        <p>
            <label for="nom">Nom</label> :
            <input type="text" placeholder="Ex : Diamant taillé" <?php echo "value=\"" . htmlspecialchars($nom) . "\"" ?> name="nom" id="nom_id" required/>
        </p>
        <p>
            <label for="prix">Prix</label> :
            <input type="double" placeholder="Ex : 94.3" <?php echo "value=\"" . htmlspecialchars($prix) . "\"" ?> name="prix" id="prix_id" required/>
        </p>
        <p>
            <label for="volume">Volume (en cm cube)</label> :
            <input type="double" placeholder="Ex : 31.4" <?php echo "value=\"" . htmlspecialchars($volume) . "\"" ?> name="volume" id="volume_id" required/>
        </p>
        <p>
            <label for="poids">Poids (en grammes)</label> :
            <input type="double" placeholder="Ex : 24.7" <?php echo "value=\"" . htmlspecialchars($poids) . "\"" ?> name="poids" id="poids_id" required/>
        </p>
        <p>
            <label for="paysProvenance">Pays de provenance</label> :
            <input type="text" placeholder="Ex : Australie" <?php echo "value=\"" . htmlspecialchars($paysProvenance) . "\"" ?> name="paysProvenance" id="paysProvenance_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
</form>





