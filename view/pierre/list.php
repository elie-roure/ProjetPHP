
<?php

foreach ($tab_p as $p){
    $link = "images/id" . $p->getIdPierre() . ".jpg";
    $prix = $p->getPrix();
    $nom = $p->getNom();
    $id = rawurlencode($p->getIdPierre());

//echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

    echo '<div class="produit">
            <a href= "index.php?action=read&idpierre=' . $id . '"><strong>' . $nom . " : " . $prix . "€</strong></a>" .
     ' <div class ="picture">
            <br><a href= "index.php?action=read&idpierre=' . $id . '"><img src="' . $link . '"alt="id' . $id . '" height=200px width=200px/></a>
                </div>
        </div>';
    
            
}
?>




<?php

echo '<br><a href="index.php?action=create" class="ajout"> Vous souhaiter mettre une pierre en vente ? </a>';
?>
        


