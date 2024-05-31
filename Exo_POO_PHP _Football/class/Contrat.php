<?php
Class Contrat{
    private DateTime $date;
    private Joueur $joueur;
    private Equipe $equipe;
    private array $contrats;
    
    public function __construct(string $date, Joueur $joueur, Equipe $equipe)
    {
        $this->date = new DateTime($date);
        $this->joueur = $joueur;
        $this->equipe = $equipe;
        $this->contrats[] = $this;  
    }

    public function __toString()
    {
        return $this->date->format("Y-m-d")." : ".$this->joueur." joue dans l'équipe ".$this->equipe;
    }

    public function __getInfo(){

    }


    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of joueur
     */ 
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set the value of joueur
     *
     * @return  self
     */ 
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get the value of equipe
     */ 
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set the value of equipe
     *
     * @return  self
     */ 
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

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
    