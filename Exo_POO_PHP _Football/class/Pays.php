<?php
Class Pays{
    private string $nom;
    private array $equipes;
    private array $joueurs;

    // constructeur
    public function __construct(string $nom){
        $this->nom = $nom;
        $this->equipes = [];
        $this->joueurs = [];
    }

    //__toString
    public function __toString(){
        return $this->nom."\n";
    }

    //getInfo
    public function getInfo(){

    }

    //Ajout de l'equipe dans le tableau de d'equipes
    public function addEquipe(Equipe $equipe){
        $this->equipes[] = $equipe;
    }
    
    //Ajout du joueur dans le tableau de de joueurs
    public function addJoueur(Joueur $joueur){
        $this->joueurs[] = $joueur;
    }
    
    
    
    }