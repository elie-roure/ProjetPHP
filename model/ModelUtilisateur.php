<?php

	require_once File::build_path(array('model','Model.php'));
        

	class ModelUtilisateur extends Model{
                
                protected static $object = 'Utilisateur';
                protected static $primary = 'login';
                private $admin;
		private $login;
		private $nom;
		private $prenom;
                private $mdp;
                private $email;
                private $nonce;
                
        public function getNonce(){
                return $this->nonce;
        }        
        
        public function getEmail(){
                return $this->email;
        }

	public function getLogin(){
		return $this->login;
	}
        
        public function getAdmin(){
                return $this->admin;
        }

	public function getNom(){
		return $this->nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setNom($nom2){
		$this->nom = $nom2;
	}

	public function setLogin($login2){
		$this->login = $login2;
	}

	public function setPrenom($prenom2){
		$this->prenom = $prenom2;
	}
        
        public function setNonce($nonce){
                $this->nonce = $nonce;
        }

	public function afficher(){
		return "<ul>Utilisateur : </br></br>
				<li> login : $this->login </li></br>
				<li> prenom : $this->prenom </li></br>
				<li> nom : $this->nom </li></br></ul>";
	}
        
        public static function checkPassword($login,$mot_de_passe_hache){
            try{
                $sql ="SELECT * FROM Utilisateur 
                    WHERE login = :login";
                $req_prep = Model::$pdo->prepare($sql);
                $values = array (
                    "login" => $login,
                );
                $req_prep->execute($values);
                $row = $req_prep->fetch(PDO::FETCH_ASSOC);

                if ($mot_de_passe_hache == $row["mdp"]){
                    return true;
                }
                else {
                    return false;
                }
            } catch (Exception $ex){
                    echo $ex->getMessage();
            }
            
        }
        
        public static function isAdmin($login){
            $u = ModelUtilisateur::select($login);
            if ($u->getAdmin() == 1){
                return true;
            }
            else {
                return false;
            }
        }
        
        public static function loginExist($login){
            try{
                $sql = "SELECT COUNT(*) FROM Utilisateur WHERE login = :login";
                $req_prep = Model::$pdo->prepare($sql);
                $values = array (
                    "login" => $login,
                );
                $req_prep->execute($values);
                $nombre = $req_prep->fetchColumn();
                if ($nombre == 1){
                    return true;
                }
                else { 
                    return false;}
            } catch (Exception $ex) {
                    echo $ex->getMessage();
            }
           
            
        } 
        
    }
	

?>