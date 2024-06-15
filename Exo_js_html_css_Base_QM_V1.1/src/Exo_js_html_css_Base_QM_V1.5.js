/*
Exercice 5 : Convertisseur de devises
Créer une page web affichant une zone de saisie où on pourra saisir une valeur en euros afin de donner la conversion en francs La conversion (1 euro = 6.55957 francs) se fait en temps réel (pas de bouton de soumission du formulaire). Le résultat en francs est arrondi à 2 décimales. En cas de saisie non numérique un message affiche qu'on doit absolument saisir une valeur numérique.
*/

let franc = document.querySelector("input#franc").value;
let euro = document.querySelector("input#euro").value;
console.log(franc+" francs = "+euro+" euros");
function convertor(element){
    if(franc < 0 || euro < 0){
        // console.log(franc+" francs = "+euro+" euros");
        window.alert(element.value+" doit être un nombre positif");
    }
    else{
        if(element.name == "franc") 
            euro = Math.floor(franc/6.55957, 2) ;
        else
            franc = Math.floor(euro * 6.55957, 2); 

    // console.log(franc+" francs = "+euro+" euros");
    }
}