<?php 
// Creation de la classe Livre
class Livre{
//Declaration des propriétés de la classe
private string $titre;
private int $nbrPages;
private int $anneeParution;
private float $prix;
private string $auteurPrenom;
private string $auteurNom;


// Creation du contructeur de notre class Livre
public function __construct(string $titre, int $nbrPages, int $anneeParution, float $prix, string $auteurPrenom, string $auteurNom){
    $this->setTitre($titre);
    $this->setNbrPages($nbrPages);
    $this->setAnneeParution($anneeParution);
    $this->setPrix($prix);
    $this->setAuteur($auteurPrenom, $auteurNom);
}

// creation de la méthode toString pour le representation de lobjet en string
public function __toString() : string {
    return "Livre « {$this->titre} » de l'auteur {$this->auteurPrenom} ".mb_strtoupper($this->auteurNom)." paru en {$this->anneeParution} compte {$this->nbrPages} pages et coûte {$this->prix} €";
}

// Creation des setters pour affectation des valeurs $this->_marque = $marque;
public function setTitre(string $titre): void {
    (is_string($titre))? $this->titre=$titre : $this->titre="";
}
public function setNbrPages(int $nbrPages): void {
    (is_int($nbrPages))? $this->nbrPages=$nbrPages : $this->nbrPages=0;
}
public function setAnneeParution(int $anneeParution): void {
    (is_int($anneeParution))? $this->anneeParution=$anneeParution : $this->anneeParution=0;
}
public function setPrix(float $prix): void {
    (is_float($prix))? $this->prix=$prix : $this->prix=0;
}
public function setAuteur(string $auteurPrenom, string $auteurNom): void {
    if(is_string($auteurPrenom) AND is_string($auteurNom)){
        $this->auteurPrenom=$auteurPrenom;
        $this->auteurNom=$auteurNom;
    }    
    else{
        $this->auteurPrenom="Auteur";
        $this->auteurNom="Iconnu";

    }
}

// Création des getters pour obtenir des valeurs
public function getTitre(): string{
    return $this->titre;
}
public function getNbrPages(): int {
    return $this->nbrPages;
}
public function getAnneeParution(): int {
    return $this->anneeParution;
}
public function getPrix(): float {
    return $this->prix;
}
public function getAuteurPrenom(): string{
    return $this->auteurPrenom;    
}
public function getAuteurNom(): string{
    return $this->auteurNom;    
}
}
//  creation d'un tableau d'objects Livres public function __construct(string $titre, int $nbrPages, int $anneeParution, float $prix, string $auteur){
    $livres = array();
    $livres[] = new Livre ("Cahier d'un retour au pays natal",313,1939,15.30,"Aimé","Césaire");
    $livres[] = new Livre ("La tragédie du roi Christophe",268,1970,31.35,"Aimé","Césaire");
    $livres[] = new Livre ("Soleil cou coupé",281,1948,37.97,"Aimé","Césaire");
    $livres[] = new Livre ("Les Armes miraculeuses",250,1946,26.88,"Aimé","Césaire");
    $livres[] = new Livre ("Ferrements et autres poèmes",286,1958,12.83,"Aimé","Césaire");
    $livres[] = new Livre ("Nègre je suis, nègre je resterai. Entretiens avec Françoise Vergès",307,2005,37.31,"Aimé","Césaire");
    $livres[] = new Livre ("Et les chiens se taisaient",283,1946,20.86,"Aimé","Césaire");
    $livres[] = new Livre ("Non-Vicious Circle: Twenty Poems of Aime Cesaire",329,1984,12.42,"Aimé","Césaire");
    $livres[] = new Livre ("Moi, laminaire...",370,1982,15.53,"Aimé","Césaire");
    $livres[] = new Livre ("Discours sur le colonialisme: suivi du Petit matin d'Aimé Césaire",251,2014,35.24,"Aimé","Césaire");
    $livres[] = new Livre ("Les Bouts de bois de Dieu",228,1976,13.02,"Ousmane ","Sembène");
    $livres[] = new Livre ("O pays, mon beau peuple",225,1978,11.88,"Ousmane ","Sembène");
    $livres[] = new Livre ("Voltaique",293,1993,14.58,"Ousmane ","Sembène");
    $livres[] = new Livre ("L'Harmattan",221,1975,13.44,"Ousmane ","Sembène");
    $livres[] = new Livre ("Le Regard du roi",320,1981,32.53,"Camara","Laye");
    $livres[] = new Livre ("Le Maître de la parole",268,1948,35.67,"Camara","Laye");
    $livres[] = new Livre ("Dramouss",358,1944,22.25,"Camara","Laye");
    $livres[] = new Livre ("L'Enfant noir",195,1953,33.43,"Camara","Laye");
    $livres[] = new Livre ("Une vie de Boy",281,1956,36.58,"Ferdinand","Oyono");
    $livres[] = new Livre ("Les Bouts de bois de Dieu",263,1960,15.93,"Ousmane","Sembène");
    $livres[] = new Livre ("Le Monde s'effondre",297,1958,12.86,"Chinua","Achebe");
    $livres[] = new Livre ("Ville cruelle",301,1954,36.20,"Eza","Boto");
    $livres[] = new Livre ("Le Pauvre Christ de Bamba",209,1956,20.15,"Mongo","Béti");
    $livres[] = new Livre ("O pays mon beau peuple",345,1957,37.62,"Ousmane","Sembène");
    $livres[] = new Livre ("Nini, la mulâtresse du Sénégal",277,1947,39.56,"Abdoulaye","Sadji");
    $livres[] = new Livre ("Maïmouna",328,1952,38.27,"Abdoulaye","Sadji");
    $livres[] = new Livre ("Le Vieux Nègre et la Médaille",324,1956,33.08,"Ferdinand","Oyono");
    $livres[] = new Livre ("Chemin d'Europe",301,1960,31.20,"Ferdinand","Oyono");
    