<?php
namespace Model;

// Connect.php
//création de l'objet PDO pour la connexion à la base de données
abstract class Connect{
    const HOST = 'localhost';
    const DBNAME = 'cinema';
    const CHARSET = 'utf8';
    const USER  = 'root';
    const PASSWORD = ''; 

    public static function seConnecter(){
        try{
            return new \PDO(
                'mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset='.self::CHARSET,
                self::USER,
                self::PASSWORD
            );
            
            }
            catch(\PDOException $error){
                return $error->getMessage();
        } 
    }
    }
/*
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

*/