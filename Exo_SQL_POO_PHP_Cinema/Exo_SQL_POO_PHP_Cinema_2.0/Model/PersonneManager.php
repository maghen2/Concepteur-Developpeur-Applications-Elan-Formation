<?php
// PersonneManager.php
namespace Model;
use Model\Connect;
use \PDO;

class PersonneManager{
        private \PDO $pdo;

        public function __construct(){
            $this->pdo = Connect::seConnecter();
        }

        // Lister les acteurs
        public function getActeurs($id_acteur = "") : array{
            if(empty($id_acteur )){
                $where = '';
                $data = [];
            }
            else {
                $where = 'WHERE acteur.id_acteur = :id_acteur';
                $data = ["id_acteur" => $id_acteur];
            }           
            $sql = "SELECT acteur.id_acteur, CONCAT(personne.prenom, ' ', personne.nom) AS acteur, personne.sexe, DATE_FORMAT(personne.date_naissance, '%d/%m/%Y') AS `date_naissance`, COUNT(casting.id_film) AS `Nombre_films`
                    FROM personne
                    JOIN acteur ON personne.id_personne = acteur.id_personne
                    JOIN casting ON casting.id_acteur = acteur.id_acteur
                    $where
                    GROUP by casting.id_acteur
                    ORDER by `Nombre_films` DESC
            ";
             $query = $this->pdo->prepare($sql);
             $query->execute($data);
             return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        
        // Lister les réalisateurs
        public function getRealisateurs($id_realisateur = "") : array{
            if(empty($id_realisateur)){
                $where = '';
                $data = [];
            }
            else {
                $where = 'WHERE realisateur.id_realisateur = :id_realisateur';
                $data = ["id_realisateur" => $id_realisateur];
            } 
                $sql = "SELECT realisateur.id_realisateur, CONCAT(personne.prenom, ' ', personne.nom) AS realisateur, 
                personne.sexe, 
                DATE_FORMAT(personne.date_naissance, '%d/%m/%Y') AS `date_naissance`, 
                COUNT(film.id_film) AS `Nombre_films`
                        FROM personne
                        JOIN realisateur ON personne.id_personne = realisateur.id_personne
                        JOIN film ON film.id_realisateur = realisateur.id_realisateur
                        $where
                        GROUP by film.id_realisateur
                        ORDER by `Nombre_films` DESC
                ";
             $query = $this->pdo->prepare($sql);
             $query->execute($data);
             return $query->fetchAll(PDO::FETCH_ASSOC);
            }

        // au clic sur un acteur, on affiche les infos de l'acteur + acteurographie (acteurs + rôles)
        public function getFilmographies($id_acteur="", $id_realisateur=""){
            
            if(!empty($id_acteur)){ // filmographie de l'acteur(rôles / films)   
                $sql = "SELECT
                        role.nom_personnage,
                        film.titre,
                        DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`,
                        SEC_TO_TIME(film.duree * 60) AS `Duree`,
                        film.synopsis,
                        CONCAT(
                            personne.prenom,
                            ' ',
                            personne.nom
                        ) AS `realisateur`
                    FROM
                        film
                    JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                    JOIN personne ON personne.id_personne = realisateur.id_personne
                    JOIN casting ON casting.id_film = film.id_film
                    JOIN role ON role.id_role = casting.id_role
                    WHERE
                        casting.`id_acteur` = :id_acteur
                    ORDER BY
                        film.date_sortie_fr
                    DESC
             ";
                $query = $this->pdo->prepare($sql);
                $query->execute(["id_acteur" => $id_acteur]);
                return $query->fetchAll(PDO::FETCH_ASSOC);
        }     
        elseif(!empty($id_realisateur)){   // filmographie du realisateur(rôles / films) 
            $sql = "SELECT
                film.titre,
                DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`,
                SEC_TO_TIME(film.duree * 60) AS `Duree`,
                film.synopsis
                FROM
                film
                JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                WHERE
                film.`id_realisateur` = :id_realisateur
                ORDER BY
                film.date_sortie_fr
                DESC
            ";
            $query = $this->pdo->prepare($sql);
            $query->execute(["id_realisateur" => $id_realisateur]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        require_once("View/acteur/detailActeur.php");
 
         }

    // ajouter une nouvelle personne dans ta base de données 
    public function addPersonne($prenom, $nom, $sexe, $date_naissance, $fonction) : bool{
        $sql ="INSERT INTO personne(`prenom`,`nom`,`sexe`,`date_naissance`)
        VALUES(:prenom, :nom, :sexe, :date_naissance)
        ";  
        $data = [
            'prenom'=>$prenom,
            'nom'=>$nom,
            'sexe'=>$sexe,
            'date_naissance'=>$date_naissance
        ];
        $query = $this->pdo->prepare($sql);
        if($query->execute($data))
            $id_personne = $this->pdo->lastInsertId();

            if(isset($id_personne) and !empty($id_personne)){
            if($fonction == "acteur"){
                $sql = "INSERT INTO `acteur`(`id_personne`)
                VALUES(:id_personne)
                ";
            }
            elseif ($fonction == "realisateur"){
                $sql = "INSERT INTO `realisateur`(`id_personne`)
                VALUES(:id_personne)
                ";
            }
            else{
                $sql = "INSERT INTO `acteur`(`id_personne`)
                VALUES(:id_personne);
                INSERT INTO `realisateur`(`id_personne`)
                VALUES(:id_personne)
                ";
            }
            $data = ['id_personne' => $id_personne];
            $query = $this->pdo->prepare($sql);
            return $query->execute($data);
        }    
    }    
    
    }
