<?php

$link = "images/id" . $p->getIdPierre() . ".jpg";
echo '<div class = "precision"><h2>' . ucfirst($p->getNom()) . "</h2>" .
 '<img src="' . $link . '"alt="id1" height=200px width=200px/><br>' .
 "<li class> Poids : " . htmlspecialchars($p->getPoids()) . "</li>" .
 "<li class> Volume : " . htmlspecialchars($p->getVolume()) . "</li>" .
 "<li class> Provenance : " . htmlspecialchars($p->getPaysProvenance()) . "</li>" .
 "<p> Cette pierre  est au prix de <strong>" . htmlspecialchars($p->getPrix()) . "€</strong>.</p>";

if (Session::is_admin()) {
    echo '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>' .
    '<br><a href = "index.php?action=delete&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Supprimer le produit </a></div>';
}
?>