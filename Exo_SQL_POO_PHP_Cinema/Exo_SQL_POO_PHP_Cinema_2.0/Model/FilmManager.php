<?php
// FilmManager.php
namespace Model;
use Model\Connect;
use \PDO;

class FilmManager{
    private \PDO $pdo;

    public function __construct(){
        $this->pdo = Connect::seConnecter();
    }
    // Lister les films
    public function getFilms($id_film = "") : array{
        if(empty($id_film )){
            $where = '';
            $data = [];
        }
        else {
            $where = 'WHERE film.id_film = :id_film';
            $data = ["id_film" => $id_film];
        }
        $sql = "SELECT film.id_film, film.titre, DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`, SEC_TO_TIME(film.duree*60) AS `Duree`, film.synopsis, CONCAT(personne.prenom, ' ', personne.nom) AS `realisateur`
                FROM film
                JOIN realisateur on film.id_realisateur = realisateur.id_realisateur
                JOIN personne ON personne.id_personne = realisateur.id_personne
                $where
                ORDER BY film.date_sortie_fr DESC
        ";
             $query = $this->pdo->prepare($sql);
             $query->execute($data);
             return $query->fetchAll(PDO::FETCH_ASSOC);
        }
            // ajouter un nouveau film dans ta base de données 
            public function addFilm($titre,$date_sortie_fr,$duree,$synopsis,$id_realisteur) : bool{
                $sql ="INSERT INTO film (`titre`,`date_sortie_fr`,`duree`,`synopsis`,`id_realisateur`)
                VALUES(:titre, :date_sortie_fr, :duree, :synopsis, :id_realisateur)
                ";  
                   
                $durees = explode(":",$duree);
                $duree = $durees[0]*60+$durees[1];
                $data = [
                    'titre'=>$titre,
                    'date_sortie_fr'=>$date_sortie_fr,
                    'duree'=>$duree,
                    'synopsis'=>$synopsis,
                    'id_realisateur'=>$id_realisteur
                ];
                $query = $this->pdo->prepare($sql);
                return $query->execute($data);
            }    

            // ajouter une nouvelle personne dans ta base de données 
            public function addPersonne($prenom, $nom, $sexe, $date_naissance) : bool{
                $sql ="INSERT INTO personne(`prenom`,`nom`,`sexe`,`date_naissance`)
                VALUES(:prenom, :nom, :sexe, :date_naissance)
                ";  
                $data = [
                    'prenom'=>$prenom,
                    'nom'=>$nom,
                    'duree'=>$duree,
                    'sexe'=>$sexe,
                    'date_naissance'=>$date_naissance
                ];
                $query = $this->pdo->prepare($sql);
                return $query->execute($data);
            }    

            // Lister les genres de film
            public function getGenres($id_film = ""): array{
                if(empty($id_film)){
                    $where = '';
                    $data = [];
                    $join = '';
                }
                else {
                    $where = 'WHERE `film_genres`.id_film = :id_film';
                    $data = ["id_film" => $id_film];
                    $join = 'JOIN `film_genres` ON `film_genres`.id_genre = `genre`.id_genre';
                } 
    
                      $sql ="SELECT DISTINCT genre.nom_genre 
                      FROM `genre`
                      $join
                      $where
                      ORDER BY genre.nom_genre
                      ";                

                    $query = $this->pdo->prepare($sql);
                    $query->execute($data);
                    return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            
            // ajouter un nouveau genre cinématographique dans ta base de données 
            public function addGenre($nom_genre) : bool{
                    $sql ="INSERT INTO genre(`nom_genre`) 
                    VALUES (:nom_genre)
                    ";                
                    $query = $this->pdo->prepare($sql);
                    return $query->execute(["nom_genre" => $nom_genre]);
                }    


        // affiche les infos du films + casting du film (acteurs + rôles)    
        public function getCastings($id_acteur = '', $id_film = '', $id_role = ''){
            if(empty($id_acteur)){
                $whereActeur = '';

            }
            else {
                $whereActeur = 'WHERE casting.id_acteur = :id_acteur';
                $data['id_acteur'] = $id_acteur;
            }   
            if(empty($id_film)){
                $whereFilm = '';

            }
            else {
                $whereFilm = 'WHERE casting.id_film = :id_film';
                $data['id_film']= $id_film;
            }   
            if(empty($id_role)){
                $whereRole = '';
            }
            else {
                $whereRole = 'WHERE casting.id_role = :id_role';
                $data['id_role'] = $id_role;
            } 
            
            // casting du film (acteurs + rôles)   
            $sql = "SELECT
                        CONCAT(
                            personne.prenom,
                            ' ',
                            personne.nom
                        ) AS acteur,
                        personne.sexe,
                        DATE_FORMAT(
                            personne.date_naissance,
                            '%d/%m/%Y'
                        ) AS `date_naissance`,
                        role.nom_personnage,
                        film.titre
                FROM
                    personne
                JOIN acteur ON personne.id_personne = acteur.id_personne
                JOIN casting ON casting.id_acteur = acteur.id_acteur
                JOIN role ON role.id_role = casting.id_role
                JOIN film ON film.id_film = casting.id_film
                $whereActeur
                $whereFilm
                $whereRole
                ORDER BY
                    `acteur`
           ";

            $query = $this->pdo->prepare($sql);
            $query->execute($data);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        }
        

}
?>