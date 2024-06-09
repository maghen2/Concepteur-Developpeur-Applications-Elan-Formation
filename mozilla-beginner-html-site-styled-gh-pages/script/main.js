// Changement du texte de la balise h1
let myHeading = document.querySelector("h1");
myHeading.textContent = "Bonjour, monde !";

//changement dynamique du titre de la page
let myTitle = document.querySelector("title");
myTitle.textContent = "Bonjour, monde !";

// Changement de l'image
let myPicture =  document.querySelector("img");
myPicture.addEventListener("click", function(){
    myPicture.src = "https://blog.mozilla.org/opendesign/files/2019/06/FX_Design_Blog_Logos_Family.jpg";
    //myPicture.getAttribute("src")
    myPicture.setAttribute("style", "width:100%");
});


// bouton changement d'utlisateur
let myButton = document.querySelector("button");

function setUserName(){
    let myName = prompt("Quel est votre prénom?");
    localStorage.setItem("name", myName);
    myHeading.textContent = "Bonjour "+myName+"!";
}

myButton.addEventListener("click", function (){setUserName()});