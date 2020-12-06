
<?php

foreach ($tab_p as $p) {
    $link = "images/id" . $p->getIdPierre() . ".jpg";
    $prix = $p->getPrix();
    $nom = $p->getNom();
    $id = rawurlencode($p->getIdPierre());
    if(in_array($p, ModelPierre::selectAll())){
    if (!ModelPierre::estAchete($p->getIdPierre())) {

//echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

        echo '<div class="produit">
            <a href= "index.php?action=read&idpierre=' . $id . '"><strong>' . $nom . " : " . $prix . "€</strong></a>"
        . ' <div class ="picture">
                <br><a class="lienP" href= "index.php?action=read&idpierre=' . $id . '"><img class="imgP"src="' . $link . '"alt="id' . $id . '" height=200px width=200px/></a>
                </div>
        </div>';
    }
}
}
?>






<?= Session::is_admin() ? '<br><a class="addP" href="index.php?action=create" class="ajout"> Ajouter un nouveau produit </a>' : "" ?>




