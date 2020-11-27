<!DOCTYPE html>
<html>
   
    <body>
        <?php

        
        
        foreach ($tab_p as $p)
            $link = "images/id" .$p->getIdPierre() .".jpg";
            
            echo "<p> " . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></p>';
                
        ?>
        <br><br>
        <a href="index.php?action=create"> Vous souhaiter mettre une pierre en vente ? </a>
   

 </body>
</html>