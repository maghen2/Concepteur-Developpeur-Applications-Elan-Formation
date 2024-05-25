<?php 
// Creation de la classe auteur
class Auteur{
    private string $auteurPrenom;
    private string $auteurNom;
    private string $bibliographie;
    private array $livres;

    public function __construct(string $auteurPrenom, string $auteurNom){
        $this->setAuteurPrenom($auteurPrenom);
        $this->setAuteurNom($auteurNom);
    }    
    public function __toString() : string {
        return "{$this->auteurPrenom} ".mb_strtoupper($this->auteurNom);
    }
    // Construction des muttateurs setters
    public function setAuteurPrenom(string $auteurPrenom): void {
        (is_string($auteurPrenom))? $this->auteurPrenom = $auteurPrenom : $this->auteurPrenom="";
    }

    public function setAuteurNom(string $auteurNom): void {
        (is_string($auteurNom))? $this->auteurNom = $auteurNom : $this->auteurNom="";
    }

    // Contruction des ascesseurs getters
    public function getAuteurPrenom(): string {
        return $this->auteurPrenom;
    }
    public function getAuteurNom(): string {
        return $this->auteurNom;
    }
    public function afficherBibliographie(string $auteurPrenom, string $auteurNom): string {
        $livres=$GLOBALS['livres']; // Recuperation de la liste des objects livres extenciées en dehors de la classe
        $this->bibliographie="<h2>Livres de {$this->auteurPrenom} ".mb_strtoupper($this->auteurNom)."</h2>
        <ul>";        
        foreach($livres as $livre){
            if($livre->getAuteurPrenom()==$this->auteurPrenom AND $livre->getAuteurNom()==$this->auteurNom){
                $this->bibliographie.="<li>{$livre->getTitre()} ({$livre->getAnneeParution()}) : {$livre->getNbrPages()} pages / {$livre->getPrix()}€</li>";
            }        
        }
        return $this->bibliographie."</ul>";
    }

}

//  creation d'un tableau d'objects Auteur public function __construct(string $auteurPrenom, string $auteurNom)
$auteurs = array();
$auteurs[] = new Auteur("Aimé","Césaire");
$auteurs[] = new Auteur("Ousmane","Sembène");
$auteurs[] = new Auteur("Camara","Laye");
$auteurs[] = new Auteur("Ferdinand","Oyono");
$auteurs[] = new Auteur("Chinua","Achebe");
$auteurs[] = new Auteur("Eza","Boto");
$auteurs[] = new Auteur("Mongo","Béti");
$auteurs[] = new Auteur("Abdoulaye","Sadji");