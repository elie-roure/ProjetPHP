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
    
    public static function create(){
        $idPierre = "";
        $nom = "";
        $prix = "";
        $poids = "";
        $volume = "";
        $paysProvenance="";
        $form = "required";
        $act = "created";
        $pagetitle='Nouveau produit';
        $controller='pierre';
        $view='update';
        require (File::build_path(array("view", "view.php")));
    }
    
    public static function created() {
        $data = array(
            "idPierre" => $_GET["idPierre"],
            "nom" => $_GET["nom"],
            "prix" => $_GET["prix"],
            "poids" => $_GET["poids"],
            "volume"=> $_GET["volume"],
            "paysProvenance"=>$_GET["paysProvenance"],
        );
        
            $p = new ModelPierre($_GET["idPierre"], $_GET["nom"], $_GET["prix"], $_GET["poids"], $_GET["volume"], $_GET["paysprovenance"]);
            ModelPierre::save($data);
            $tab_p = ModelPierre::selectAll();
            $controller = ('pierre');
            $view = 'created';
            $pagetitle = 'Tous nos produits';
            require (File::build_path(array("view", "view.php")));
        
    }
    
    public static function error(){
        $controller=('pierre');
        $view='error';
        $pagetitle='Erreur';
        require (File::build_path(array("view", "view.php")));         
    }
    
    public static function update(){
        $act = "updated";
        $form = "readonly";
        $pagetitle='Mise à jour informations produit';
        $idPierre = $_GET["idpierre"];
        
        $p = ModelPierre::select($idPierre);
        $nom = $p->getNom();
        $poids = $p->getPoids();
        $prix = $p->getPrix();
        $volume = $p->getVolume();
        $paysProvenance = $p->getPaysProvenance();
        if ($p == null) {
            $controller=('pierre');
            $view='error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller='pierre';
            $view='update';
            require (File::build_path(array("view", "view.php")));
        }
    }
    
    public static function updated(){
        $tab_p = ModelPierre::selectAll();
        $pagetitle='Produit mis à jour';
        $idPierre = $_GET["idPierre"];
        $data = array(
        "nom" => $_GET["nom"],
        "prix" => $_GET["prix"],
        "volume" => $_GET["volume"],
        "paysProvenance" => $_GET["paysProvenance"],
        "primary" => $_GET["idPierre"],
        );
        $p = ModelPierre::select($idPierre);
        $p->update($data);
        $controller="pierre";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }
    
    
    
    
}
