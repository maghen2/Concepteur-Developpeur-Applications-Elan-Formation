<?php 
class CompteBancaire{
    const TYPE_COMPTES = ["compte courant", "livret A", "PEL"];
    private string $typeCompte = self::TYPE_COMPTES[0];
    private float $solde=0.0;
    const DEVISES = ["Euro", "Dollar", "Livre", "Yen"];
    private string $devise = self::DEVISES[0];
    private TitulaireCompteBancaire $titulaire;

    //constructeur
    public function __construct(int $typeCompte, float $solde, int $devise, TitulaireCompteBancaire $titulaire){
        $this->setTypeCompte($typeCompte);
        $this->setSolde($solde);
        $this->setDevise($devise);
        $this->setTitulaire($titulaire);
        $this->titulaire->addCompteBancaires($this);
    }

    //classe toString
    public function __toString(): string{
        return $this->typeCompte." (".$this->solde." ".$this->devise.")";
    }
    //classe getInfo to obtain full in formations
    public function getInfo(): string{
        return "Type de compte : ".$this->typeCompte."\n Solde : ".$this->solde." ".$this->devise."\n Titulaire de compte : ".$this->titulaire;
    }

    //setters
    public function setTypeCompte(int $typeCompte): void{
        (key_exists($typeCompte, self::TYPE_COMPTES))? $this->typeCompte = self::TYPE_COMPTES[$typeCompte] : $this->typeCompte = self::TYPE_COMPTES[0];
    }
    public function setSolde(float $solde): void{
        (is_float($solde))? $this->solde = $solde : $this->solde = 0;
    }
    public function setDevise(int $devise): void{
        (key_exists($devise, self::DEVISES))? $this->devise=self::DEVISES[$devise] : $this->devise=self::DEVISES[0];
    }
    public function setTitulaire(TitulaireCompteBancaire $titulaire): void{
        ($titulaire instanceof TitulaireCompteBancaire)? $this->titulaire = $titulaire : $this->titulaire = $GLOBALS['titulaireCompteBancaires'][0];
    }

    //getters
    public function getTypeCompte(): int{
        return $this->typeCompte;
    }
    public function getSolde(): float{
        return $this->solde;
    }
    public function getDevise(): int{
        return $this->devise;
    }
    public function getTitulaire(): string{
        return $this->titulaire;
    }

    /*Sur un compte bancaire, on doit pouvoir : 
  Créditer ou  Débiter le compte de X euros 
  Effectuer un virement d'un compte à l'autre. */
  public function crediterCompteBancaire(float $montant): bool{
    if(is_float($montant)){
        $this->solde +=  $montant;
        $result=true;
    }
    return $result;
  }

 public function virementCompteBancaire(float $montant, CompteBancaire $compteBancaireCible):  bool{
    $result=false;
    if(is_float($montant) AND $montant>0 AND $compteBancaireCible instanceof CompteBancaire){
        $this->crediterCompteBancaire(-$montant); // on débite le compte source
        $compteBancaireCible->crediterCompteBancaire($montant); // on credite le compte cible
        $result=true;
    }
    return $result;
  }
  
}
 
    
