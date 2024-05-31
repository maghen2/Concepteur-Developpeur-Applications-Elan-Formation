<?php
Class Equipe{
    private string $nom;
    private Pays $pays;
    private array $contrats;

    // constructeur
    public function __construct(string $nom, Pays $pays){
        $this->nom = $nom;
        $this->pays = $pays;
        $this->pays->addEquipe($this);
    }

    //__toString
    public function __toString(){
        return $this->nom."(".$this->pays.")\n";
    }

    //getInfo
    public function getInfo(){

    }

    // ajouter des contrats du joueurs
    public function addContrat(Contrat $contrat){
        $this->contrats[] = $contrat;
    }
    //lister tous les joueurs d'une équipe (avec nom, prénom, âge et pays d'origine) Ex : PSG --> Neymar JR
    public function listerJoueurs(){
        $reponse="<h2>Liste de tous les joueurs de l'équipe ".$this."</h2><ul>";
        foreach($this->contrats as $contrat){
            $reponse .="<li>".$contrat->getJoueur()."</li>";
        }
        return $reponse."</ul";
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
     * Get the value of pays
     */ 
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set the value of pays
     *
     * @return  self
     */ 
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get the value of contrats
     */ 
    public function getContrats()
    {
        return $this->contrats;
    }

    /**
     * Set the value of contrats
     *
     * @return  self
     */ 
    public function setContrats($contrats)
    {
        $this->contrats = $contrats;

        return $this;
    }
    }
    