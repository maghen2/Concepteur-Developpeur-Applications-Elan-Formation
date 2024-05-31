<?php
Class Joueur{
private string $prenom;
private string $nom;
private DateTime $dateNaissance;
private Pays $pays; 
private array $contrats;

//creation du constructeur
public function __construct(string $prenom, string $nom, string $dateNaissance, Pays $pays){
    $this->prenom = $prenom;
    $this->nom = $nom;
    $this->dateNaissance = new DateTime($dateNaissance);
    $this->pays = $pays;
    $this->pays->addJoueur($this);

}

    //__toString
    public function __toString(){
        return $this->prenom." ".$this->nom." (".$this->dateNaissance->format("Y-m-d").")\n";
    }

    //getInfo
    public function getInfo(){
        return $this->prenom." ".$this->nom." (".$this->pays." ".$this->dateNaissance->format("Y-m-d").")\n";
    }
    // ajouter des contrats du joueurs
    public function addContrat(Contrat $contrat){
        $this->contrats[] = $contrat;
    }
/**
 * Get the value of prenom
 */ 
public function getPrenom()
{
return $this->prenom;
}

/**
 * Set the value of prenom
 *
 * @return  self
 */ 
public function setPrenom($prenom)
{
$this->prenom = $prenom;

return $this;
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
 * Get the value of dateNaissance
 */ 
public function getDateNaissance()
{
return $this->dateNaissance;
}

/**
 * Set the value of dateNaissance
 *
 * @return  self
 */ 
public function setDateNaissance($dateNaissance)
{
$this->dateNaissance = $dateNaissance;

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
