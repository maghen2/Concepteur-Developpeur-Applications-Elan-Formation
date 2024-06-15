/*
Exercice 5 : Convertisseur de devises
Créer une page web affichant une zone de saisie où on pourra saisir une valeur en euros afin de donner la conversion en francs La conversion (1 euro = 6.55957 francs) se fait en temps réel (pas de bouton de soumission du formulaire). Le résultat en francs est arrondi à 2 décimales. En cas de saisie non numérique un message affiche qu'on doit absolument saisir une valeur numérique.
*/

const franc = document.querySelector("input#franc");
const euro = document.querySelector("input#euro");
function convertor(element){
    if(franc.value < 0 || euro.value<0){
        alert(element.value+"doit être un nombre positif");
    }
}