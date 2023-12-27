// Déclaration des variables
const lastName = document.getElementById("lastName");
const firstName = document.getElementById("firstName"); 
const email = document.getElementById("Email"); 
const phone = document.getElementById("Phone");
const adress = document.getElementById("Adress");
const userName = document.getElementById("userName");
const pwdMedium = document.getElementById("Password1");
const pwdStrong = document.getElementById("Password2");


const message1 = "Caractères non pris en compte !";
const message2 = "E-mail incorrect !";
const message3 = "Mot de Passe différent du premier !";
const message4 = "Merci de mettre au moins 1 Majuscule, 1 minuscule, 1 chiffre et 1 caratère spécial (min 8)."


const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");
const errorMessage3 = document.getElementById("error3");
const errorMessage4 = document.getElementById("error4");
const errorMessage5 = document.getElementById("error5");
const errorMessage6 = document.getElementById("error6");
const errorMessage7 = document.getElementById("error7");
const errorMessage8 = document.getElementById("error8");
const errorMessage9 = document.getElementById("error9");


// Création des regex
const regexName = /^[a-zA-Z0-9]{2,30}$/; 
const regexEmail = /^[A-Za-z0-9.\_\.\-]+@[a-z0-9\_\-]+\.[a-z]{2,5}$/; 
const regexPhone = /^[0-9]{10}$/;
const regexAdress = /^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{1,300}$/;
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


// Création d'un écouteur d'événement pour le lastname
lastName.addEventListener("keyup", function () { 
// Supprimer les classes "red" et "green" à chaque saisie 
    lastName.classList.remove("red", "green"); 
    errorMessage1.classList.add("d-none");
// Utilisation de regexName.test() pour tester la valeur 
// par défaut ici c'est === True
    if (regexName.test(lastName.value)) { 
        lastName.classList.add("green"); 
        errorMessage1.classList.add("d-none");
    } else { 
        lastName.classList.add("red"); 
        errorMessage1.classList.remove("d-none");
        errorMessage1.textContent = message1; }; 
});

// function validateLastName() {
//     lastName.classList.remove("red", "green");
//     errorMessage1.classList.add("d-none");

//     if (regexName.test(lastName.value)) {
//         lastName.classList.add("green");
//         errorMessage1.classList.add("d-none");
//     } else {
//         lastName.classList.add("red");
//         errorMessage1.classList.remove("d-none");
//         errorMessage1.textContent = message1;
//     }
// }

// lastName.addEventListener("keyup", validateLastName);

// Création d'un écouteur d'événement pour le firstname
firstName.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        firstName.classList.remove("red", "green"); 
        errorMessage2.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexName.test(firstName.value)) { 
            firstName.classList.add("green"); 
            errorMessage2.classList.add("d-none");
        } else { 
            firstName.classList.add("red"); 
            errorMessage2.classList.remove("d-none");
            errorMessage2.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour l'email
email.addEventListener("keyup", function () { 
    email.classList.remove("red", "green",);
    errorMessage3.classList.add("d-none");  
    if (regexEmail.test(email.value)) { 
        email.classList.add("green"); 
        errorMessage3.classList.add("d-none");
    } else { 
        email.classList.add("red"); 
        errorMessage3.classList.remove("d-none");
        errorMessage3.textContent = message2; };
}); 

// Création d'un écouteur d'événement pour le phone
phone.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        phone.classList.remove("red", "green"); 
        errorMessage4.classList.add("d-none");
    //Test de la regexPhone pour tester la valeur
        if (regexPhone.test(phone.value)) { 
            phone.classList.add("green"); 
            errorMessage4.classList.add("d-none");
        } else { 
            phone.classList.add("red"); 
            errorMessage4.classList.remove("d-none");
            errorMessage4.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour l'Adress
adress.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        adress.classList.remove("red", "green"); 
        errorMessage5.classList.add("d-none");
    //Test de la regexAdress pour tester la valeur
        if (regexAdress.test(adress.value)) { 
            adress.classList.add("green"); 
            errorMessage5.classList.add("d-none");
        } else { 
            adress.classList.add("red"); 
            errorMessage5.classList.remove("d-none");
            errorMessage5.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour le userName
userName.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        userName.classList.remove("red", "green"); 
        errorMessage6.classList.add("d-none");
    //Test de la regexName pour tester la valeur
        if (regexName.test(userName.value)) { 
            userName.classList.add("green"); 
            errorMessage6.classList.add("d-none");
        } else { 
            userName.classList.add("red"); 
            errorMessage6.classList.remove("d-none");
            errorMessage6.textContent = message1; }; 
    });

// Création d'un écouteur d'événement pour le mot de passe
pwdMedium.addEventListener("input", function () { 
    pwdMedium.classList.remove("red", "green",);
    errorMessage7.classList.add("d-none");  
    if (regexPwdStrong.test(pwdMedium.value)) { 
        pwdMedium.classList.add("green"); 
        errorMessage7.classList.add("d-none");
    } else { 
        pwdMedium.classList.add("red"); 
        errorMessage7.classList.remove("d-none");
        errorMessage7.textContent = message4; };
}); 

// Création d'un écouteur d'événement pour la confirmation du mot de passe
pwdStrong.addEventListener("input", function () { 
    pwdStrong.classList.remove("red", "green",);
    errorMessage8.classList.add("d-none");  
    if (regexPwdStrong.test(pwdStrong.value)) { 
        pwdStrong.classList.add("green"); 
        errorMessage8.classList.add("d-none");
    } else { 
        pwdStrong.classList.add("red"); 
        errorMessage8.classList.remove("d-none");
        errorMessage8.textContent = message4; };
}); 

// Fonction vérification des mots de passe
pwdStrong.addEventListener("keyup", function () { 
    // Supprimer les classes "red" et "green" à chaque saisie 
        pwdMedium.classList.remove("red", "green");
        pwdStrong.classList.remove("red", "green"); 
        errorMessage9.classList.add("d-none");
        errorMessage9.textContent = '';
    // Conditions
        if (pwdMedium.value == '' && pwdStrong.value == '') {
            return
        }
        if (pwdMedium.value === pwdStrong.value) { 
            pwdMedium.classList.add("green"); 
            pwdStrong.classList.add("green");
            errorMessage9.classList.add("d-none");
        } else { 
            pwdMedium.classList.add("red"); 
            pwdStrong.classList.add("red");
            errorMessage9.classList.remove("d-none");
            errorMessage9.textContent = message3;
        }
    });