<div class="precision">
<?php

echo "<h2> Vos commandes :</h2>";
if (empty($dates)) {
    echo "<p>Aucune commande trouvée dans l'historique de commande.</p>";
} else {
    foreach ($dates as $value) {

        echo '<p><a href="index.php?controller=commande&action=read&date=' . rawurlencode($value[0]) . '">Commande du ' . htmlspecialchars($value[0]) . '</a></p><br/>';
    }
}
?>
</div>