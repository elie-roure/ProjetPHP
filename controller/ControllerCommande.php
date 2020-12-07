<?php

require_once (File::build_path(array("model", "ModelCommande.php")));

class ControllerCommande {

    protected static $object = 'commande';

    public static function validerCommande() {
        if (isset($_SESSION['login'])) {
            if (isset($_COOKIE["panier"]) && !empty(unserialize($_COOKIE["panier"]))) {
                $panier = unserialize($_COOKIE["panier"]);
                foreach ($panier as $value) {
                    $data = array(
                        'login' => $_SESSION["login"],
                        'idPierre' => $value,
                        'date' => date('Y-m-d')
                    );
                    ModelCommande::save($data);
                }
                $data = array(
                        'login' => $_SESSION["login"],
                        'date' => date('Y-m-d')
                    );
                $tab = ModelCommande::select($data);
                foreach($tab as $value){
                    $array = array(
                        'primary' => $value->getIdPierre(),
                        'estAchete' => 1
                    );
                    ModelPierre::update($array);
                }
                $panier = array();
                setcookie ("panier", serialize($panier), time()+3600);
                $_SESSION["prixPanier"] = 0;
                $controller = 'commande';
                $view = 'recapitulatif';
                $pagetitle='Récapitulatif Commande';
                require File::build_path(array('view','view.php'));
            }
            else {
                $controller = 'commande';
                $view = 'panierVide';
                $pagetitle='Panier vide';
                require File::build_path(array('view','view.php'));
            }
        }
        else {
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle='Connectez-vous';
            $falsemdp=false;
            require File::build_path(array('view','view.php'));
        }
    }
    
    public static function read(){
            if (isset($_SESSION['login'])) {
                $data = array (
                    'date' => $_GET["date"],
                    'login' => $_SESSION['login']
                );
                $tab = ModelCommande::select($data);
                $controller = 'commande';
                $view = 'read';
                $pagetitle='Votre commande';
                require File::build_path(array('view','view.php'));
            }
            else {
                $controller = 'utilisateur';
                $view = 'connect';
                $pagetitle='Connectez-vous';
                require File::build_path(array('view','view.php'));
            }
    }
    
    public static function readAll(){
        if (isset($_SESSION['login'])) {
            $dates = ModelCommande::getAllDate($_SESSION['login']);
            $controller = 'commande';
            $view = 'list';
            $pagetitle='Vos commandes';
            require File::build_path(array('view','view.php'));
        }
        else {
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle='Connectez-vous';
            require File::build_path(array('view','view.php'));
        }
    }

}
