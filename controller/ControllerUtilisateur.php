<?php
//require_once ('../model/ModelUtilisateur.php'); // chargement du modèle
require_once File::build_path(array('model','ModelUtilisateur.php'));
require_once File::build_path(array('lib','Security.php'));

class ControllerUtilisateur {
    public static function readAll() {
        $tab_v = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $controller = 'utilisateur';
        $view = 'list';
        $pagetitle='Liste des utilisateurs';
        require File::build_path(array('view','view.php'));
    }

    
    public static function read() {
        $login = $_GET["login"];
        $v = ModelUtilisateur::select($login);
        $controller = 'utilisateur';
        if ($v == null){
            $pagetitle = 'Utilisateur non trouvé';
            $view = 'error';
            require File::build_path(array('view','view.php'));
        }
        else{
            $pagetitle = 'Utilisateur en détail';
            $view = 'detail';
            require File::build_path(array('view','view.php'));
    }
        
    }
    
        public static function delete(){
            if (Session::is_user($_GET["login"])){
                $login = $_GET["login"];
                try {
                    ModelUtilisateur::delete($login);
                    $controller = 'utilisateur';
                    $view = 'deleted';
                    $tab_v = ModelUtilisateur::selectAll();
                    require File::build_path(array('view','view.php'));
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            }
            else {
                $controller = 'utilisateur';
                $view = 'connect';
                require File::build_path(array('view','view.php'));
            }
        }
    
        public static function create(){
            $login = '';
            $prenom = '';
            $nom = '';
            $create = true;
            $controller = 'utilisateur';
            $view = 'update';
            $pagetitle="Création d'un utilisateur";
            require File::build_path(array('view','view.php'));
        }
    
        public static function update(){
            if (Session::is_admin() || Session::is_user($_GET["login"])){
                $create = false;
                $login = $_GET["login"];    
                $v = ModelUtilisateur::select($login);
                $prenom = $v->getPrenom();
                $nom = $v->getNom();
                $pagetitle = 'Mise à jour utilisateur';
                $controller = 'utilisateur';
                $view = 'update';
                require File::build_path(array('view','view.php'));
            }else{
                $controller = 'utilisateur';
                $view = 'connect';
                require File::build_path(array('view','view.php'));
            }
        }
    
        public static function updated(){
            if (Session::is_user($_GET["login"]) || Session::is_admin()){
                if ($_GET["mdp"] == $_GET["mdpconfirm"]){
                    $data = array (
                        'primary' => $_GET["login"],
                        'nom' => $_GET["Nom"],
                        'prenom' => $_GET["Prenom"],
                        'mdp' => Security::hacher($_GET['mdp'])
                        );
                    if(isset($_GET["admin"]) && $_GET["admin"] == 1 && Session::is_admin()) {
                        $data["admin"] = 1;
                    }
                    ModelUtilisateur::update($data);
                    $tab_v = ModelUtilisateur::selectAll();
                    $controller = 'utilisateur';
                    $pagetitle = 'Utilisateur mise à jour';
                    $view = 'updated';
                }
                else {
                    $controller = 'utilisateur';
                    $view = 'mdp';
                    $tab_v = ModelUtilisateur::selectAll();
            }
          } else {
                $controller = 'utilisateur';
                $view = 'connect';
            }     
            require File::build_path(array('view','view.php'));
        }
    
        public static function created(){
            if ($_GET["mdp"] == $_GET["mdpconfirm"]){
                $data = array (
                    'primary' => $_GET["login"],
                    'nom' => $_GET["Nom"],
                    'prenom' => $_GET["Prenom"],
                    'mdp' => Security::hacher($_GET['mdp']),
                    'admin' => ""    
                    );
                if (isset($_GET["admin"]) && $_GET["admin"] == 1 && Session::is_admin()){
                    $data["admin"] = 1;
                }
                ModelUtilisateur::save($data);
                $controller = 'utilisateur';
                $view = 'created';
                $tab_v = ModelUtilisateur::selectAll();
                require File::build_path(array('view','view.php'));
        }
        else {
            $controller = 'utilisateur';
            $view = 'mdp';
            $tab_v = ModelUtilisateur::selectAll();
            require File::build_path(array('view','view.php'));
        }
    }
    
        public static function connect(){
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle="Connexion";
            require File::build_path(array('view','view.php'));
        }
    
        public static function connected(){
            if (ModelUtilisateur::checkPassword($_GET["login"], Security::hacher($_GET["mdp"]))){
                $_SESSION["login"] = $_GET["login"];
                if (ModelUtilisateur::isAdmin($_GET["login"])){
                    $_SESSION["admin"] = true;
                }
                else {
                    $_SESSION["admin"] = false;
                }
                $controller = 'utilisateur';
                $view = 'connected';
                $pagetitle="Profil";
                $v = ModelUtilisateur::select($_GET["login"]);
                require File::build_path(array('view','view.php'));
            }
            else {
                $controller = 'utilisateur';
                $view = 'wrongco';
                $pagetitle="Erreur de connexion";
                require File::build_path(array('view','view.php'));
            }

        }
        
        public static function deconnect(){
            session_destroy();
            session_unset();
            setcookie(session_name(),'',time()-1);
            header("Location: index.php?disconnected");
            
            
        }
}
?>
