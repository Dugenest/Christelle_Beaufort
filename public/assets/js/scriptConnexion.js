const userName = document.getElementById("userName");
const pwdMedium = document.getElementById("Password1");

const message1 = "Caractères non pris en compte !";
const message2 = "Merci de mettre au moins 1 Majuscule, 1 minuscule, 1 chiffre et 1 caratère spécial (min 8)."

const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");

const regexName = /^[a-zA-Z0-9]{2,30}$/;
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

// Création d'un écouteur d'événement pour le userName
userName.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        userName.classList.remove("red", "green"); 
        errorMessage1.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexName.test(userName.value)) { 
            userName.classList.add("green"); 
            errorMessage1.classList.add("d-none");
        } else { 
            userName.classList.add("red"); 
            errorMessage1.classList.remove("d-none");
            errorMessage1.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour le mot de passe
pwdMedium.addEventListener("input", function () { 
    pwdMedium.classList.remove("red", "green",);
    errorMessage2.classList.add("d-none");  
    if (regexPwdStrong.test(pwdMedium.value)) { 
        pwdMedium.classList.add("green"); 
        errorMessage2.classList.add("d-none");
    } else { 
        pwdMedium.classList.add("red"); 
        errorMessage2.classList.remove("d-none");
        errorMessage2.textContent = message2; };
}); 