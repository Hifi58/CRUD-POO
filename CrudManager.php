<?php 
class ConnexionBdd{
    protected $hostname = "localhost";
    protected $username = "root";
    protected $password ="";
    protected $basename = "tuto";
    public $bddPDO;


    public function __construct($hostname, $username, $password, $basename){
        $this->hostname=$hostname;
        $this->username=$username;
        $this->password=$password;
        $this->basename=$basename;
        $this->bddPDO=$this->connectBase();
    }

protected function connectBase(){
    try{
        $bdd=new PDO("mysql:host=$this->hostname;dbname=$this->basename",$this->username, $this->password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(PDOException $e){
        echo 'connexion failed'.  $e->getMessage();
    }
}

public function getHostname() {
    return $this->hostname;
}
public function getUsername() {
    return $this->username;
}
public function getPassword() {
    return $this->password;
}
public function getbasename() {
    return $this->getbasename;
}
public function setHostname() {
    $this->hostname=$hostname;
}
public function setUsername() {
    $this->username=$username;
}
public function setPassword() {
    $this->password=$password;
}
public function setbasename() {
    $this->basename=$basename;
}
}

// Passage aux function de CRUD

class CrudGite extends ConnexionBdd{
    protected $tablename = "gite";

    function __construct($hostname, $username, $password, $basename, $tablename) {
        parent::__construct($hostname, $username, $password, $basename);
        $this->tablename=$tablename;
    }

    public function getGite($id){
        try{
            $rs = $this->bddPDO->query("SELECT * FROM $this->tablename WHERE id_gite=". $id);
        }
        catch(Exception $e){
            die('erreur on list:'. $e->getMessage());
        }
        return $rs;
    }

    public function getGites(){
        try{
            $rs = $this->bddPDO->query("SELECT * FROM $this->tablename ORDER BY id_gite DESC");
        }
        catch(Exception $e){
            die('erreur on list:'. $e->getMessage());
        }
        return $rs;
    }

    public function addGite($nom, $adresse, $prix){
        try{
            $rs = $this->bddPDO->prepare("INSERT INTO $this->tablename(nom, adresse, prix) VALUES (:nom, :adresse, :prix)");
            $insert = $rs->execute(array(
                "nom"=>$nom,
                "adresse"=>$adresse,
                "prix"=>$prix
            ));
        }
        catch(Exception $e){
            die('error on add:'. $e->getMessage());
        }
        return $insert;
    }

    public function deleteGite($id){
        $this->bddPDO->exec("DELETE FROM $this->tablename SET nom=:nom, adresse=:adresse, prix=:prix".$id);
    }

    public function updateGite($id){
        try{
            $rs = $this->bddPDO->prepare("UPDATE $this->tablename SET nom=:nom, adresse=:adresse, prix=:prix WHERE id_gite=id");

            $update = $rs->execute(array(
                "nom"=>$_POST['nom'],
                "adresse"=>$_POST['adresse'],
                "prix"=>$_POST['prix']
            ));
        }
        catch (Exception $e){
            die('error on update:'. $e->getMessage());
        }
    }

    public function getTablename() {
        return $this->tablename;
    }
    public function setTablename() {
        $this->tablename=$tablename;
    }
}
