<?php 
class TitulaireCompteBancaire{
    private string $nom="";
    private string $prenom="";
    private DateTime $dateNaissance;
    private string $ville="";
    private string $infosTitulaireCompteBancaires="";
    private array $compteBancaires; // Recuperation de la liste des objects compteBancaires extenciées
    
    //constructeur
    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setDateNaissance($dateNaissance); 
        $this->setVille($ville);
    }
    
    //classe toString retourne les informations du titulaire et de ses comptes bancaires
    public function __toString(): string{
        return $this->prenom." ".$this->nom;
    }
    //classe getInfo to obtain full in formations
    public function getInfo(): string{
        $anniversaire = new DateTime();
        $anniversaire = $this->dateNaissance->diff($anniversaire);
        $this->infosTitulaireCompteBancaires = "<pre>Nom : ".$this->nom." \n  Prénom : ".$this->prenom." \n  Date de naissance : ".$this->dateNaissance->format('d/m/Y')." (".$anniversaire->format('%Y')."ans)\n  Ville : ".$this->ville;
        return $this->infosTitulaireCompteBancaires;
    }
    
    //setters
    public function setNom(string $nom): void{
        (is_string($nom))? $this->nom = $nom : $this->nom = "";
    }
    public function setPrenom(string $prenom): void{
        (is_string($prenom))? $this->prenom = $prenom : $this->prenom = "";
    }
    public function setDateNaissance(string $dateNaissance): void{
        (DateTime::createFromFormat('d/m/Y', $dateNaissance))? $this->dateNaissance = DateTime::createFromFormat('d/m/Y', $dateNaissance) : $this->dateNaissance = DateTime::createFromFormat('d/m/Y', '01/01/0000');
    }
    public function setVille(string $ville): void{
        (is_string($ville))? $this->ville = $ville : $this->ville = "";
    }
    
    //getters
    public function getNom(): string{
        return $this->nom;
    }
    public function getPrenom(): string{
        return $this->prenom;
    }
    public function getDateNaissance(): DateTime{
        return $this->dateNaissance;
    }
    public function getVille(): string{
        return $this->ville;
    }

     // retourne tous les objets compteBancaires correcpondant au titulaire courant
    public function getComptes(): array{
        return $this->compteBancaires;
    }

    // Obtenir les informations d'un titulaire avec liste de ses compte bancaire
    public function addCompteBancaires(CompteBancaire $compteBancaire): bool{ // retourne tous les index correcpondant à la liste des comptes bancaires du titulaire dans $GLOBALS['compteBancaires']
        $result=false;
        if($compteBancaire instanceof CompteBancaire){
            $this->compteBancaires[] = $compteBancaire;
            $result=true;
        }
        return $result;
    }
}  