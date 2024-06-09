// Changement du texte de la balise h1
let myHeading = document.querySelector("h1");
myHeading.textContent = "Bonjour, monde !";

//changement dynamique du titre de la page
let myTitle = document.querySelector("title");
myTitle.textContent = "Bonjour, monde !";

// Changement de l'image
let myPicture =  document.querySelector("img");
myPicture.src = "https://blog.mozilla.org/opendesign/files/2019/06/FX_Design_Blog_Logos_Family.jpg";
myPicture.setAttribute("style", "width:100%");

// C