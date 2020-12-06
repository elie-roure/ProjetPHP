<?php
    echo ' <h2>Commande du '. $_GET["date"] . '</h2>';
    require (File::build_path(array("view", "commande", "detail.php")));


