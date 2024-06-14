/*
Exercice 4 : Adapter la couleur d’un background en JS
Au départ le background est gris mais lorsque l’on clique sur l’une des icônes :

Le background prend sa couleur
Le nom du réseau social apparaît
Les bords de l’icône s’arrondissent
Une ombre apparaît derrière l’icône
Lorsque l’on reclique sur une icône, le background redevient gris et l’icône reprend son aspect d’origine
*/

const divSocialMedia =  document.querySelector("div#social-media"); // <div id="social-media">
function animSocialMedia(item){
    divSocialMedia.style.background = window.getComputedStyle(item).getPropertyValue("background");
    item.firstChild.style.display = "block";
    divSocialMedia.style.border = "2px gray 10px";
}