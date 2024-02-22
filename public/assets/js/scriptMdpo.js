// Déclaration des variables
const email = document.getElementById("email"); 

//création du message
const message1 = "E-mail incorrect !";

//création des constantes pour afficher le message
const errorMessage1 = document.getElementById("error1");

// Création de la regex
const regexEmail = /^[A-Za-z0-9.\_\.\-]+@[a-z0-9\_\-]+\.[a-z]{2,5}$/; 


// Création d'un écouteur d'événement pour l'email
email.addEventListener("keyup", function () { 
    email.classList.remove("border-danger", "border-success",);
    errorMessage1.classList.add("d-none");  
    if (regexEmail.test(email.value)) { 
        email.classList.add("border-success"); 
        errorMessage1.classList.add("d-none");
    } else { 
        email.classList.add("border-danger"); 
        errorMessage1.classList.remove("d-none");
        errorMessage1.textContent = message1; };
});