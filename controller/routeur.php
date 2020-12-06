<?php


require_once File::build_path(array('controller','ControllerPierre.php'));
require_once File::build_path(array('controller','ControllerUtilisateur.php'));
require_once File::build_path(array('controller','ControllerCommande.php'));
// On recupère l'action passée dans l'URL
if (isset($_GET['action'])){
    $action = $_GET["action"];
}
else {
    $action = "readAll";
}

    $controller_default = 'pierre';


if (isset($_GET['controller'])){
    $controller_default = $_GET['controller'];
}


$controller_class = 'Controller'.ucfirst($controller_default);
$method = get_class_methods($controller_class);

if(class_exists($controller_class)){
    if (in_array($action, $method)){
    $controller_class::$action(); 
}
else {
    ControllerPierre::error();
}
}
else {
    ControllerPierre::error();
}



// Appel de la méthode statique $action de Co&immat=7854123ntrollerVoiture

?>