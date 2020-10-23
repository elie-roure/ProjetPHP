<?php

require_once File::build_path(array("controller", "ControllerVoiture.php"));
// On recupère l'action passée dans l'URL

if (!isset($_GET["action"])){
    $action = "readAll";
}
else{
    $action = $_GET["action"];
}
/*
if(!in_array($action, get_class_methods(ControllerVoiture)){
    
}
*/
// Appel de la méthode statique $action de ControllerVoiture
ControllerVoiture::$action(); 
?>


