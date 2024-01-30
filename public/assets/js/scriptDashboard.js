// Déclaration des variables
const nameText = document.getElementById("Name"); 
const emailText = document.getElementById("Email"); 
const pwdMedium = document.getElementById("Password1");
const pwdStrong = document.getElementById("Password2");

const experienceText = document.getElementById("Experience")

const message1 = "Caractères non pris en compte !";
const message2 = "E-mail incorrect !";
const message3 = "Mot de Passe différent du premier !";
const message4 = "Merci de mettre au moins 1 Majuscule, 1 minuscule, 1 chiffre et 1 caratère spécial (min 8)."

const message10 = "Le texte n'est pas valide !";

const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");
const errorMessage3 = document.getElementById("error3");
const errorMessage4 = document.getElementById("error4");
const errorMessage5 = document.getElementById("error5");
const errorMessage6 = document.getElementById("error6");
const errorMessage7 = document.getElementById("error7");
const errorMessage8 = document.getElementById("error8");
const errorMessage9 = document.getElementById("error9");
const errorMessage10 = document.getElementById("error10");



// Création des regex
const regexName = /^[a-zA-Z0-9]{2,30}$/; 
const regexEmail = /^[A-Za-z0-9.\_\.\-]+@[a-z0-9\_\-]+\.[a-z]{2,5}$/; 
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

const regexExperience = /^[A-Za-zÀ-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{1,300}$/;



// Création d'un écouteur d'événement pour le lastname
nameText.addEventListener("keyup", function () { 
// Supprimer les classes "red" et "green" à chaque saisie 
    nameText.classList.remove("red", "green"); 
    errorMessage1.classList.add("d-none");
// Utilisation de regexLastname.test() pour tester la valeur 
// par défaut ici c'est === True
    if (regexName.test(nameText.value)) { 
        nameText.classList.add("green"); 
        errorMessage1.classList.add("d-none");
    } else { 
        nameText.classList.add("red"); 
        errorMessage1.classList.remove("d-none");
        errorMessage1.textContent = message1; }; 
});

// Création d'un écouteur d'événement pour l'email (pas obligatoire d'utiliser une regex ici)
emailText.addEventListener("keyup", function () { 
    emailText.classList.remove("red", "green",);
    errorMessage2.classList.add("d-none");  
    if (regexEmail.test(emailText.value)) { 
        emailText.classList.add("green"); 
        errorMessage2.classList.add("d-none");
    } else { 
        emailText.classList.add("red"); 
        errorMessage2.classList.remove("d-none");
        errorMessage2.textContent = message2; };
}); 

// Création d'un écouteur d'événement pour le mot de passe
pwdMedium.addEventListener("input", function () { 
    pwdMedium.classList.remove("red", "green",);
    errorMessage4.classList.add("d-none");  
    if (regexPwdStrong.test(pwdMedium.value)) { 
        pwdMedium.classList.add("green"); 
        errorMessage4.classList.add("d-none");
    } else { 
        pwdMedium.classList.add("red"); 
        errorMessage4.classList.remove("d-none");
        errorMessage4.textContent = message4; };
}); 

// Création d'un écouteur d'événement pour la confirmation du mot de passe
pwdStrong.addEventListener("input", function () { 
    pwdStrong.classList.remove("red", "green",);
    errorMessage5.classList.add("d-none");  
    if (regexPwdStrong.test(pwdStrong.value)) { 
        pwdStrong.classList.add("green"); 
        errorMessage5.classList.add("d-none");
    } else { 
        pwdStrong.classList.add("red"); 
        errorMessage5.classList.remove("d-none");
        errorMessage5.textContent = message4; };
}); 

// Création d'un écouteur d'événement pour le code postal
codeText.addEventListener("keyup", function () { 
    codeText.classList.remove("red", "green",);
    errorMessage6.classList.add("d-none");  
    if (regexPostalCode.test(codeText.value)) { 
        codeText.classList.add("green"); 
        errorMessage6.classList.add("d-none");
    } else { 
        codeText.classList.add("red"); 
        errorMessage6.classList.remove("d-none");
        errorMessage6.textContent = message6; };
}); 

// // Création d'un écouteur d'événement pour la photo de profil
// profilText.addEventListener("input", function () { 
//     profilText.classList.remove("red", "green",);
//     errorMessage7.classList.add("d-none");  
//     if (regexPostalCode.test(profilText.value)) { 
//         profilText.classList.add("green"); 
//         errorMessage7.classList.add("d-none");
//     } else { 
//         profilText.classList.add("red"); 
//         errorMessage7.classList.remove("d-none");
//         errorMessage7.textContent = message7; };
// }); 

// Création d'un écouteur d'événement pour le linkedin
linkedinText.addEventListener("keyup", function () { 
        linkedinText.classList.remove("red", "green"); 
        errorMessage8.classList.add("d-none");
        if (regexLinkedin.test(linkedinText.value)) { 
            linkedinText.classList.add("green"); 
            errorMessage8.classList.add("d-none");
        } else { 
            linkedinText.classList.add("red"); 
            errorMessage8.classList.remove("d-none");
            errorMessage8.textContent = message8; }; 
    });

// Création d'un écouteur d'événement pour la date
dateText.addEventListener("keyup", function () { 
    dateText.classList.remove("red", "green",);
    errorMessage9.classList.add("d-none");  
    if (regexDate.test(dateText.value)) { 
        dateText.classList.add("green"); 
        errorMessage9.classList.add("d-none");
    } else { 
        dateText.classList.add("red"); 
        errorMessage9.classList.remove("d-none");
        errorMessage9.textContent = message9; };
}); 

// Création d'un écouteur d'événement pour l'expérience
experienceText.addEventListener("keyup", function () { 
    experienceText.classList.remove("red", "green",);
    errorMessage10.classList.add("d-none");  
    if (regexExperience.test(experienceText.value)) { 
        experienceText.classList.add("green"); 
        errorMessage10.classList.add("d-none");
    } else { 
        experienceText.classList.add("red"); 
        errorMessage10.classList.remove("d-none");
        errorMessage10.textContent = message10; };
}); 

// Création d'un écouteur d'événement pour le lastname
civilityText.addEventListener("keyup", function () { 
        civilityText.classList.remove("red", "green"); 
        errorMessage11.classList.add("d-none");
        if (regexName.test(civilityText.value)) { 
            civilityText.classList.add("green"); 
            errorMessage11.classList.add("d-none");
        } else { 
            civilityText.classList.add("red"); 
            errorMessage11.classList.remove("d-none");
            errorMessage11.textContent = message11; }; 
    });

// Fonction vérification des mots de passe
pwdStrong.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        pwdMedium.classList.remove("red", "green");
        pwdStrong.classList.remove("red", "green"); 
        errorMessage3.classList.add("d-none");
        errorMessage3.textContent = '';
    // Conditions
        if (pwdMedium.value == '' && pwdStrong.value == '') {
            return
        }
        if (pwdMedium.value === pwdStrong.value) { 
            pwdMedium.classList.add("green"); 
            pwdStrong.classList.add("green");
            errorMessage3.classList.add("d-none");
        } else { 
            pwdMedium.classList.add("red"); 
            pwdStrong.classList.add("red");
            errorMessage3.classList.remove("d-none");
            errorMessage3.textContent = message3;
        }
    });