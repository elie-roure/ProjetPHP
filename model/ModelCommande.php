<?php

require_once File::build_path(array("model", "Model.php"));

class ModelCommande extends Model{
    private $idPierre;
    private $login;
    private $date;
    protected static $object = "commande";

    public static function select($data){
        try {
            $sql = "SELECT * from Commande WHERE date=:date AND login=:login";
    // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
    // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($data);
    // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelCommande");
            $tab = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (empty($tab))
            return false;
        return $tab;
    }
    
    public static function getPrixTotal($data){
        try {
            $sql = 'SELECT SUM(prix) FROM Commande JOIN Pierre ON Pierre.idPierre = Commande.idPierre WHERE date=:date AND login=:login';
            
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
            $prixTotal = $req_prep->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $prixTotal[0][0];
    }
    
    public static function getAllDate($login){
        try {
            $sql = "SELECT DISTINCT(date) FROM Commande WHERE login=:login";
            $req_prep = Model::$pdo->prepare($sql);
            $value = array (
                'login' => $login,
            );
            $req_prep->execute($value);
            $dates = $req_prep->fetchAll();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $dates;
    }
    
    function getIdPierre() {
        return $this->idPierre;
    }

    function getLogin() {
        return $this->login;
    }

    function getDate() {
        return $this->date;
    }


}