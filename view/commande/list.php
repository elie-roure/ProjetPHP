<?php
        
    echo "<h2> Vos commandes :</h2>";
    
    foreach($dates as $value){
        echo '<p><a href="index.php?controller=commande&action=read&date='. rawurlencode($value[0]) . '">Commande du ' . htmlspecialchars($value[0]) . '</a></p><br/>';
    }
