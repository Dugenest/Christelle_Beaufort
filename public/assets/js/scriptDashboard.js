// Déclaration des variables
const userNameText = document.getElementById("username");
const lastNameText = document.getElementById("lastname");
const firstNameText = document.getElementById("firstname");
const emailText = document.getElementById("email");
const adressText = document.getElementById("adress");
const phoneText = document.getElementById("phone");
const roleText = document.getElementById("role");
const pwdMedium = document.getElementById("Password");
const pwdStrong = document.getElementById("Password1");


const message1 = "Caractères non pris en compte !";
const message2 = "E-mail incorrect !";
const message3 = "Le texte n'est pas valide !";
const message4 = "Le numéro de téléphone n'est pas valide !";
const message5 = "Mot de Passe différent du premier !";
const message6 = "Merci de mettre au moins 1 Majuscule, 1 minuscule, 1 chiffre et 1 caratère spécial (min 8)."


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
const regexAdress = /^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{2,50}$/;
const regexPhone = /^[0-9]{10}$/;
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;



// Création d'un écouteur d'événement pour le lastname
userNameText.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    userNameText.classList.remove("red", "green");
    errorMessage1.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(userNameText.value)) {
        userNameText.classList.add("green");
        errorMessage1.classList.add("d-none");
    } else {
        userNameText.classList.add("red");
        errorMessage1.classList.remove("d-none");
        errorMessage1.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le lastname
lastNameText.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    lastNameText.classList.remove("red", "green");
    errorMessage2.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(lastNameText.value)) {
        lastNameText.classList.add("green");
        errorMessage2.classList.add("d-none");
    } else {
        lastNameText.classList.add("red");
        errorMessage2.classList.remove("d-none");
        errorMessage2.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le lastname
firstNameText.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    firstNameText.classList.remove("red", "green");
    errorMessage3.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(firstNameText.value)) {
        firstNameText.classList.add("green");
        errorMessage3.classList.add("d-none");
    } else {
        firstNameText.classList.add("red");
        errorMessage3.classList.remove("d-none");
        errorMessage3.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour l'email (pas obligatoire d'utiliser une regex ici)
emailText.addEventListener("keyup", function () {
    emailText.classList.remove("red", "green",);
    errorMessage4.classList.add("d-none");
    if (regexEmail.test(emailText.value)) {
        emailText.classList.add("green");
        errorMessage4.classList.add("d-none");
    } else {
        emailText.classList.add("red");
        errorMessage4.classList.remove("d-none");
        errorMessage4.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour le lastname
adressText.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    adressText.classList.remove("red", "green");
    errorMessage5.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexAdress.test(adressText.value)) {
        adressText.classList.add("green");
        errorMessage5.classList.add("d-none");
    } else {
        adressText.classList.add("red");
        errorMessage5.classList.remove("d-none");
        errorMessage5.textContent = message3;
    };
});

// Création d'un écouteur d'événement pour le lastname
phoneText.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    phoneText.classList.remove("red", "green");
    errorMessage6.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexPhone.test(phoneText.value)) {
        phoneText.classList.add("green");
        errorMessage6.classList.add("d-none");
    } else {
        phoneText.classList.add("red");
        errorMessage6.classList.remove("d-none");
        errorMessage6.textContent = message4;
    };
});

// Création d'un écouteur d'événement pour le lastname
roleText.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    roleText.classList.remove("red", "green");
    errorMessage7.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(roleText.value)) {
        roleText.classList.add("green");
        errorMessage7.classList.add("d-none");
    } else {
        roleText.classList.add("red");
        errorMessage7.classList.remove("d-none");
        errorMessage7.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le mot de passe
pwdMedium.addEventListener("input", function () {
    pwdMedium.classList.remove("red", "green",);
    errorMessage8.classList.add("d-none");
    if (regexPwdStrong.test(pwdMedium.value)) {
        pwdMedium.classList.add("green");
        errorMessage8.classList.add("d-none");
    } else {
        pwdMedium.classList.add("red");
        errorMessage8.classList.remove("d-none");
        errorMessage8.textContent = message6;
    };
});

// Création d'un écouteur d'événement pour la confirmation du mot de passe
pwdStrong.addEventListener("input", function () {
    pwdStrong.classList.remove("red", "green",);
    errorMessage9.classList.add("d-none");
    if (regexPwdStrong.test(pwdStrong.value)) {
        pwdStrong.classList.add("green");
        errorMessage9.classList.add("d-none");
    } else {
        pwdStrong.classList.add("red");
        errorMessage9.classList.remove("d-none");
        errorMessage9.textContent = message6;
    };
});

// Fonction vérification des mots de passe
pwdStrong.addEventListener("keyup", function () {
    // Supprimer les classes "red" et "green" à chaque saisie 
    pwdMedium.classList.remove("red", "green");
    pwdStrong.classList.remove("red", "green");
    errorMessage10.classList.add("d-none");
    errorMessage10.textContent = '';
    // Conditions
    if (pwdMedium.value == '' && pwdStrong.value == '') {
        return
    }
    if (pwdMedium.value === pwdStrong.value) {
        pwdMedium.classList.add("green");
        pwdStrong.classList.add("green");
        errorMessage10.classList.add("d-none");
    } else {
        pwdMedium.classList.add("red");
        pwdStrong.classList.add("red");
        errorMessage10.classList.remove("d-none");
        errorMessage10.textContent = message5;
    }
});