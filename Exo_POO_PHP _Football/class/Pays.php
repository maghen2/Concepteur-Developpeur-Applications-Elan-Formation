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
    
    //lister toutes les équipes d'un pays (Ex : France --> PSG, OM, OL, RCSA, ...)
    public function listerEquipes(){
     $reponse="<h2>Liste de toutes les équipes du pays ".$this."</h2><ul>";
     foreach($this->equipes as $equipe){
        $reponse .= "<li>".$equipe."</li>";
     }
     return $reponse."</ul>";
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of equipes
     */ 
    public function getEquipes()
    {
        return $this->equipes;
    }

    /**
     * Set the value of equipes
     *
     * @return  self
     */ 
    public function setEquipes($equipes)
    {
        $this->equipes = $equipes;

        return $this;
    }

    /**
     * Get the value of joueurs
     */ 
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    /**
     * Set the value of joueurs
     *
     * @return  self
     */ 
    public function setJoueurs($joueurs)
    {
        $this->joueurs = $joueurs;

        return $this;
    }
    }