<?php
class Produit{
  private string$nom;
  private float $prix, $Prix_total;
  private int $quantite;

  public function __construct(string $nom, float $prix, int $quantite, float $Prix_total){
    $this->nom = $nom;
    $this->prix = $prix;
    $this->quantite = $quantite;
    $this->Prix_total = $Prix_total;
  }

  public function __toString(){
    return $this->nom." ".$this->prix." ".$this->quantite." ".$this->Prix_total;
  }
  
  public function afficherProduit(){

  }


  /**
   * Get the value of Nom
   */ 
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of Nom
   *
   * @return  self
   */ 
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get the value of Prix_total
   */ 
  public function getPrix_total()
  {
    return $this->Prix_total;
  }

  /**
   * Set the value of Prix_total
   *
   * @return  self
   */ 
  public function setPrix_total($Prix_total)
  {
    $this->Prix_total = $Prix_total;

    return $this;
  }

  /**
   * Get the value of prix
   */ 
  public function getPrix()
  {
    return $this->prix;
  }

  /**
   * Set the value of prix
   *
   * @return  self
   */ 
  public function setPrix($prix)
  {
    $this->prix = $prix;

    return $this;
  }

  /**
   * Get the value of quantite
   */ 
  public function getQuantite()
  {
    return $this->quantite;
  }

  /**
   * Set the value of quantite
   *
   * @return  self
   */ 
  public function setQuantite($quantite)
  {
    $this->quantite = $quantite;

    return $this;
  }
}