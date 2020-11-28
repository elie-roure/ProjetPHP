<!DOCTYPE html>
<html>
        <?php
        echo "<p>Le produit n° " . htmlspecialchars($id) . " a bien été supprimée. <br>"
                . "Il disparaitra de la liste dans les prochaines minutes.</p>" ;
        require (File::build_path(array("view", "pierre", "list.php")));
        
        ?>
    </body>
</html>