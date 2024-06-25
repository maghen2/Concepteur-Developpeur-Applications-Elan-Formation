<?php
namespace Model;

// Connect.php
//création de l'objet PDO pour la connexion à la base de données
abstract class Connect{
    protected $myPDO;

    public function __construct(){
        try{
            $this->myPDO = new \PDO(
                'mysql:host=localhost;dbname=cinema;charset=utf8',
                'root',
                ''
            );
        }
        catch(\Exception $error){
            die('Erreur: '.$error->getMessage());
        }
    }
}

