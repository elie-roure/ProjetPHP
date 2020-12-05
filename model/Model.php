<?php

require_once File::build_path(array("config", "Conf.php"));

class Model {

    public static $pdo;

    public static function Init() {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

// On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function selectAll() {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $rep = (Model::$pdo)->query("Select * From " . ucfirst($table_name));
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $rep->fetchAll();
        return $tab;
    }

    public static function select($primary_value) {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $primary_key = static::$primary;
        try {
            $sql = "SELECT * from " . ucfirst($table_name) . " WHERE " . $primary_key . "=:nom_tag";
    // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $primary_value,
                    //nomdutag => valeur, ...
            );
    // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

    // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (empty($tab))
            return false;
        return $tab[0];
    }

    public static function delete($primary) {
        $table_name = static::$object;

        $primary_key = static::$primary;
        try {
            $sql = "DELETE FROM " . ucfirst($table_name) . " WHERE " . $primary_key . "=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $primary,
            );

            $req_prep->execute($values);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function update($data){
         $table_name = ucfirst(static::$object);
         $primary_key = static::$primary;
         $sql = "UPDATE " . $table_name ." SET";
         foreach ($data as $cle => $valeur){
             if ($cle != "primary"){
             $sql = $sql." $cle =:$cle,";
             }
         }
        try{
            $sql = rtrim($sql, ",");
            $sql = $sql
                    . " WHERE $primary_key=:primary";
            echo "$sql";
            
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

        public static function save($data) {
            $table_name = ucfirst(static::$object);
            $sql = "INSERT INTO " . $table_name . " VALUES(";
            foreach($data as $cle => $valeur){
                $sql = $sql.":$cle,";
            }
            try{
            $sql = rtrim($sql,",").");";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
            }
            catch (Exception $ex){
                echo $ex->getMessage();
            }
            
            
        }

}

Model::Init();
