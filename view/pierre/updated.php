


<?php
$create = false;
echo "<p>Les modifications apportées au produit " . htmlspecialchars($idPierre) . " ont été enregistrées</p>";
require (File::build_path(array("view", "pierre", "list.php")));
?>
    


