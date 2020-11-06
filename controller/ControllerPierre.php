<?php

require_once (File::build_path(array("model", "ModelPierre.php")));
class ControllerPierre {
    protected static $object = 'pierre';
    
    public static function readAll() {
        $tab_p = ModelPierre::selectAll();     //appel au modèle pour gerer la BD
        $controller=('pierre');
        $view='list';
        $pagetitle='Stonezone : Tous nos minéraux';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }
    
    public static function read() {
        $pagetitle='Détails';
        $idPierre = $_GET["idpierre"];
        $p = ModelPierre::select($idPierre);
        if ($p == null) {
            $controller=('pierre');
            $view='error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller='pierre';
            $view='detail';
            require (File::build_path(array("view", "view.php")));
        }
    }
}
