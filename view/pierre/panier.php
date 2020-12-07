<div class="precision">
<h2>Votre panier :</h2>
<?php
if (!isset($_COOKIE["panier"]) || empty($_COOKIE["panier"])) {
    echo "<p>Votre panier est vide</p>";
} else {

    foreach (unserialize($_COOKIE["panier"]) as $value) {
        $p = ModelPierre::select($value);
        $link = "images/id" . $p->getIdPierre() . ".jpg";
        $prix = $p->getPrix();
        $nom = $p->getNom();
        $id = rawurlencode($p->getIdPierre());

//echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

        echo '<div class="prod">'
        . '<a class="lienP" href= "index.php?action=read&idpierre=' . $id . '"><img class="imgP"src="' . $link . '"alt="id' . $id . '" height=50px width=50px/></a>' . '
            <h3><a href= "index.php?action=read&idpierre=' . $id . '"><strong>' . $nom . " : " . $prix . "€</strong></a></h3>" .
        ' 
            <a href= "index.php?controller=pierre&action=supprimerPanier&idpierre=' . $id . '">Supprimer du panier</a><br/><br/><br/>'
                . '</div>';
    }
    
    echo '<h3>Total : ' . $_SESSION['prixPanier'] . '€</h3>'; 
    echo '<h3><a href="index.php?controller=commande&action=validerCommande">Valider la commande</a></h3><br>';
    echo '<p><a href="index.php?controller=pierre&action=viderPanier">Vider le panier</a></p>';
    
}
?>
</div>