<?php

require_once (File::build_path(array("model", "ModelPierre.php")));

class ControllerPierre {

    protected static $object = 'pierre';

    public static function readAll() {
        $tab_p = ModelPierre::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('pierre');
        $view = 'list';
        $pagetitle = 'Stonezone : Tous nos minéraux';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $pagetitle = 'Détails';
        $idPierre = $_GET["idpierre"];
        $p = ModelPierre::select($idPierre);
        if ($p == null) {
            $controller = ('pierre');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'pierre';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function create() {
        if (Session::is_admin()) {
            $idPierre = "";
            $nom = "";
            $prix = "";
            $poids = "";
            $volume = "";
            $paysProvenance = "";
            $form = "readonly";
            $act = "created";
            $pagetitle = 'Nouveau produit';
            $controller = 'pierre';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        } else {
            header("Location: index.php?controller=pierre&action=error");
        }
    }

    public static function created() {
        if (Session::is_admin()) {
            $data = array(
                "idPierre" => "",
                "nom" => $_GET["nom"],
                "prix" => $_GET["prix"],
                "poids" => $_GET["poids"],
                "volume" => $_GET["volume"],
                "paysProvenance" => $_GET["paysProvenance"],
                "estAchete" => "",
            );

            $p = new ModelPierre($_GET["nom"], $_GET["prix"], $_GET["poids"], $_GET["volume"], $_GET["paysProvenance"]);
            ModelPierre::save($data);
            $tab_p = ModelPierre::selectAll();
            $controller = ('pierre');
            $view = 'created';
            $pagetitle = 'Tous nos produits';
            require (File::build_path(array("view", "view.php")));
        } else {
            header("Location: index.php?controller=pierre&action=error");
        }
    }

    public static function error() {
        $controller = ('pierre');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    public static function update() {
        if (Session::is_admin()) {
            $act = "updated";
            $form = "readonly";
            $pagetitle = 'Mise à jour informations produit';
            $idPierre = $_GET["idpierre"];

            $p = ModelPierre::select($idPierre);
            $nom = $p->getNom();
            $poids = $p->getPoids();
            $prix = $p->getPrix();
            $volume = $p->getVolume();
            $paysProvenance = $p->getPaysProvenance();
            if ($p == null) {
                $controller = ('pierre');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                $controller = 'pierre';
                $view = 'update';
                require (File::build_path(array("view", "view.php")));
            }
        } else {
            header("Location: index.php?controller=pierre&action=error");
        }
    }

    public static function updated() {
        if (Session::is_admin()) {
            $tab_p = ModelPierre::selectAll();
            $pagetitle = 'Produit mis à jour';
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
            $controller = "pierre";
            $view = 'updated';
            require (File::build_path(array("view", "view.php")));
        } else {
            header("Location: index.php?controller=pierre&action=error");
        }
    }

    public static function delete() {
        if (Session::is_admin()) {
            $tab_p = ModelPierre::selectAll();     //appel au modèle pour gerer la BD
            $idPierre = $_GET["idpierre"];
            $p = ModelPierre::select($idPierre);
            if ($p == null) {
                $pagetitle = 'Erreur produit';
                $controller = ('pierre');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                
                
                ModelPierre::delete($idPierre);
                $controller = ('pierre');
                $view = 'delete';
                $pagetitle = 'Suppression de produit';
                require (File::build_path(array("view", "view.php")));
                
            }
        } else {
            header("Location: index.php?controller=pierre&action=error");
        }
    }

    public static function ajouterPanier() {
        $panier = unserialize($_COOKIE["panier"]);
        if (!in_array($_GET['idpierre'], $panier) && !ModelPierre::estAchete($_GET["idpierre"])) {
            array_push($panier, $_GET["idpierre"]);
            setcookie("panier", serialize($panier), time() + 3600);
            $p = ModelPierre::select($_GET["idpierre"]);
            $_SESSION["prixPanier"] = $_SESSION["prixPanier"] + $p->getPrix();
            $controller = ('pierre');
            $view = 'ajoutPanier';
            $pagetitle = 'Ajout de produit au panier';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = ('pierre');
            $view = 'problemePanier';
            $pagetitle = 'Panier';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function supprimerPanier() {

        $panier = unserialize($_COOKIE["panier"]);
        $p = ModelPierre::select($_GET["idpierre"]);
        if (in_array($_GET["idpierre"], $panier)) {
            $_SESSION["prixPanier"] = $_SESSION["prixPanier"] - $p->getPrix();
        }
        unset($panier[array_search($_GET["idpierre"], $panier)]);
        sort($panier);
        setcookie("panier", serialize($panier), time() + 3600);
        $controller = ('pierre');
        $view = 'supprimerPanier';
        $pagetitle = 'Supression de produit du panier';
        require (File::build_path(array("view", "view.php")));
    }

    public static function afficherPanier() {
        $controller = ('pierre');
        $view = 'panier';
        $pagetitle = 'Votre panier';
        require (File::build_path(array("view", "view.php")));
    }

    public static function viderPanier() {
        $panier = array();
        setcookie("panier", serialize($panier), time() + 3600);
        $_SESSION["prixPanier"] = 0;
        $controller = ('pierre');
        $view = 'viderPanier';
        $pagetitle = 'Votre panier';
        require (File::build_path(array("view", "view.php")));
    }

}
