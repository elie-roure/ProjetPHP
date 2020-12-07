<div class="precision">
<?php
foreach ($tab as $value){
    $d = $value->getIdPierre();
    $p = ModelPierre::select($d);
    $link = "images/id" . $p->getIdPierre() . ".jpg";
    $prix = $p->getPrix();
    $nom = $p->getNom();
    $id = rawurlencode($p->getIdPierre());

//echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

        echo '<a class="lienP" href= "index.php?action=read&idpierre=' . $id . '"><img class="imgP"src="' . $link . '"alt="id' . $id . '" height=50px width=50px/></a>' . '
            <h3><a href= "index.php?action=read&idpierre=' . $id . '"><strong>' . $nom . " : " . $prix . "€</strong></a></h3>";
    
}

    echo '<h3>Prix Total : '. ModelCommande::getPrixTotal($data) .' </h3>';
    ?>
</div>