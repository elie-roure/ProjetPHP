<?php

echo "L''utilisateur de login " . htmlspecialchars($login) . " a bien été supprimée";
require (File::build_path(array("view", "pierre", "list.php")));
