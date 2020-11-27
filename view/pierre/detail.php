<?php
                $link = "images/id" .$p->getIdPierre() .".jpg";
                echo "<h2>" . ucfirst($p->getNom()) . "</h2>" . 
                        
                        '<img src="' . $link . '"alt="id1" height=150px width=150px/><br>' .
                        "<li> Poids : "  . htmlspecialchars($p->getPoids()) . "</li>" .
                        "<li> Volume : "  . htmlspecialchars($p->getVolume()) . "</li>" .
                        "<li> Provenance : "  . htmlspecialchars($p->getPaysProvenance()) . "</li>".
                        "<p> Cette pierre  est au prix de " . htmlspecialchars($p->getPrix()) . "." .
                '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>';
                
             

?>