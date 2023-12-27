const userName = document.getElementById("userName");
const lastName = document.getElementById("lastName");
const firstName = document.getElementById("firstName"); 
const performance = document.getElementById("Performance"); 
const message = document.getElementById("Message"); 

const message1 = "Identifiant incorrect !";
const message2 = "Caractères non pris en compte !";

const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");
const errorMessage3 = document.getElementById("error3");
const errorMessage4 = document.getElementById("error4");
const errorMessage5 = document.getElementById("error5");

const regexUserName = /^[a-zA-Z0-9]{2,30}$/;
const regexName = /^[a-zA-Z]{2,30}$/; 
const regexPerformance = /^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,50}$/;
const regexMessage = /^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,300}$/;


// Création d'un écouteur d'événement pour le userName
    userName.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        userName.classList.remove("red", "green"); 
        errorMessage1.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexUserName.test(userName.value)) { 
            userName.classList.add("green"); 
            errorMessage1.classList.add("d-none");
        } else { 
            userName.classList.add("red"); 
            errorMessage1.classList.remove("d-none");
            errorMessage1.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour le lastname
    lastName.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        lastName.classList.remove("red", "green"); 
        errorMessage2.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexName.test(lastName.value)) { 
            lastName.classList.add("green"); 
            errorMessage2.classList.add("d-none");
        } else { 
            lastName.classList.add("red"); 
            errorMessage2.classList.remove("d-none");
            errorMessage2.textContent = message2; }; 
    });

// Création d'un écouteur d'événement pour le firstName
    firstName.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        firstName.classList.remove("red", "green"); 
        errorMessage3.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexName.test(firstName.value)) { 
            firstName.classList.add("green"); 
            errorMessage3.classList.add("d-none");
        } else { 
            firstName.classList.add("red"); 
            errorMessage3.classList.remove("d-none");
            errorMessage3.textContent = message2; }; 
    });

// Création d'un écouteur d'événement pour la prestation
    performance.addEventListener("keyup", function () { 
        performance.classList.remove("red", "green",);
        errorMessage4.classList.add("d-none");  
    //Test de la regexPerformance pour tester la valeur
        if (regexPerformance.test(performance.value)) { 
            performance.classList.add("green"); 
            errorMessage4.classList.add("d-none");
        } else { 
            performance.classList.add("red"); 
            errorMessage4.classList.remove("d-none");
            errorMessage4.textContent = message2; };
    });

// Création d'un écouteur d'événement pour le message
    message.addEventListener("keyup", function () { 
        message.classList.remove("red", "green",);
        errorMessage5.classList.add("d-none");  
    //Test de la regexMessage pour tester la valeur
        if (regexMessage.test(message.value)) { 
            message.classList.add("green"); 
            errorMessage5.classList.add("d-none");
        } else { 
            message.classList.add("red"); 
            errorMessage5.classList.remove("d-none");
            errorMessage5.textContent = message2; };
    });