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
            if (Session::is_user($_GET["login"]) || Session::is_admin()){
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
            $email = '';
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
                $email = $v->getEmail();
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
            if (Session::is_user($_POST["login"]) || Session::is_admin()){
                if ($_POST["mdp"] == $_POST["mdpconfirm"]){
                    $data = array (
                        'primary' => $_POST["login"],
                        'nom' => $_POST["Nom"],
                        'prenom' => $_POST["Prenom"],
                        'mdp' => Security::hacher($_POST['mdp']),
                        'email' => $_POST["email"]
                        );
                    if(isset($_POST["admin"]) && $_POST["admin"] == 1 && Session::is_admin()) {
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
            if ($_POST["mdp"] == $_POST["mdpconfirm"] && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                $data = array (
                    'primary' => $_POST["login"],
                    'nom' => $_POST["Nom"],
                    'prenom' => $_POST["Prenom"],
                    'mdp' => Security::hacher($_POST['mdp']),
                    'email' => $_POST["email"],
                    'nonce' => Security::generateRandomHex(),
                    'admin' => ""    
                    );
                if (isset($_POST["admin"]) && $_POST["admin"] == 1 && Session::is_admin()){
                    $data["admin"] = 1;
                }
                ModelUtilisateur::save($data);
                $v =  ModelUtilisateur::select($_POST["login"]);
                $_SESSION["login"] = $v->getlogin();
                $mail = "<h2>Validation du compte<h2/><br/><br/><p>Cliquer sur le lien pour valider votre compte : <a href= \"http://localhost/ProjetPHP/index.php?controller=utilisateur&action=validate&login=" . $v->getLogin() . "&nonce=" . $v->getNonce() ."\">lien</a></p>";
                mail($v->getEmail(), 'Validation Email pour StoneZone', $mail);
                $pagetitle = 'Profil';
                $controller = 'utilisateur';
                $view = 'detail';
                require File::build_path(array('view','view.php'));
        }
        else {
            $pagetitle = "Erreur d'inscription";
            $controller = 'utilisateur';
            $view = 'mdp';
            $tab_v = ModelUtilisateur::selectAll();
            require File::build_path(array('view','view.php'));
        }
    }
    
        public static function connect(){
            $falsemdp = false;
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle="Connexion";
            require File::build_path(array('view','view.php'));
        }
    
        public static function connected(){
            if (ModelUtilisateur::loginExist($_POST["login"]) && ModelUtilisateur::checkPassword($_POST["login"], Security::hacher($_POST["mdp"])) && ModelUtilisateur::select($_POST["login"])->getNonce() == NULL){
                $_SESSION["login"] = $_POST["login"];
                if (ModelUtilisateur::isAdmin($_POST["login"])){
                    $_SESSION["admin"] = true;
                }
                else {
                    $_SESSION["admin"] = false;
                }
                $controller = 'utilisateur';
                $view = 'connected';
                $pagetitle="Profil";
                $v = ModelUtilisateur::select($_POST["login"]);
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
        
       public static function validate(){
           if (ModelUtilisateur::loginExist($_GET["login"]) && ModelUtilisateur::select($_GET["login"])->getNonce() == $_GET["nonce"]){
               $v = ModelUtilisateur::select($_GET["login"]);
               $data = array (
                   'primary' => $_POST["login"],
                   'nonce' => "NULL",
               );
               ModelUtilisateur::update($data);
               $controller = "utilisateur";
               $view = "validated";
               $pagetitle = "Validation compte";
               require File::build_path(array('view','view.php'));
           }
           else {
               $controller = "utilisateur";
               $view = "notvalidated";
               $pagetitle = "Validation compte";
               require File::build_path(array('view','view.php'));
           }
       }
}
?>
