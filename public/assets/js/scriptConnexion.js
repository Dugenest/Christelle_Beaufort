// Déclaration des variables
const userName = document.getElementById("username");
const pwdMedium = document.getElementById("password");

//création du message
const message1 = "Caractères non pris en compte !";

//création des constantes pour afficher les messages
const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");

//Création des régex
const regexUserName = /^[A-Za-z0-9éèêëàâäôöûüïç' ]{2,30}$/;
const regexName = /^[A-Za-zéèêëàâäôöûüïç' ]{2,30}$/;
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

// Création d'un écouteur d'événement pour le userName
userName.addEventListener("keyup", function () { 
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
        userName.classList.remove("border-danger", "border-success"); 
        errorMessage1.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexUserName.test(userName.value)) { 
            userName.classList.add("border-success"); 
            errorMessage1.classList.add("d-none");
        } else { 
            userName.classList.add("border-danger"); 
            errorMessage1.classList.remove("d-none");
            errorMessage1.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour le mot de passe
pwdMedium.addEventListener("input", function () { 
    pwdMedium.classList.remove("border-danger", "border-success",);
    errorMessage2.classList.add("d-none");  
    if (regexPwdStrong.test(pwdMedium.value)) { 
        pwdMedium.classList.add("border-success"); 
        errorMessage2.classList.add("d-none");
    } else { 
        pwdMedium.classList.add("border-danger"); 
        errorMessage2.classList.remove("d-none");
    };
}); 